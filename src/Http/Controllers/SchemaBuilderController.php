<?php

namespace Hooshid\Utils\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchemaBuilderController extends Controller
{
    public function index(Request $request)
    {
        $tablesInDb = DB::select('SHOW TABLES');
        $db = "Tables_in_" . env('DB_DATABASE');
        $dbTables = [];
        foreach ($tablesInDb as $table) {
            $dbTables[] = $table->{$db};
        }

        $table = $request->input('table');
        if ($table) {
            $tableColumns = DB::select('SHOW FULL COLUMNS FROM ' . $table);
            $headers = $this->headers($tableColumns, $table);
            $schema = $this->schema($tableColumns, $table);
            $casts = $this->cast($tableColumns);
        } else {
            $headers = null;
            $schema = null;
            $casts = null;
        }

        return view('utils::schema-builder', [
            'dbTables' => $dbTables,
            'table' => $table,
            'headers' => $headers,
            'schema' => $schema,
            'casts' => $casts
        ]);
    }

    public function headers($tableColumns, $table)
    {
        $headers = '[{"headers":[';
        $i = 0;
        foreach ($tableColumns as $tableColumnInfo) {
            if ($tableColumnInfo->Field != "created_at" and $tableColumnInfo->Field != "updated_at") {
                if ($i != 0) {
                    $headers .= ',';
                }

                if ($tableColumnInfo->Field == "id") {
                    $text = "شناسه";
                } else {
                    $text = $tableColumnInfo->Comment;
                }

                $headers .= '{"text":"' . $text . '","value":"' . $tableColumnInfo->Field . '"}';

                $i++;
            }
        }
        $headers .= '],"options":{"getUrl":"/public/generic-handler?model=' . Str::of($table)->singular()->slug() . '"}}]';

        return $headers;
    }

    public function schema($tableColumns, $table)
    {
        $schema = '[{"schema":[';
        $i = 0;
        foreach ($tableColumns as $tableColumnInfo) {
            if ($tableColumnInfo->Field != "created_at" and $tableColumnInfo->Field != "updated_at") {
                if ($i != 0) {
                    $schema .= ',';
                }

                // validation
                $validation = [];
                if ($tableColumnInfo->Null == "NO") {
                    $validation[] = 'required';
                }
                if ((stripos($tableColumnInfo->Type, "bigint") !== false or
                        stripos($tableColumnInfo->Type, "smallint") !== false or
                        stripos($tableColumnInfo->Type, "int") !== false or
                        stripos($tableColumnInfo->Type, "tinyint") !== false) and
                    $tableColumnInfo->Type != "tinyint(3) unsigned" and $tableColumnInfo->Type != "tinyint(3)") {
                    if ((stripos($tableColumnInfo->Type, "unsigned") !== false)) {
                        $validation[] = 'numeric';
                    } else {
                        $validation[] = 'integer';
                    }
                }


                // default value
                $default = '';
                if ($tableColumnInfo->Default or $tableColumnInfo->Default == "0") {
                    $default = ',"default":"' . $tableColumnInfo->Default . '"';
                }

                // type
                if ($tableColumnInfo->Type === "tinyint(3) unsigned" or $tableColumnInfo->Type === "tinyint(3)") {
                    $type = "switch";
                    if ($tableColumnInfo->Default == 1) {
                        $default = ',"default":true';
                    } else {
                        $default = '';
                    }
                    $validation = [];
                } elseif ($tableColumnInfo->Type === "text") {
                    $type = "textarea";
                } elseif (stripos($tableColumnInfo->Type, "varchar") !== false) {
                    $type = "input";
                    $validation[] = 'max:' . Str::between($tableColumnInfo->Type, '(', ')');
                } else {
                    $type = "input";
                }

                if ($tableColumnInfo->Field == "id") {
                    $schema .= '{"model":"id"}';
                } else {
                    $schema .= '{"type":"' . $type . '","label":"' . $tableColumnInfo->Comment . '","model":"' . $tableColumnInfo->Field . '","validation":"' . implode('|', $validation) . '"' . $default . '}';
                }

                $i++;
            }
        }
        $schema .= '],"options":{"databaseTable":"' . $table . '"}}]';

        return $schema;
    }

    public function cast($tableColumns)
    {
        $cast = 'protected $casts = [
';
        foreach ($tableColumns as $col) {
            if ($col->Type === "tinyint(3) unsigned" or $col->Type === "tinyint(3)") {
                $type = "boolean";
            } elseif (stripos($col->Type, "bigint") !== false or
                stripos($col->Type, "smallint") !== false or
                stripos($col->Type, "int") !== false or
                stripos($col->Type, "tinyint") !== false) {
                $type = "integer";
            } elseif (stripos($col->Type, "double") !== false) {
                $type = "double";
            } elseif ($col->Type == "date") {
                $type = "date:Y-m-d";
            } elseif ($col->Type == "timestamp") {
                $type = "datetime:Y-m-d H:i:s";
            } else {
                $type = "string";
            }

            $cast .= "    '{$col->Field}' => '{$type}',";
            $cast .= "
";
        }
        $cast .= '];';

        return $cast;
    }
}

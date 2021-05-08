<?php

namespace Hooshid\Utils;

use Illuminate\Support\Facades\DB;

class DataSet
{
    public static function serialize($data)
    {
        $dataSet = [];
        $json = json_decode($data);
        $action = "insert";
        foreach ($json as $obj) {
            // insert or update?
            if ($obj->key == "id" and $obj->value) {
                $action = "update";
            }

            // multi selects
            if ($obj->type == "select" and gettype($obj->value) == "object" and $obj->value->multiple) {
                $collection = DB::table($obj->value->save_to_db)
                    ->where($obj->value->related_key, $dataSet['id'])
                    ->select($obj->value->source_key)
                    ->get()
                    ->pluck($obj->value->source_key);

                // tag deleted
                $deleteValues = $collection->diff($obj->value->values);
                if ($deleteValues->all()) {
                    foreach ($deleteValues->all() as $id) {
                        DB::table($obj->value->save_to_db)
                            ->where($obj->value->related_key, $dataSet['id'])
                            ->where($obj->value->source_key, $id)
                            ->delete();
                    }
                }

                // insert new tags
                $insertCol = collect($obj->value->values);
                $insertValues = $insertCol->diff($collection);
                if ($insertValues->all()) {
                    foreach ($insertValues->all() as $id) {
                        DB::table($obj->value->save_to_db)->insert([
                            $obj->value->related_key => $dataSet['id'],
                            $obj->value->source_key => $id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ]);
                    }
                }
            } // insert key & value in array
            elseif ($obj->key) {
                $dataSet[$obj->key] = trim(strip_tags($obj->value));
            }
        }

        if ($action == "insert") {
            unset($dataSet['id']);
            $dataSet['created_at'] = now();
        }
        $dataSet['updated_at'] = now();

        return $dataSet;
    }
}

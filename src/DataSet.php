<?php

namespace Hooshid\Utils;

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

            if ($obj->key) {
                $dataSet[$obj->key] = strip_tags($obj->value);
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public static function getCsvFile(){
        $masyvas=[];
        $filename = base_path('/storage/app/file.csv');
        $file = fopen($filename, 'r');
        $i = 1;
        while (($d = fgetcsv($file)) !== FALSE) {

            $masyvas[] = [
                'name' => $d[0],
                'email' => $d[1],
                'subscription' => json_decode($d[2])
            ];

            $i ++;
        }
        fclose($file);
        return $masyvas;
    }

    public static function showUser($id){
        $masyvas = Admin::getCsvFile();
        return $masyvas[$id];
    }

    public static function storeAllList($masyvas){
        $filename = base_path('/storage/app/file.csv');
        $write = fopen($filename, 'w');
        foreach ($masyvas as $value) {
            fputcsv($write, [
                $value['name'],
                $value['email'],
                json_encode($value['subscription'])
            ]);
        }
        fclose($write);
    }
}

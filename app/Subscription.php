<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public static function getCsvSubscription(){
        $masyvas=[];
        $filename = base_path('/storage/app/subscription.csv');
        $file = fopen($filename, 'r');
        $i = 1;
        while (($d = fgetcsv($file)) !== FALSE) {

            $masyvas[] = [
                'name' => $d[0],
            ];

            $i ++;
        }
        fclose($file);
        return $masyvas;
    }
    public static function storeAllSubscription($subscription){
        $filename = base_path('/storage/app/subscription.csv');
        $write = fopen($filename, 'w');
        foreach ($subscription as $value) {
            fputcsv($write, [
                $value['name']
            ]);
        }
        fclose($write);
    }
}

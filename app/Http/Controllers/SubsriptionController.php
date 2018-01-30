<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewUserRequest;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubsriptionController extends Controller
{
    public function index(){
        $subs = Subscription::getCsvSubscription();
        return view('user.subscription', compact('subs'));
    }

    public function store(StoreNewUserRequest $request){
        $mas = $request->subscription;
        $encode = json_encode($mas);

        $filename = base_path('/storage/app/file.csv');

        $file = fopen($filename, "a");

        fputcsv($file, array($request->name, $request->email, $encode));
         fclose($file);


        return redirect()->route('home')->with(['message' => 'Thanks for your subscription']);
    }
}

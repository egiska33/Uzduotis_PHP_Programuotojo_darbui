<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Subscription;
use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    public function index(){
        $masyvas =Admin::getCsvFile();

        return view('admin.index',compact('masyvas'));
    }
    public function sortByName($name){
        $masyvas = Admin::getCsvFile();
        $names = array();
        foreach ($masyvas as $mas) {
            $names[] = $mas[$name];
        }
        array_multisort($names, SORT_ASC, $masyvas);

        return view ('admin.sort', compact('masyvas'));
    }
    public function edit($id){
        $masyvas = Admin::showUser($id);
        return view('admin.user', compact('masyvas', 'id'));
    }

    public function update(UpdateSubscriptionRequest $request, $id){
        $masyvas = Admin::getCsvFile();
        $masyvas[$id]['name']=$request->name;
        $masyvas[$id]['email']= $request->email;
        Admin::storeAllList($masyvas);
        return redirect()->route('admin.index')->with(['message' => 'User info update successfully']);

    }

    public function delete($id){
        $masyvas = Admin::getCsvFile();
        unset($masyvas[$id]);
        Admin::storeAllList($masyvas);

        return redirect()->route('admin.index')->with(['message' => 'User delete successfully']);

    }

    public function subscription(){
        $subscription = Subscription::getCsvSubscription();
        return view('admin.subscription', compact('subscription'));
    }

    public function addSubscription(){
        return view('admin.create');
    }
    public function storeSubscription(StoreSubscriptionRequest $request){

        $filename = base_path('/storage/app/subscription.csv');
        $file = fopen($filename, "a");
        fputcsv($file, array($request->subscription));
        fclose($file);
        return redirect()->route('admin.subscription')->with(['message' => 'Subscription add successfully']);
    }

    public function deleteSubscription($id){
        $subscription = Subscription::getCsvSubscription();
        unset($subscription[$id]);
        Subscription::storeAllSubscription($subscription);
        return redirect()->route('admin.subscription')->with(['message' => 'Subscription delete successfully']);
    }

}

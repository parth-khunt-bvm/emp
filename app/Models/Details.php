<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    protected $table="details";

    public function getDetails(){
            return Details::select("phoneno","email","phoneno2","email2","facebook","twitter","linkedin","instagram","github","logo","favicon","address_line1","address_line2","aboutus","map")->where("id",1)->get();
    }

    public function editDetail($request){
        $objDetails = Details::find(1);

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $logo = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/details');
            $image->move($destinationPath, $logo);
            $objDetails->logo = $logo;
        }

        if ($request->file('favicon')) {
            $image = $request->file('favicon');
            $favicon_icon = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/details');
            $image->move($destinationPath, $favicon_icon);
            $objDetails->favicon = $favicon_icon;

        }


        $objDetails->phoneno = $request->input('phoneno');
        $objDetails->email = $request->input('email');

        if($request->input('phoneno2') == '' || $request->input('phoneno2') == NULL){
            $objDetails->phoneno2 = NULL;
        }else{
            $objDetails->phoneno2 = $request->input('phoneno2');
        }

        if($request->input('email2') == '' || $request->input('email2') == NULL){
            $objDetails->email2 = NULL;
        }else{
            $objDetails->email2 = $request->input('email2');
        }

        if($request->input('facebook') == '' || $request->input('facebook') == NULL){
            $objDetails->facebook = NULL;
        }else{
            $objDetails->facebook = $request->input('facebook');
        }

        // if($request->input('twitter') == '' || $request->input('twitter') == NULL){
        //     $objDetails->twitter = NULL;
        // }else{
        //     $objDetails->twitter = $request->input('twitter');
        // }
        $objDetails->twitter = NULL;
        if($request->input('linkedin') == '' || $request->input('linkedin') == NULL){
            $objDetails->linkedin = NULL;
        }else{
            $objDetails->linkedin = $request->input('linkedin');
        }

        if($request->input('instagram') == '' || $request->input('instagram') == NULL){
            $objDetails->instagram = NULL;
        }else{
            $objDetails->instagram = $request->input('instagram');
        }
        $objDetails->github = NULL;
        // if($request->input('github') == '' || $request->input('github') == NULL){
        //     $objDetails->github = NULL;
        // }else{
        //     $objDetails->github = $request->input('github');
        // }
        $objDetails->address_line1 = $request->input('address_line1');
        $objDetails->address_line2 = $request->input('address_line2');
        $objDetails->aboutus = $request->input('aboutus');
        $objDetails->map = $request->input('map');
        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    }
}

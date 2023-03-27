<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus_section_one extends Model
{
    use HasFactory;
    protected $table="about_us_section_one";

    public function getDetails(){
            return Aboutus_section_one::select("title","details","image","image_headline","signuture","contact_no")->where("id",1)->get();
    }

    public function editDetail($request){
        $objDetails = Aboutus_section_one::find(1);
        if ($request->file('image')) {
            $imagenew = $request->file('image');
            $image = time() . '1.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $imagenew->move($destinationPath, $image);
            $objDetails->image = $image;
        }

        if ($request->file('signuture')) {
            $image = $request->file('signuture');
            $signuture = time() . '2.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $image->move($destinationPath, $signuture);
            $objDetails->signuture = $signuture;

        }
        $objDetails->title = $request->input('title');
        $objDetails->details = $request->input('details');
        $objDetails->image_headline = $request->input('image_headline');
        $objDetails->contact_no = $request->input('contact_no');

        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    }
}

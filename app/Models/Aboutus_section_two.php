<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus_section_two extends Model
{
    use HasFactory;
    protected $table="about_us_section_two";

    public function getDetails(){
            return Aboutus_section_two::select("title","details")->where("id",1)->get();
    }
    public function editDetail($request){
        $objDetails = Aboutus_section_two::find(1);    
        $objDetails->title = $request->input('title');
        $objDetails->details = $request->input('details');
        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactusdetails extends Model
{
    use HasFactory;

    protected $table = "contactus_details";


    public function getDetails(){
        return Contactusdetails::select('details')->where("id",1)->get();
    }

    public function editDetail($request){
        $objContactusdetails = Contactusdetails::find(1);
        $objContactusdetails->details = $request->input('details');
        $objContactusdetails->updated_at = date("Y-m-d h:i:s");
        return $objContactusdetails->save();
    }


}

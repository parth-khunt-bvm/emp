<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistical extends Model
{
    use HasFactory;
    protected $table="statistical";

    public function getDetails(){
            return Statistical::select("image","icon1","count1","icon2","count2","icon3","count3","icon4","count4")->where("id",1)->get();
    }
    public function editDetail($request){
        $objDetails = Statistical::find(1);  
        if ($request->file('image')) {
            $imagenew = $request->file('image');
            $image = time() . '1.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $imagenew->move($destinationPath, $image);
            $objDetails->image = $image;
        }
        if ($request->file('icon1')) {
            $imagenew = $request->file('icon1');
            $icon1 = time() . 'icon1.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $imagenew->move($destinationPath, $icon1);
            $objDetails->icon1 = $icon1;
        }
        if ($request->file('icon2')) {
            $imagenew = $request->file('icon2');
            $icon2 = time() . 'icon2.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $imagenew->move($destinationPath, $icon2);
            $objDetails->icon2 = $icon2;
        }
        if ($request->file('icon3')) {
            $imagenew = $request->file('icon3');
            $icon3 = time() . 'icon3.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $imagenew->move($destinationPath, $icon3);
            $objDetails->icon3 = $icon3;
        }
        if ($request->file('icon4')) {
            $imagenew = $request->file('icon4');
            $icon4 = time() . 'icon4.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/aboutus_section');
            $imagenew->move($destinationPath, $icon4);
            $objDetails->icon4 = $icon4;
        }
    
        $objDetails->count1 = $request->input('count1');

        $objDetails->count2 = $request->input('count2');

        $objDetails->count3 = $request->input('count3');

        $objDetails->count4 = $request->input('count4');
        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    }
}

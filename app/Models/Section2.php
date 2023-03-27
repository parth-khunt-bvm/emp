<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section2 extends Model
{
    use HasFactory;
    protected $table="section2";

    public function getDetails(){
            return Section2::select("image","title","description")->where("id",1)->get();
    }

    public function editDetail($request){     
       $objDetails = Section2::find(1);
        $images = array();
      if ($request->file()) {
        if ($request->file('extra_image')) {
            $extra_images = $request->file('extra_image');
            $i = 0;            
            foreach ($extra_images as $key => $value) {
                $extra_image = $extra_images[$i];
                $name = time() . $i . '.' . $extra_image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/section');
                $extra_image->move($destinationPath, $name);
                array_push($images, $name);
                $i++;
            }
        }
        $List = implode(',', $images);
        $images1 = Section2::select("image")->where("id",1)->get();
        $List1= explode(",",$images1[0]['image']);
        if (($key = array_search($request['id'], $List1)) !== FALSE) {
            unset($List1[$key]);
          }
        $new=$List1;
        $new_image = implode(',', $new);
        $final=ltrim($new_image.",".$List,',');

        $objDetails->image = $final;
     
    
         }

        $objDetails->title = $request->input('title');
        $objDetails->description = $request->input('description');
        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    
    }

    public function deleteImage($request){
        $images = Section2::select("image")->where("id",1)->get();
        $List= explode(",",$images[0]['image']);
        if (($key = array_search($request['id'], $List)) !== FALSE) {
            unset($List[$key]);
          }
        $new=$List;
        // print_r($new);
        $new_image = implode(',', $new);
        
        // print_r($new_image);
        // die;
        $objDetails = Section2::find(1);
        $objDetails->image = $new_image;
        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    }

    
}
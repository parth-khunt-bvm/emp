<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSection extends Model
{
    use HasFactory;
    protected $table="banner_section";

    public function getDetails(){
            return BannerSection::select('id','image','title','description')->where("id",1)->get();
    }

    public function editDetail($request){
        $obj = BannerSection::find(1);

        if ($request->file('image')) {
            $image = $request->file('image');
            $silderImage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/banner');
            $image->move($destinationPath, $silderImage);
            $obj->image = $silderImage;
        }
        $obj->title = $request->input('title');
        $obj->description = $request->input('description');
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}

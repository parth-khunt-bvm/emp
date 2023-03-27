<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopSection extends Model
{
    use HasFactory;
    protected $table="top_section";

    public function getDetails(){
            return TopSection::select('id','icon','short_description','image','title','description')->where("id",1)->get();
    }

    public function editDetail($request){
        $obj = TopSection::find(1);

        if ($request->file('image')) {
            $image = $request->file('image');
            $silderImage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/topsection');
            $image->move($destinationPath, $silderImage);
            $obj->image = $silderImage;
        }
        if ($request->file('icon')) {
            $image = $request->file('icon');
            $icon = time() . 'icon.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/topsection');
            $image->move($destinationPath, $icon);
            $obj->icon = $icon;
        }
        $obj->title = $request->input('title');
        $obj->short_description = $request->input('short_description');
        $obj->description = $request->input('description');
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}

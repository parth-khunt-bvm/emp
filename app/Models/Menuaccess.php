<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Menuaccess extends Model
{
    use HasFactory;
    protected $table = "menu_access";

    public function getList(){
        return Menuaccess::select("id","menu","is_active")->get();
    }
    public function getMenuList(){
        return Menuaccess::select("menu")->where("is_active","Yes")->get()->toArray();

    }

    public function editList($request){
        $affected = DB::table('menu_access')
                        ->update(['is_active' => "No"]);
        foreach($request->input('menu') as $key => $value){
            DB::table('menu_access')->where("id",$value)
                        ->update(['is_active' => "Yes"]);
        }
        return true;
    }
}

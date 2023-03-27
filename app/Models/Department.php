<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Department extends Model
{
    use HasFactory;
    protected $table = 'department';

    public function getDetail(){
            return Department::select("phoneno","email","line1","line2")->where("id",1)->get();
    }
    public function editDetail($request){
        $objDetails = Department::find(1);
        $objDetails->phoneno = $request->input('phoneno');
        $objDetails->email = $request->input('email');
        $objDetails->line1 = $request->input('line1');
        $objDetails->line2 = $request->input('line2');
        $objDetails->updated_at = date("Y-m-d h:i:s");
        return $objDetails->save();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hash;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";

    public function changepassword($request){
        $getDetails = Users::select('password')->where('id',$request->input('editId'))->get();
        $oldPassword = $getDetails[0]->password ;

        if(Hash::check($request->input('oldpassword'), $oldPassword)){
            $objUsers = Users::find($request->input('editId'));
            $objUsers->password = Hash::make($request->input('newpasssword'));
            $objUsers->updated_at = date("Y-m-d h:i:s");
            if($objUsers->save()){
                return "true";
            }else{
                return "false";
            }
        }else{
            return 'notMatch';
        }
    }

    public function changeprofile($request){
        $objUsers = Users::find($request->input('editId'));

        if ($request->file('userImage')) {
            $userImage = $request->file('userImage');
            $file = time(). $userImage->getClientOriginalExtension();
            $destinationPath = public_path('/upload/userprofile');
            $userImage->move($destinationPath, $file);
            $objUsers->userimage = $file;
        }

        $objUsers->firstname = $request->input('firstname');
        $objUsers->lastname = $request->input('lastname');
        $objUsers->email = $request->input('email');
        $objUsers->updated_at = date("Y-m-d h:i:s");
        return $objUsers->save();
    }
}

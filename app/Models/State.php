<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = "states";

    public function stateList($id){
        return State::select("id","name")->where("country_id",$id)->orderBy("name")->get();
    }
}

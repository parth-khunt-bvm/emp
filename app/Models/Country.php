<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = "countries";

    public function countyList(){
        return Country::select("id","name","sortname","phonecode")->orderBy("name")->get();
    }
}

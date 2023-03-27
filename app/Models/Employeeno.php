<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeeno extends Model
{
    use HasFactory;
    protected $table = "employee_no";

    public function getEmpNo(){
        return Employeeno::select("no")->get();
    }
}

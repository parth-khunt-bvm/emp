<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    protected $table="skills";
    public function  deleteSkills($data){
        return $result = Skills::where('id', $data['id'])
                ->delete();
    }
}

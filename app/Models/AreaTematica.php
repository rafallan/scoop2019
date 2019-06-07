<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaTematica extends Model
{
    
    protected $table = "areas_tematicas";
    protected $guarded = ['id'];


    public function submissoes(){
        return $this->hasMany('App\Models\Submissao');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submissao extends Model
{
    protected $table = "submissoes";
    protected $guarded = ['id'];

    public function disponibilidade($turno){
        $tipos = explode("|",$this->disponibilidade);
        $resultado = false;
        foreach ($tipos as $tipo) {

            if($tipo == $turno){
                $resultado = true;
                break;
            }

        }
        return $resultado;
    }


    public function area(){
        return $this->belongsTo('App\Models\AreaTematica');
    }
}
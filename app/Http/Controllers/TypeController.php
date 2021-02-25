<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function checkType($name){
        $type = new Type();
        $id_type = $type->where('name', $name)->value('id');
        if ($id_type == null){
            return false;
        }else{
            return $id_type;
        }
    }

    public function addType($name){
        $type = new Type();
        $type->name = $name;

        $type->save();
        $id_type = $type->where('name', $name)->value('id');
        return $id_type;
    }

}

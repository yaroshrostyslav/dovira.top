<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    //
    public function new_answer(Request $request){
        $answer = new Answers();

        $answer->id_comment = $request->id_comment;
        $answer->id_product = $request->id_product;
        $answer->id_user = $request->id_user;
        $answer->text =$request->text;
        $answer->save();

        return redirect()->back();
    }

    public function del_answer(Request $request){
        $answer = new Answers();

        $get_answer = $answer->where([
            ['id', '=', $request->id_answer]
        ])->delete();
        return redirect()->back();
    }
}

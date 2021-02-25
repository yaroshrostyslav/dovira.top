<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    public static function get_answer ($id_comment){
        $answer = Answers::where('id_comment', $id_comment)
            ->join('users', 'answers.id_user', '=', 'users.id')
            ->selectRaw('text, users.name, users.link, answers.created_at, answers.id')
            ->get();
        return $answer;
    }

    public static function has_answer($id_comment, $id_user){
        $has_answer = Answers::where([
            ['id_comment', '=', $id_comment],
            ['id_user', '=', $id_user]
        ])->first();
        return $has_answer;
    }
}

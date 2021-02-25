<?php

namespace App\Http\Controllers;

use App\User;
use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function show(){
        $users = User::where('role', '=', '1')->get();
        return view('admin', compact('users'));
    }

    public function verified(Request $request){
        User::where('id', $request->id_user)->update(['verified' => '1']);
        return redirect()->back();
    }

    public function banned(Request $request){
        $list = DB::table('iplist')->insert([
            ['ip_address' => $request->ip_address, 'id_visitor' => $request->id_user]
        ]);
        return redirect()->back();
    }
}

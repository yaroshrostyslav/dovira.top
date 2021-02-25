<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;

class VisitorController extends Controller
{

    // Create Cookie
    public function setCookie($value){
       $cookie = setcookie("session", $value);
       return $cookie;
    }
    // Get Cookie
    public function getCookie(){
        if (isset($_COOKIE["session"])){
            return $_COOKIE["session"];
        }else{
            return false;
        }
    }

    public function checkVisitor($cookie){
        //$cookie = VisitorController::getCookie($request);

        $visitor = new Visitor;
        $id_visitor = $visitor->where('session', $cookie)->value('id');
        if ($id_visitor == null){
            return false;
        }else{
            return $id_visitor;
        }
    }

    public function addVisitor($name){
        $session = Session::getId();
        VisitorController::setCookie($session);

        $visitor = new Visitor;
        $visitor->name = $name;
        $visitor->ip_address = \Request::ip();
        $visitor->session = $session;
        $visitor->save();
        $id_visitor = $visitor->where('session', $session)->value('id');
        return $id_visitor;
    }

}

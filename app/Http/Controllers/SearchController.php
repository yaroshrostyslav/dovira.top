<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\URL;

class SearchController extends Controller
{
    //

    function get_product(Request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('name_product');

            $data = DB::table('products')
                ->where('name', 'like', '%'.$query.'%')
                ->groupBy('name')
                ->limit(5)
                ->get();

            foreach($data as $row) {
                $output .= '
                    <li><a href=\'javascript: void 0\'>'.$row->name.'</a></li>
                ';
            }
            return $output;
        }
    }

    function get_type(Request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('name_type');

            $data = DB::table('types')
                ->where('name', 'like', '%'.$query.'%')
                ->groupBy('name')
                ->limit(5)
                ->get();

            foreach($data as $row) {
                $output .= '
                    <li><a href=\'javascript: void 0\'>'.$row->name.'</a></li>
                ';
            }
            return $output;
        }
    }

    public function moreResult(Request $request){
        $output = '';
        $query = $request->get('name_product');

        // Search by entered phrase
        $data1 = DB::table('products')
            ->where('name', 'like', '%'.$query.'%')
            ->groupBy('name')
            ->value('id');
        // if found
        if ($data1 != null){
            $data = DB::table('products')
                ->where('name', 'like', '%'.$query.'%')
                ->groupBy('name')
                ->limit(5)
                ->get();

            foreach($data as $row) {
                $output .= '
                    <li><a href=\'javascript: void 0\'>'.$row->name.'</a></li>
                    <div class="dropdown-divider"></div>
                ';
            }
            return $output;
        }
        // if not found, search by first word
        else{
            // find first word
            $value = $request->get('name_product');
            $value = explode(" ", $value);
            $url = URL::to('/products/'.$value[0]);

            // search by first word in DB
            $data = DB::table('products')
                ->where('name', 'like', '%'.$value[0].'%')
                ->groupBy('name')
                ->value('id');
            // if record not found 
            if ($data == null){
                $output = '
                    <li>Товар не знайдено!</li>
                    <div class="dropdown-divider"></div>
                ';
                return $output;
            }else{
                // if record found 
                $output = '
                    <a href="'.$url.'">Переглянути приблизні результати</a>
                    <div class="dropdown-divider"></div>
                ';
                return $output;
            }
        }

    }
}

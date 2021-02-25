<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    // Page: Best, Bad
    public function products_rate($rate){
        // Best
        if ($rate == '1'){
            $products = Comment::join('products', 'comments.id_product', '=', 'products.id')
                ->join('types', 'products.id_type', '=', 'types.id')
                ->selectRaw('id_product, products.name, types.name as type_name, link, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
                ->groupBy('id_product')
                ->orderBy('plus', 'DESC')
                ->paginate(10);
            return view('productsRate', compact('products'));
        // Bad
        }elseif ($rate == '0'){
            $products = Comment::join('products', 'comments.id_product', '=', 'products.id')
                ->join('types', 'products.id_type', '=', 'types.id')
                ->selectRaw('id_product, products.name, types.name as type_name, link, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
                ->groupBy('id_product')
                ->orderBy('minus', 'DESC')
                ->paginate(10);
            return view('productsRate', compact('products'));
        }
        else{ return redirect('/'); }
    }

    // Rresult of a detailed search
    public function productsMoreResult($name){
        $product = new Product();

        $products = Comment::join('products', 'comments.id_product', '=', 'products.id')
            ->join('types', 'products.id_type', '=', 'types.id')
            ->selectRaw('id_product, products.name as product_name, types.name as type_name, link, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
            ->groupBy('id_product')
            ->where('products.name', 'like', '%'.$name.'%')
            ->paginate(5);
        return view('productsMoreResult', compact('products'));
    }

    // Page with all Products
    public function show_all(){
        $products = Comment::join('products', 'comments.id_product', '=', 'products.id')
            ->join('types', 'products.id_type', '=', 'types.id')
            ->selectRaw('id_product, products.name, types.name as type_name, link, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
            ->groupBy('id_product')
            ->paginate(10); // number of records displayed on one page
        return view('products', compact('products'));
    }

    // Redirection to routing > show($name)
    public function processForm(Request $request) {
        $product = new Product();
        $name  = $request->get('name_product');
        $get_product = $product->where('name', $name)->value('id');
        if ($get_product == null){
            return redirect('product');
        }else{
            return redirect('product/'.$name);
        }

    }

    public function show($name){
        $product = new Product();
        $comment = new Comment();
        $answer = new Answers();

        $name_product = $name;
        $get_product = $product->join('types', 'products.id_type', '=', 'types.id')
            ->select('products.id', 'products.name as product_name', 'types.name as type_name', 'link')
            ->where('products.name', $name_product)
            ->get();

        $get_count_comment = $comment->join('products', 'comments.id_product', '=', 'products.id')
            ->selectRaw('id_product, name, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
            ->groupBy('id_product')
            ->orderBy('plus', 'DESC')
            ->where('id_product', $get_product[0]->id)
            ->get();

        $get_comments = $comment->join('products', 'comments.id_product', '=', 'products.id')
            ->join('types', 'products.id_type', '=', 'types.id')
            ->join('visitors', 'comments.id_visitor', '=', 'visitors.id')
            ->selectRaw('id_product, comments.id, visitors.name, visitors.ip_address, visitors.id, types.name as type_name, text, comments.rate_plus as plus, comments.rate_minus as minus, comments.created_at')
            ->where([
                ['id_product', '=', $get_product[0]->id],
            ])
            ->get();

        return view('product', compact('get_product', 'get_count_comment', 'get_comments'));
        //Product::show_product($name);
        //return redirect('/');
    }

        public function checkProduct($name){
            $product = new Product();
            $id_product = $product->where('name', $name)->value('id');
            if ($id_product == null){
                return false;
            }else{
                return $id_product;
            }
        }

        public function addProduct($name, $name_type, $link, $rate){
            $product = new Product();
            $product->name = $name;
            $product->id_type = $name_type;
            $product->link = $link;
            if ($rate == 1){
                $product->rate_plus = '1';
                $product->rate_minus = '0';
            }else{
                $product->rate_plus = '0';
                $product->rate_minus = '1';
            }
            $product->save();
            $id_product = $product->where('name', $name)->value('id');
            return $id_product;
        }


    }


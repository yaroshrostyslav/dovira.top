<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
//select id_product, name, name2, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus
// from `comments`
// inner join `products` on `comments`.`id_product` = `products`.`id`
// group by `id_product`
// order by minus DESC
    public static function getProductComments_up(){
        $product = Comment::join('products', 'comments.id_product', '=', 'products.id')
            ->join('types', 'products.id_type', '=', 'types.id')
            ->selectRaw('id_product, products.name, types.name as type_name, comments.created_at, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
            ->groupBy('id_product')
            ->orderBy('plus', 'DESC')
            ->limit('5')
            ->get();
        return $product;
    }

    public static function getProductComments_down(){
        $product = Comment::join('products', 'comments.id_product', '=', 'products.id')
            ->join('types', 'products.id_type', '=', 'types.id')
            ->selectRaw('id_product, products.name, types.name as type_name, comments.created_at, SUM(comments.rate_plus) as plus, SUM(comments.rate_minus) as minus')
            ->groupBy('id_product')
            ->orderBy('minus', 'DESC')
            ->limit('5')
            ->get();
        return $product;
    }







}

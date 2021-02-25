<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ProductController;


class CommentController extends Controller
{
    public function del_comment(Request $request){
        $comment = new Comment();
        $answer = new Answers();

        $del_answer = $answer->where([
            ['id_comment', '=', $request->id_comment]
        ])->delete();

        $del_comment = $comment->where([
            ['id', '=', $request->id_comment]
        ])->delete();
        return redirect()->back();
    }

    public function addComment(Request $request){

        $comment = new Comment();
        $visitor = new VisitorController();
        $product = new ProductController();
        $type = new TypeController;

        $validator = Validator::make($request->all(),[
            'name_product' => 'required',
            'name_type' => 'required',
            'link',
            'paymentMethod',
            'name_visitor'=> 'required',
            'text_comment'=> 'required'
        ]);

        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Check Visitors
        $cookie = $visitor->getCookie();
        if ($cookie == false){
            $id_visitor = $visitor->addVisitor($request->name_visitor);
        }else{
            $id_visitor = $visitor->checkVisitor($cookie);
        }

        // Check Type
        $id_type = $type->checkType($request->name_type);
        if ($id_type == null){
            $id_type = $type->addType($request->name_type);
        }

        // Check Product
        $id_product = $product->checkProduct($request->name_product);
        if ($id_product == null){
            $id_product = $product->addProduct($request->name_product, $id_type, $request->link, $request->paymentMethod);
        }

        // New comment about Product
        $comment->id_product = $id_product;
        $comment->id_visitor = $id_visitor;
        $comment->text = $request->text_comment;
        if ($request->paymentMethod == 1){
            $comment->rate_plus = '1';
            $comment->rate_minus = '0';
        }else{
            $comment->rate_plus = '0';
            $comment->rate_minus = '1';
        }
        $comment->save();

        return redirect('/product/'.$request->name_product)->with('status', 'Відгук успішно додано!');;

    }
}

<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use App\Posts;
use App\Comments;

class CommentController extends Controller
{
    public function store(Request $request, $pid)
    {
      if (!Posts::exists($pid)) {
        return response()
          ->json([
            'status'=> true,
            'message'=> 'post not found',
          ])->setStatusCode(404, 'post not found');
      }



      $v = Validator::make($request->all(), [
        'author'=> 'required',
        'comment'=> 'required',
      ]);

      if ($v->fails()) {
        return response()
          ->json([
            'status'=> true,
            'message'=> $v->messages(),
          ])->setStatusCode(400, 'creating error');
      }


      $c = new Comments;
      $c->author = $request->author;
      $c->comment = $request->comment;
      $c->posts_id = $pid;
      $c->save();


      return response()
        ->json([
          'status'=> true,
          'message'=> 'successful creation',
        ])->setStatusCode(201, 'successful creation');
    }
}

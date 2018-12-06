<?php

namespace App\Http\Controllers\api;

use Validator;
use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
      // return all
    }



    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
          'title'=> 'required',
          'anons'=> 'required',
          'text'=> 'required',
          'tags'=> 'required',
          'image'=> 'required',
        ]);

        if ($v->fails()) {
          return response()
            ->json([
              'status'=> false,
              'message'=> $v->messages(),
            ]);
        }


        $p = new Posts;
        $p->title = $request->title;
        $p->anons = $request->anons;
        $p->text = $request->text;
        $p->tags = $request->tags;

        if ($request->hasFile('image')) {
          $p->image = $request
            ->file('image')
            ->store('public');
        }

        $p->save();

        return response()
              ->json([
                'status'=> true,
                'post_id'=> $p->id,
                'message'=> 'successful creation',
              ])->setStatusCode(201, 'successful creation');
    }


    public function update(Request $request, $id)
    {
        $p = Posts::find($id);

        if (!$p) {
          return response()
              ->json([
                'status'=> true,
                'message'=> 'post not found',
              ])->setStatusCode(404, 'post not found');
        }


        $v = Validator::make($request->all(), [
          'title'=> 'required',
          'anons'=> 'required',
          'text'=> 'required',
          'tags'=> 'required',
        ]);

        if ($v->fails()) {
          return response()
            ->json([
              'status'=> false,
              'message'=> $v->messages(),
            ])->setStatusCode(400, 'editing error');
        }


        $p->title = $request->title;
        $p->anons = $request->anons;
        $p->text = $request->text;
        $p->tags = $request->tags;

        if ($request->hasFile('image')) {
          $p->image = $request
            ->file('image')
            ->store('public');
        }

        $u = $p->save();

        if (!$u) {
          return response()
              ->json([
                'status'=> false,
                'message'=> [],
              ])->setStatusCode(400, 'editing error');
        }

        return response()
              ->json([
                'status'=> true,
                'post'=> [],
                'message'=> 'successful creation',
              ])->setStatusCode(201, 'successful creation');
    }



    public function destroy(Request $request, $id)
    {
      $p = Posts::find($id);

      if (!$p) {
        return response()
              ->json([
                'status'=> true,
                'message'=> 'post not found',
              ])->setStatusCode(404, 'post not found');
      }

      $p->delete();

      return response()
            ->json([
              'status'=> true,
              'message'=> 'successful delete',
            ])->setStatusCode(201, 'successful delete');
    }
}

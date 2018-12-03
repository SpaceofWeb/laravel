<?php

namespace App\Http\Controllers\api;

use App\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $p = new Posts;
        $p->title = $request->title;
        $p->anons = $request->anons;
        $p->text = $request->text;
        $p->tags = $request->tags;

        if ($request->hasFile('image')) {
          $p->image = $request
            ->file('image')
            ->store('public');
        } else $p->image = '';

        $p->save();

        return response()
                ->json([
                  'status'=> true,
                  'message'=> 'successful creation',
                ])->setStatusCode(201, 'successful creation');
    }


    public function update(Request $request, Posts $posts)
    {
        //
    }
}

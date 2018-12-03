<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
		public function authForm()
    {
        return view('authForm');
    }

    public function auth(Request $request)
    {
        // return json_encode('null');
        // return dd($request);
        if ($request->login == 'admin' 
            && $request->password == 'sakhalin2018') {

            return response()->json(['status'=> true], 200)->setStatusCode(200, 'successful authorization');
        }

        return response()->json('error', 403);
    }
}

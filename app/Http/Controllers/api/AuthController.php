<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    private $apiToken;


    public function __construct()
    {
        $this->apiToken = uniqid(base64_encode(str_random(60)));
    }


    public function login(Request $request)
    {
        $u = User::where('email', $request->login)->first();

        if ($u && Hash::check($request->password, $u->password)) {

          $arr = ['remember_token'=> $this->apiToken];
          $update = User::where('email', $request->login)
                    ->update($arr);


          if ($update) {

            return response()->json([
              'status'=> true,
              'token'=> $this->apiToken,
            ])->setStatusCode(200, 'successful authorization');

          } else {

            return response()->json([
              'status'=> true,
              'message'=> 'invalid authorization data',
            ])->setStatusCode(401, 'invalid authorization data');

          }

        } else {

          return response()->json([
            'status'=> true,
            'message'=> 'invalid authorization data',
          ])->setStatusCode(401, 'invalid authorization data');

        }
    }
}

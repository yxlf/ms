<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *  当登录失败的时候触发json响应
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        //
        return Response::json(["message" => "You're not signed in"], 403);
    }
}

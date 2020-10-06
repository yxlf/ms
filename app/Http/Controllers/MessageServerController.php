<?php

namespace App\Http\Controllers;

use App\Models\MessageServer;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MessageServerController extends Controller
{


    public function __construct()
    {
        $this->middleware(function (Request $request, \Closure $next) {
            if ($request->query('tem') == 'asdfghjkl;') {
                return $next($request);
            } else {
                abort(403);
            }
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(MessageServer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'content' => 'required|string|max:300',
            ]);
        } catch (ValidationException $e) {
            return response()->json($e->errors(), 400);
        }
        $content = $request->input('content');
        $messageServer = new MessageServer();
        $messageServer->content = $content;
        $messageServer->save();
        return response()->json(['code' => 200, 'msg' => '操作成功', 'data' => null]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MessageServer::destroy([$id]);
        return response()->json(['msg' => '该条消息已经清楚', 'code' => 200, 'data' => null]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteAll()
    {
        MessageServer::delete();
        return response()->json(['msg' => '消息已经清空', 'code' => 200, 'data' => null]);
    }
}

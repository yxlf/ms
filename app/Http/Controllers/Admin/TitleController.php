<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Title;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $titles = Title::all();
        $titles->each(function ($title) {
            return $title->makeHidden(['created_at', 'updated_at']);
        });
        return response()->json($titles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $this->validate($request, [
                'name' => ['required', 'max:50', 'unique:titles']
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error_message' => $e->errors()], 405);
        }
        $name = $request->only("name");
        Title::create(['name' => $name["name"]]);
        return response()->json(["status" => "ok", 'name' => $name]);
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
        try {
            $this->validate($request, [
                'name' => ['required', 'max:50', 'unique:titles']
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error_message' => $e->errors()], 405);
        }
        $name = $request->only('name');
        try {
            $title = Title::findOrFail($id);
        } catch (\Exception $exception) {
            return response()->json(["error_message" => $exception->getMessage()], 405);
        }
        $title->name = $name["name"];
        $title->save();
        return response()->json(['message' => "success"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $class = Title::find($id);
        if ($class->commodities->isEmpty()) {
            Title::destroy($id);
            return response()->json(["message" => "success"]);
        } else {
            return response()->json(["error_message" => "Cannot delete because there are still items in this class"], 403);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::all();
        $stores->each(function ($store) {
            return $store->makeHidden(["created_at", "updated_at"]);
        });
        return response()->json($stores);
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
                'name' => ['required', 'max:50', 'unique:stores']
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error_message' => $e->errors()], 405);
        }
        $name = $request->only("name");
        Store::create(["name" => $name['name']]);
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
                'name' => ['required', 'max:50', 'unique:stores']
            ]);
        } catch (ValidationException $e) {
            return response()->json(['error_message' => $e->errors()], 405);
        }
        $name = $request->only('name');
        try {
            $store = Store::findOrFail($id);
        } catch (\Exception $exception) {
            return response()->json(["error_message" => $exception->getMessage()], 405);
        }
        $store->name = $name["name"];
        $store->save();
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
        $store = Store::find($id);
        if ($store->commodities->isEmpty()) {
            Store::destroy($id);
            return response()->json(["message" => "success"]);
        } else {
            return response()->json(["error_message" => "Cannot delete because there are still items in this class"], 403);
        }

    }
}

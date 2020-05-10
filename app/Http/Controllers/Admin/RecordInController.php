<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RcordIn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class RecordInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        $title = $request->get("title");
        $store = $request->get("store");
        $recordIns = RcordIn::with(["commodity", "commodity.store", 'commodity.title'])
            ->when($store, function ($query, $store) {
                /**
                 * @var $query Builder
                 */
                return $query->whereHas('commodity.store', function ($query) use ($store) {
                    /**
                     * @var $query Builder
                     */
                    $query->where("name", "LIKE", "%{$store}%");
                });
            })
            ->when($title, function ($query, $title) {
                /**
                 * @var $query Builder
                 */
                return $query->whereHas('commodity.title', function ($query) use ($title) {
                    /**
                     * @var $query Builder
                     */
                    $query->where("name", 'LIKE', "%{$title}%");
                });
            })
            ->orderBy("updated_at", "desc")
            ->paginate(10);
        return $recordIns;
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
                'count' => ["required_without:price", "integer", "gt:0"],
                'price' => ["required_without:count", "numeric", "gt:0"]
            ]);
        } catch (ValidationException $e) {
            return response()->json(["error_message" => $e->errors()], 405);
        }
        try {
            $recordIn = RcordIn::findOrFail($id);
        } catch (ModelNotFoundException $modelNotFoundException) {
            return response()->json(["error_message" => $modelNotFoundException->getMessage()], 404);
        }
        if ($request->filled('price')) {
            $recordIn->price = $request->input('price');
        }
        if ($request->filled('count')) {
            $count = $recordIn->count;
            $recordIn->count = $request->input("count");
            if ($request->input('count') != $count) {
                $recordIn->commodity()->increment('count', $request->input('count') - $count);
            }
        }
        $recordIn->save();
        return response()->json(['status' => "success"]);
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
        try {
            $recordIn = RcordIn::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(["error_message" => $e->getMessage()], 404);
        }
        $count = $recordIn->count;
        $total_count = $recordIn->commodity->count;
        if ($count > $total_count) {
            return response()->json(["error_message" => "Resource does not exist"], 403);
        }
        $recordIn->commodity()->decrement("count", $count);
        $recordIn->delete();
        return response()->json(["status" => "success"]);
    }
}

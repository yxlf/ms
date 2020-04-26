<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\RcordIn;
use App\Models\Rcordout;
use App\Models\Store;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;
use function foo\func;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $store_id = $request->get("store_id");
        $title_id = $request->get("title_id");
        $product_name = $request->get('product_name');
        $page_size = $request->get('page_size', 10);
        $commodities = Commodity::where('count', ">", 0)
            ->when($store_id, function ($query) use ($store_id) {
                /**
                 * @var Builder $query
                 */
                return $query->where('store_id', 'LIKE', "%{$store_id}%");
            })->when($title_id, function ($query) use ($title_id) {
                /**
                 * @var Builder $query
                 */
                return $query->where('title_id', 'LIKE', "%{$title_id}%");
            })->when($product_name, function ($query) use ($product_name) {
                /**
                 * @var Builder $query
                 */
                return $query->where('product_name', 'LIKE', "%{$product_name}%");
            })->with(['title', 'store'])->orderBy('updated_at', 'DESC')
            ->paginate($page_size);
        return response()->json($commodities);

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
                'product_name' => ['required', 'max:100'],
                'store_id' => ['required', 'exists:stores,id'],
                'title_id' => ["required", 'exists:titles,id'],
                'count' => ['required', 'integer', 'gt:0'],
                'price' => ['required', 'numeric', 'gt:0'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(["error_message" => $e->errors()], 405);
        }
        $product_name = $request->get("product_name");
        $store_id = $request->get("store_id");
        $title_id = $request->get("title_id");
        $count = $request->get("count");
        $price = $request->get("price");
        $commodity = Commodity::where([
            ["product_name", "=", $product_name],
            ["store_id", "=", $store_id],
            ['title_id', "=", $title_id],
        ])->first();
        if ($commodity) {
            $commodity->increment('count', $count);
            $commodity->save();
            $commodity->refresh();
        } else {
            $commodity_params = $request->only(['product_name', 'count', 'store_id', 'title_id']);
            $commodity = Commodity::create($commodity_params);
        }
        $rcordIn = new RcordIn();
        $rcordIn->name = $product_name;
        $rcordIn->count = $count;
        $rcordIn->price = $price;
        $commodity->recordIns()->save($rcordIn);
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //此项详情
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
        try {
            $this->validate($request, [
                'count' => 'required|integer|gt:0',
                'price' => ['required', 'numeric', 'gt:0'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(["error_message" => $e->errors()], 405);
        }
        $count = $request->get("count", 0);
        $price = $request->get('price');
        try {
            $commodity = Commodity::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error_message' => $exception->getMessage()], 404);
        }
        $total_count = $commodity->count;
        if ($total_count < $count) {
            return response()->json(['error_message' => "Total exceeded"], 403);
        }
        $commodity->decrement('count', $count);
        $commodity->recordOuts()->create([
            'name' => $commodity->product_name,
            'count' => $count,
            'price' => $price
        ]);
        return response()->json(["message" => "success"]);
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

    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

// use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::connection('mysql')->select('select * from products');
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'id' => $request->id,
            'product_image' => $request->product_image,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,

        ]);
        // $input = $request->all();


        // $id = $request->id;
        // $product_image = $request->product_image;
        // $product_name = $request->product_name;
        // $category_id = $request->category_id;
        // $product_description = $request->product_description;
        // $product_price = $request->product_price;

        $input = $request->all();

        if ($image = $request->file('product_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        }
        // $product = DB::table('product_models')->get(); 
        $postProduct = Product::create($input);

        // Storage::disk('image')->put($product_image, file_get_contents($request->image));



        // $postProduct = DB::connection('mysql')->insert("INSERT INTO products (id, product_image, product_name, category_id, product_description, product_price)
        // VALUE
        // ('" . $id . "','" . $product_image . "','" . $product_name . "','" . $category_id . "','" . $product_description . "','" . $product_price . "')");

        if ($postProduct) {
            $res = response()->json(
                [
                    'status' => 'success'
                ],
                200
            );
        } else {
            $res = response()->json(
                [
                    'status' => 'failed'
                ],
                500
            );
        }
        return $res;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image = null;
        if ($request->hasFile('product_image')) {
            $uuid = Str::uuid()->toString();
            $image = $uuid . $request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->move('image/', $image);
        }


        $data = [
            'product_name' => $request->input('product_name'),
            'product_description' => $request->input('product_description'),
            'category_id' => $request->input('category_id'),
            'product_price' => $request->input('product_price'),
        ];
        if ($image) {
            $data['product_image'] = $image;
        }

        DB::table('products')
            ->where('id', $request->id)
            ->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return product::all();
        return new Collection(product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request) //For Store used post request
    // {
    //     $request->validate([
    //         'name'=>'required',
    //         'slug'=>'required',
    //         'price'=>'required',
    //     ]);
    //     return product::create($request->all());
    //     // return new Collection([product::create($request->all())]);
    // }
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required',
        'slug' => 'required',
        // 'description' => 'required',
        'price' => 'required',
        // 'description' => 'required',
        // Add other validation rules here
    ]);

    // Create a new Product instance with the validated data
    $product = new Product($validatedData);

    // Save the product to the database
    $product->save();

    // Return the newly created product
    return response()->json($product, 201);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return product::find($id);
        return new Collection([product::find($id)]);
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
    public function update(Request $request, $id) //For update used Put request
    {
        // $product=product::find($id);
        // $product->update($request->all());
        // return $product;
        $product = product::find($id);
        $product->update($request->all());
        return new Collection([$product]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return product::destroy($id);
        return new Collection([product::destroy($id)]);
    }
}

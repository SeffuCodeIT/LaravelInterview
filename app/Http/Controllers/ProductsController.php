<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function manage()
    {
        //
        $product = Products::all();
        return view("admin/manage", compact('product'));
    }

    public function modmanage()
    {
        //
        $product = Products::all();
        return view("moderator/modmanage", compact('product'));
    }

    public function products()
    {
        //
        $user_id = Auth::user()->id;
        return view("admin.addproduct", compact('user_id'));
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
    public function store(Request $request)
    {
        //

        $productDetails = $request->all();

        if ($coverPicFile = $request->file('cover_pic')) {
            $coverPicFileName = time() . $coverPicFile->getClientOriginalName();
            $coverPicFile->move('product-pics', $coverPicFileName);
            $productDetails["cover_pic"] = $coverPicFileName;
            Products::create($productDetails);
            Session::flash('success', 'Product added successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Product addition failed');
            return redirect()->back();
        }
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
        $user_id = Auth::user()->id;

        $product = Products::find($id);

        return view('admin.updateproduct', compact('product', 'user_id'));
    }

    public function modedit($id)
    {
        $user_id = Auth::user()->id;

        $product = Products::find($id);

        return view('moderator.updateproduct', compact('product', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Products::find($id);
        $product->update($request->all());
        Session::flash('success', 'Product updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Products::find($id);

        $product->delete();
        Session::flash('success', 'Product deleted successfully');

        return redirect()->back();


    }
}

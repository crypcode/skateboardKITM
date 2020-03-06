<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use File;
use Illuminate\Support\Facades\Auth;
use Gate;

use App\Providers\AuthServiceProvider;
class ItemController extends Controller
{

    public function __construct(){
        $this->middleware('auth',[]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addItem()
    {
        $categories = Category::all();
        return view ('shopend.pages.addItem', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $items = Item::all();
        $categories = Category::all();

        return view ('shopend.pages.admin', compact('items','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_item(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'cat_id' => 'required',
            'img' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        $path = $request->file('img')->store('public/images');
        $filename = str_replace('public/', "", $path);


        $item = Item::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'quantity' => request('quantity'),
            'cat_id' => request('cat_id'),
            'img' => $filename,
            'userID' => Auth::id()
        ]);


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function itemUpdate(Item $item)
    {
        $categories = Category::all();
        return view('shopend.pages.updateItem', compact('item', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function updateItem(Request $request, Item $item)
    {
        Item::where('id', $item->id)
            ->update(['title' => request('title'),
                'description' => request('description'),
                'price' => request('price'),
                'quantity' => request('quantity')]);

        if ($request->file('img')) {
            File::delete('storage/' . $item->img);
            $path = $request->file('img')->store('public/images');
            $filename = str_replace('public/', "", $path);
            Item::where('id', $item->id)
                ->update(['img' => $filename
                ]);
        }

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(Item $item)
    {

        $item->delete();
        return redirect('/');

    }
}

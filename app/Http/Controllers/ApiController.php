<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Order;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function allProducts()
    {
        $items = Item:: select(
            'items.*',
            'categories.name as category_name'
        )->join('categories', 'categories.id', '=', 'items.cat_id')
            ->get();
        return $items;
    }

    public function saveOrder(Request $request){

        Order::create([
            'buyerName' => request('buyerName'),
            'buyerSurname' => request('buyerSurname'),
            'buyerAddress' => request('buyerAddress'),
            'itemId' => request('itemId'),
            'productQuantity' => request('productQuantity'),
            'orderSum' => request('orderSum')
        ]);
        return response($request);

    }
    public function getItemById($id){
        return Item::find($id);
    }
}


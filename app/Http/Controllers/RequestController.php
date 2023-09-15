<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestProduct;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        $requestProduct = new RequestProduct;
        
        $user = auth()->user();
        $requestProduct->user_id =$user->id;
        $requestProduct->product_id =$request->product_id;
        $requestProduct->quantidade =$request->quantidade;
        $requestProduct->pagamento =$request->pagamento;
        
        $requestProduct->save();
        return redirect('/redirects');
    }

    public function findRequestsByUserId()
    {

        $userId = auth()->user()->id;
        $requests = RequestProduct::where('user_id', $userId)
        ->join('products', 'request_products.product_id', '=', 'products.id')
        ->get();

     

        return view('user', ['requests' => $requests]);
    }


}

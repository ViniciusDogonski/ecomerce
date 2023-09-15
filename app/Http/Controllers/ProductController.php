<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\UploadedFile;

class ProductController extends Controller
{
    
    public function getAll()
    {

        $products = DB::table('products')->get();

        return view('welcome',['products'=> $products]);

        
    }

    public function getById($id)
    {
        $product = DB::table('products')->find($id);
    
        return view('produto',['produto'=> $product]);
    }

    public function store(Request $request)
    {
        $product = new Product;

        $product-> nome = $request->nome;
        $product-> valor = $request->valor;
        $product-> altura = $request->altura;
        $product-> largura = $request->largura;
        $product-> peso = $request->peso;


      if($request->hasFile('imagem') && $request->File('imagem')->isValid()){

        $requestImage = $request->imagem;
        $extencio =  $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extencio;

        $requestImage->move(public_path('img/produtos'),$imageName);

        $product->imagem = $imageName;

      }
 



        $product->save();

        return redirect('/')->with('msg','produto criado com sucesso!');

    }
    public function destroy($id)
    {
        Product::findOrFail($id)->get();
    }
    
}

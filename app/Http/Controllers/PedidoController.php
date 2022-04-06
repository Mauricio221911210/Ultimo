<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Pedido;
use App\Models\TemporatyPedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PedidoController extends Controller
{
    public function addCarrito(Request $request){



        $values=$request->all();


        $productex=Pedido::where("usuario_id",Auth::user()->id)->where("nombre",$request->nombre)->exists();
        if($productex){

           return redirect()->back()->withErrors(['msg' => 'El producto '.$request->nombre.' ya esta en el carrito']);
        }else{
        $carrito=new Pedido;
        $carrito->name=$request->name;
        $carrito->precio=$request->precio;
        $carrito->cantidad=$request->cantidad;
        $carrito->total=$request->total;
        $carrito->user_id=Auth::user()->id;
        $carrito->save();
        return back();

        }


   }

   public function showCarrito(){

       $status=count(Pedido::all()->where("usuario_id",Auth::user()->id));

       $carrito=Auth::user()->carrito;
       $sumtotal=DB::table("carrito")->where("usuario_id",Auth::user()->id)
                 ->sum("carrito.total");
       return view("index")->with("carrito",$carrito)->with("sumtotal",$sumtotal)->with("status",$status);
   }

   public function detallePedido(Request $request){



    dd($request->all());



   }
   public function eliminar(Pedido $id){
       $id->delete();
       return back();

   }

   public function store(Request $request){
        dd($request);
   }
}

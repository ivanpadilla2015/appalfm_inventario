<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Inventario;

class InventalistadoController extends Controller
{
  
	  public function vistalistainven(){
	   return view('equipos.listarinven');
    }

   public function index()
   {
   	 //$items= Inventario::orderBy('id', 'asc')->paginate(15);
     $items = Inventario::with(['user', 'dependen'])->paginate(15); //inventario relacionado con user, dependen

   	  $response = [
            'pagination' => [
            'total' => $items->total(),
            'per_page' => $items->perPage(),
            'current_page' => $items->currentPage(),
            'last_page' => $items->lastPage(),
            'from' => $items->firstItem(),
            'to' => $items->lastItem()
            ],

            'data' => $items
        ];

        return response()->json($response);
   }
}

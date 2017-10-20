<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dependen;
use App\Element;
use App\Inventario;
use App\Detalle;

class InvendetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vistaequipo(){

        return view('equipos.equipos');
    }


    public function index()
    {
       $usu = User::all();
       $deps = Dependen::all();
       $elem = Element::all();
       $response = ['datauser' => $usu, 'datadepe' => $deps, 'dataelem' => $elem ];
       return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$inven = Inventario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [

              'user_id' => 'required',
              'dependen_id' => 'required'
            
            
        ]);

        $inventa =  new Inventario;
        $inventa->user_id = $request['user_id'];
        $inventa->dependen_id = $request['dependen_id'];
        $inventa->save();
       
        for ($i=0; $i < count($request['input']); $i++) { 
            
            
            $deta = new Detalle;
            $deta->inventario_id = $inventa->id;
            $deta->user_id = $request['user_id'];
            $deta->element_id = $request['input'][$i]['element_id'];
            $deta->marca = $request['input'][$i]['marca'];
            $deta->modelo = $request['input'][$i]['modelo'];
            $deta->serial = $request['input'][$i]['serial'];
            $deta->num_activo = $request['input'][$i]['num_activo'];
               $date = date_create($request['input'][$i]['fechadquirido']); //devuelve un objeto dateTime
            $deta->fechadquirido = date_format($date, 'Y-m-d'); //devuelve una fecha con formato según el formato especificado.
            $deta->cantidad = $request['input'][$i]['cantidad'];
            $deta->estado = '';
            $deta->save();
           


        }

      

        return response()->json([
            'message' => 'funciono'

       ]);

      // $fe=  strtotime($request['input'][0]['fechadquirido']);
      // dd(date($request['input'][0]['fechadquirido']));
       //dd(date("Y", $fe)); // Year (2003)
       //dd(date($fe));

       /*$date = date_create($request['input'][0]['fechadquirido']);
       echo (date_format($date, 'Y-m-d'));*/

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
       
       $response =  Detalle::where('inventario_id', $id)->with('element')->get();
       return response()->json($response);
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
         $this->validate($request, [

              'user_id' => 'required',
              'dependen_id' => 'required'
            
        ]);
        $inventa = Inventario::find($id);
        $inventa->user_id = $request['user_id'];
        $inventa->dependen_id = $request['dependen_id'];
        $inventa->save();

        Detalle::where('inventario_id',$id)->delete();

        for ($i=0; $i < count($request['input']); $i++) { 
            
            
            $deta = new Detalle;
            $deta->inventario_id = $id;
            $deta->user_id = $request['user_id'];
            $deta->element_id = $request['input'][$i]['element_id'];
            $deta->marca = $request['input'][$i]['marca'];
            $deta->modelo = $request['input'][$i]['modelo'];
            $deta->serial = $request['input'][$i]['serial'];
            $deta->num_activo = $request['input'][$i]['num_activo'];
               $date = date_create($request['input'][$i]['fechadquirido']); //devuelve un objeto dateTime
            $deta->fechadquirido = date_format($date, 'Y-m-d'); //devuelve una fecha con formato según el formato especificado.
            $deta->cantidad = $request['input'][$i]['cantidad'];
            $deta->estado = '';
            $deta->save();

        }

        return response()->json([
            'message' => 'Actualizo'

       ]);

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
    }
}

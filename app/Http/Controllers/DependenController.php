<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Dependen;

class DependenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function depvista()
    {

        return view('dependen.dependen');
    }

    public function index()
    {
          $deps =  Dependen::latest()->paginate(15); //latest ordedar por mas reciente por  columna created_at
        
        $response = [
            'pagination' => [
            'total' => $deps->total(),
            'per_page' => $deps->perPage(),
            'current_page' => $deps->currentPage(),
            'last_page' => $deps->lastPage(),
            'from' => $deps->firstItem(),
            'to' => $deps->lastItem()
            ],

            'data' => $deps
        ];

        return response()->json($response);
        
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    
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

              'nombredepen' => 'required|string|max:50',
            
            
        ]);

        $create = Dependen::create([
            'nombredepen' => $request['nombredepen'],
        ]);
        
        return response()->json($create);
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [

              'nombredepen' => 'required|string|max:50',
        ]);

        $edit = Dependen::find($id)->update($request->all());
        return response()->json($edit);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dependen::find($id)->delete();
        return response()->json('done');
    }
}

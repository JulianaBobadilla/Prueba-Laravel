<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Empresa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresas = Empresa::select('*')->get();
      return \View::make('Empresa/list',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return \View::make('Empresa/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required|unique:App\Models\Empresa',
        'email' => 'unique:App\Models\Empresa|email',
        'website' => 'unique:App\Models\Empresa',
        'imagen' => 'dimensions:min_width=100,min_height=100'
      ]);

      //CREAR EMPRESA
      $empresa = new Empresa;
      $empresa->name = $request->name;
      $empresa->email = $request->email;
      $empresa->website = $request->website;
      //VALIDAR SI EXISTE UN ARCHIVO EN EL CAMPO DE IMAGEN
      if($request->hasFile("imagen")){
          //OBTENEMOS EL ARCHIVO
          $imagen = $request->file("imagen");
          //GENERAMOS EL NOMBRE PARA EL ARCHIVO
          $nombreimagen = Str::slug($request->name).".".$imagen->guessExtension();
          //GUARDAMOS EL ARCHIVO EN LA CARPETA PUBLIC CON EL NOMBRE GENERADO
          $request->file('imagen')->storeAs('public',$nombreimagen);
          //GUARDAMOS EN BASE DE DATOS EL NOMBRE GENERADO PARA EL ARCHIVO
          $empresa->img = $nombreimagen;

      }
      $empresa->save();

      return redirect ('empresas');
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
      $empresa = Empresa::find($id);
      return view('Empresa/update', compact('empresa'));
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
      $request->validate([
        'name' => 'required',
        'email' => 'email'
      ]);

      //ACTUALIZAR EMPRESA
      $empresa = Empresa::find($id);
      $empresa->name = $request->name;
      $empresa->email = $request->email;
      $empresa->website = $request->website;
      $empresa->save();

      return redirect ('empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //BUSCAR EN BASE DE DATOS EL REGISTRO Y ELIMINARLO
      DB::table('empresas')->delete($id);
      return redirect('empresas');
    }
}

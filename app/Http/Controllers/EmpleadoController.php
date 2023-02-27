<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Models\Empresa;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Mail\EmailBienvenido;

class EmpleadoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $empleados = Empleado::select('empleados.*','empresas.name')
                          ->join('empresas','empresas.id','=','empleados.company_id')
                          ->get();

    return \View::make('Empleado/list',compact('empleados'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $empresas = Empresa::select('*')->get();
    return \View::make('Empleado/create', compact('empresas'));
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
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'unique:App\Models\Empresa|email',
      'phone' => 'numeric'
    ]);

    //CREAR EMPRESA
    $empleado = new Empleado;
    $empleado->first_name = $request->first_name;
    $empleado->last_name = $request->last_name;
    $empleado->email = $request->email;
    $empleado->phone = $request->phone;
    $empleado->company_id = $request->company_id;
    $empleado->save();

    Mail::to($request->email)->queue(new EmailBienvenido());

    return redirect ('empleados');
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
    $empleado = Empleado::find($id);
    $empresas = Empresa::select('*')->where('id','!=',$empleado->company_id)->get();
    $empresa = Empresa::select('*')->where('id','=',$empleado->company_id)->get();

    return view('Empleado/update', compact('empleado','empresas','empresa'));
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
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'email',
      'phone' => 'numeric'
    ]);

    //ACTUALIZAR EMPRESA
    $empleado = Empleado::find($id);
    $empleado->first_name = $request->first_name;
    $empleado->last_name = $request->last_name;
    $empleado->email = $request->email;
    $empleado->phone = $request->phone;
    $empleado->company_id = $request->company_id;
    $empleado->save();

    return redirect ('empleados');
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
    DB::table('empleados')->delete($id);
    return redirect('empleados');
  }
}

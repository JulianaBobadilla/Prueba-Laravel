@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">{{ __('EMPLEADOS')}}</div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-4">
            <a href="{{ route('empleados.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Empleado</a>
          </div>
        </div></br>
        <table class="display nowrap cell-border datatablesSimple" style="width:100%">
          <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </thead>
          <tbody>
            @foreach($empleados as $Empleado)
            <tr>
              <td>{{$Empleado['first_name']}}</td>
              <td>{{$Empleado['last_name']}}</td>
              <td>{{$Empleado['email']}}</td>
              <td>{{$Empleado['phone']}}</td>
              <td>{{$Empleado['name']}}</td>
              <td>
                <a href="{{ route('empleados.edit', $Empleado->id) }}" class="btn btn-success btn"><i class="fas fa-edit" aria-hidden="true"></i></a>
              </td>
              <td>
                {!! Form::open(['route' => ['empleados.destroy', $Empleado], 'method' => 'DELETE']) !!}
                  <button class="btn btn-danger btn"><i class="fa-solid fa-trash"></i></button>
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection

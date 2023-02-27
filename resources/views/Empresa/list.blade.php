@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
      <div class="card-header">{{ __('EMPRESAS')}}</div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-2">
            <a href="{{ route('empresas.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Empresa</a>
          </div>
        </div></br>
        <table class="display nowrap cell-border datatablesSimple" style="width:100%">
          <thead>
            <th>Name</th>
            <th>Email Electrónico</th>
            <th>Website</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </thead>
          <tbody>
            @foreach($empresas as $Empresa)
            <tr>
              <td>{{$Empresa['name']}}</td>
              <td>{{$Empresa['email']}}</td>
              <td>{{$Empresa['website']}}</td>
              <td>
                <a href="{{ route('empresas.edit', $Empresa->id) }}" class="btn btn-success btn"><i class="fas fa-edit" aria-hidden="true"></i></a>
              </td>
              <td>
                {!! Form::open(['route' => ['empresas.destroy', $Empresa], 'method' => 'DELETE']) !!}
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

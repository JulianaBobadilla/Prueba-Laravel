@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">{{ __('ACTUALIZAR EMPLEADO')}}</div>
                  <div class="card-body">
                    @if ($errors->any())
                    <div class=" col-md-offset-2 separacion alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error}}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    {!! Form::model($empleado, ['route' => ['empleados.update', $empleado->id],'method' => 'PUT']) !!}
                      <div class="form-group row">
                          <label for="first_name" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('First Name') }}</label>
                          <div class="col-md-6">
                              <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name', $empleado->first_name) }}" autocomplete="off" onkeypress="return SoloLetras(event)">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="last_name" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Last Name') }}</label>
                          <div class="col-md-6">
                              <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name', $empleado->last_name) }}" autocomplete="off" onkeypress="return SoloLetras(event)">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="email" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Email') }}</label>
                          <div class="col-md-6">
                              <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $empleado->email) }}" autocomplete="off">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="phone" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Phone') }}</label>
                          <div class="col-md-6">
                              <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $empleado->phone) }}" autocomplete="off" onkeypress="return SoloNumeros(event)">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="company_id" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Company')}}</label>
                          <div class="col-md-6">
                              <select id="company_id" name="company_id" class="form-control select_company">
                                @foreach($empresa as $e)
                                  <option value="{{$e->id}}">{{$e->name}}</option>
                                @endforeach
                                @foreach($empresas as $empresa)
                                  <option value="{{$empresa->id}}">{{$empresa->name}}</option>
                                @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-5">
                              <button class="btn btn-primary">
                                  {{ __('Guardar')}}
                                  <i class="fa-solid fa-floppy-disk"></i>
                              </button>
                          </div>
                      </div>
                    {{ Form::close() }}
                </div>
              </div>
          </div>
    </div>
</div>
<script> $(document).ready(function() { $('#InspeccionTelas').addClass('active'); }); </script>
@endsection

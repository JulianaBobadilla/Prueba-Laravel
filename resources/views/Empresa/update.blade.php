@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">{{ __('ACTUALIZAR EMPRESA')}}</div>
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
                    {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id],'method' => 'PUT']) !!}
                      <img src="/storage/{{$empresa->img}}" class="img-fluid img-thumbnail rounded mx-auto d-block" alt="Responsive image">
                      <div class="form-group row">
                          <label for="name" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Name') }}</label>
                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $empresa->name) }}" autocomplete="off" onkeypress="return SoloLetras(event)">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="email" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Email Electrónico') }}</label>
                          <div class="col-md-6">
                              <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $empresa->email) }}" autocomplete="off">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="website" class="col-md-3 offset-md-1 col-form-label text-md-right">{{ __('Website') }}</label>
                          <div class="col-md-6">
                              <input id="website" type="text" class="form-control" name="website" value="{{ old('website', $empresa->website) }}" autocomplete="off">
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

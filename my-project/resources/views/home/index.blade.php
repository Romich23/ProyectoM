@extends('layouts.index')

@section('title', 'Reportes del ITCh')

@section('content')
<div class="card-group">
@foreach($reportes['reportes'] as $reporte)
<div class="card">
    <img src="{{ asset('/storage/'.$reporte->getImage()) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$reporte->Nombre}}</h5>
      <p class="card-text">{{$reporte->Descripción}}</p>
      <p class="card-text">{{$reporte->NivelRiesgo}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{$reporte->Fecha}}</small>
    </div>
  </div>
  

 @endforeach


</div>
@endsection

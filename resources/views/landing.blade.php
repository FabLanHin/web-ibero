@extends('layouts.master')

@section('content')
<section class="container-image">
<div class="px-4 pt-5 text-center border-bottom body-landing">
  <h1 class="display-4 fw-bold app-landing">Apps de Tareas</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4 text-landing">Si quieres gestionar mejor tus tareas, utiliza nuestra app para poder administrar tus tiempos con tus tareas.</p>

    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
      <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 me-sm-3 btn-registro">Registrate Ahora</a>
      <a href="" class="btn btn-primary btn-lg px-4">Conoce más</a>
    </div>
  </div>
  <div class="overflow-hidden" style="max-height: 30vh;">
    <div class="container px-5">
      <img src="{{ asset('img/5.jpg') }}" class="img-fluid border rounded-3 shadow-lg mb-4" alt="Example image " width="700" height="500" loading="lazy">
    </div>
  </div>
</div>


@endsection

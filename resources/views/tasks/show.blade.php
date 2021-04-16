@extends('layouts.master')

@section('content')
<section class="show-img">
<div class="container">
	<div class="row">
		<div class="col col-md-5">
<a class="btn btn-primary mt-4" href="{{ URL::previous() }}">Regresar</a>
	<hr >
<div class="card text-center card-show">
	<div class="hw-pending">
		<h5 class="card-header text-center bg-success text-white">Tareas Pendientes</h5>
	</div>
	
	<div class="name-show">
		<h4>{{ $tarea->name }}</h4>
	</div>
	<div class="desc-show">
		<p>{{ $tarea->description }}</p>
	</div>
	<div class="date-show">
		<p>Fecha de entrega: {{ $tarea->due_date }}</p>
	</div>

</div>
	<div class="row">
	<div class="col-2 edit-show-btn">
		<a class="btn btn-warning mt-4" href="{{ route('tareas.edit', $tarea->id)}}">Editar
		</a>
	</div>

	<div class="col-2 delete-show">
	<form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}"> 
		{{ csrf_field() }}
		{{ method_field('DELETE') }}
		<button class="btn btn-danger mt-4 ms-3" type='submit'>Borrar</button>
		
	</form>
	</div>
	</div>
			</div>
		</div>
	</div>

	
@endsection
</section>
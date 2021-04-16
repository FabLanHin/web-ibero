@extends('layouts.master')

@section('content')
<section class="edit-show">
<div class="container">
	<div class="row">
		<div class="col col-md-7 text-show-edit">
	<form method="POST" action="{{ route('tareas.update', $tarea->id) }}">

		{{ csrf_field() }}
		{{ method_field('PUT') }}

		<div class="form-group mb-3 mt-4 frm-group-edit">
			<div class="color-rgba">
			<label>Nombre de tarea</label>
			</div>
			<input class="form-control" type="text" name="name" placeholder="Nombre de Tareas" value="{{ $tarea->name }}">
		</div>
			
		<div class="form-group mb-3 frm-group-edit">
			<div class="color-rgba2">
			<label>Descripción</label>
			</div>
			<textarea class="form-control" name="description">{{ $tarea->description }}</textarea>
		</div>

		<div class="form-group mb-3 frm-group-edit">
			<div class="color-rgba3">
			<label>Fecha de Entrega</label>
			</div>
			<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
		</div>
		
		<br>

		<button class="btn btn-primary" type="submit">Guardar Tarea</button>
	</form>
</div>
</div>
</div>
@endsection
</section>
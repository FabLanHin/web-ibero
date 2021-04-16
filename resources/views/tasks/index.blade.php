@extends('layouts.master')

@section('content')
<section class="hw-image">
<div class="container-fluid mb-4">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div class="title-page px-4 py-3">
				<div class="fondo-titulo">
					<h3 class="display-1">¡Bienvenido {{ Auth::user()->name }}!</h3>
				</div>
				<div class="p-body">
					<p class="lead p-lead">{{ Auth::user()->name }}, aquí podrás encontrar, a más detalle, tus tareas.</p>
				</div>
	</div>
		</div>
		<div class="col-md-4 d-flex justify-content-center">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarea"> Crear nueva tarea
</button>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-form">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="body-color">
      <form method="POST" action="{{ route('tareas.store') }}">

	      <div class="modal-body">
	        
			{{ csrf_field() }}

			<div class="form-group mb-3">
				<label>Nombre de tarea</label>
				<input class="form-control" type="text" name="name" placeholder="Nombre de Tareas">
			</div>
				
			<div class="form-group mb-3">
				<label>Descripción</label>
				<textarea class="form-control" name="description"></textarea>
			</div>

			<div class="form-group mb-3">
				<label>Proyectos</label>
				<select class="form-control" name="project_id">
					@foreach($proyectos as $proyecto)
					<option value="{{ $proyecto->id }}">{{ $proyecto->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group mb-3">
				<label>Modalidad</label>
				<select class="form-control" name="modality">
					<option value="Individual">Individual</option>
					<option value="Por Equipo">Por Equipo</option>
					<option value="Parejas">Parejas</option>
					<option value="Asistencia Externa">Asistencia Externa</option>
				</select>
			</div>

			<div class="form-group mb-3">
				<label>Fecha de Entrega</label>
				<input class="form-control" type="date" name="due_date">
			</div>

	      </div>
	  	  </div>

	  	  <div class="footer-color">
	      <div class="modal-footer">
	      	<div class="close-btn">
	        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
	    	</div>

	    	<div class="save-btn">
	        	<button type="submit" class="btn btn-primary">Guardar Tarea</button>
	    	</div>
	      </div>
      </form>
  	</div>
    </div>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-md-12">
	
			<div class="card">
				<div class="card-tareas">
				<h5 class="card-header">Listado de Tareas</h5>
				</div>
				<div class="card-body">
					<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tarea</th>
      <th scope="col">Descripción</th>
      <th scope="col">Estado</th>
      <th scope="col">Modalidad</th>
      <th scope="col">Fecha de Entrega</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($tareas as $tarea)
    <tr>
      <td scope="row" class="align-middle">{{ $tarea->id }}</td>
      <td class="align-middle">{{ $tarea->name }}</td>
      <td class="align-middle">{{ $tarea->description }}</td>
      <td class="align-middle">
      	@if($tarea->is_completed == true)
      	<span class="badge bg-success bg-complete">COMPLETADA</span>
      	@else
      	<span class="badge bg-warning">INCOMPLETO</span>
      	@endif
      	</td>
      <td class="align-middle">
      	@if($tarea->modality == 'Individual')
      	<span class="badge bg-primary">{{ $tarea->modality }}</span>
      	@endif
      	@if($tarea->modality == 'Por Equipo')
      	<span class="badge bg-success">{{ $tarea->modality }}</span>
      	@endif
      	@if($tarea->modality == 'Parejas')
      	<span class="badge bg-light">{{ $tarea->modality }}</span>
      	@endif
      	@if($tarea->modality == 'Asistencia Externa')
      	<span class="badge bg-dark">{{ $tarea->modality }}</span>
      	@endif
      </td>
      <td class="align-middle">{{ $tarea->due_date }}</td>
      <td class="align-middle">

      	<div class="card-btn">
      	<form method="POST" action="{{ route('completar.tarea', $tarea->id )}}">
			{{ csrf_field() }}	
			@if($tarea->is_completed == true)
			<button class="btn btn-sm bg-light row my-1" type="submit">COMPLETAR</button>
			@else
			<button class="btn btn-sm bg-warning row my-1" type="submit">DESCOMPLETAR</button>
			@endif
		</form>

		<form>
      	<a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-sm bg-primary row my-1">Ver detalle</a>
      	</form>
      	<form class="form-edit">
      	<a href="javascript:void(0)" class="btn btn-sm bg-secondary row my-1 btn-edit" data-bs-toggle="modal" data-bs-target="#editarTarea_{{ $tarea->id }}">
  			Editar
		</a>
		</form>
		<form method="POST" action="{{ route('tareas.destroy', $tarea->id )}}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}	
			<button class="btn btn-sm bg-danger row my-1" type="submit">BORRAR</button>
		</form>
		</div>
    </td>
    </tr>

    <div class="modal fade" id="editarTarea_{{ $tarea->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
      <div class="modal-body">
        
      	<!-- Nuestro campo de protección de formulario -->
		{{ csrf_field() }}
		{{ method_field('PUT') }}	

		<!-- Campos de formulario -->
		<div class="form-group mb-3">
			<label>Nombre de tarea</label><br>
			<input class="form-control" type="text" name="name" placeholder="Nombre de Tarea" value="{{ $tarea->name }}">
		</div>
		
		<div class="form-group mb-3">
			<label>Descripción</label>
			<textarea class="form-control" name="description">{{ $tarea->description }}</textarea>
		</div>
		<div class="form-group mb-3">
				<label>Estado</label>
				<select class="form-control" name="checked">
					<option value="En proceso">En proceso</option>
					<option value="Completado">Completado</option>
				</select>
			</div>
		<div class="form-group mb-3">
			<label>Modalidad</label>
			<select class="form-control" name="modality">
				<option value="Individual">Individual</option>
				<option value="Por Equipo">Por Equipo</option>
				<option value="Parejas">Parejas</option>
				<option value="Asistencia Externa">Asistencia Externa</option>
			</select>
		</div>
		
		<div class="form-group mb-3">
			<label>Fecha de entrega</label>
			<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
  </form>
    </div>
  </div>
</div>
    	@endforeach
  </tbody>
</table>				</div>


				<div class="list-group list-group-flush mt-3">
		
			
		
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
</section>
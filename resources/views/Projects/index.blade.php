@extends('layouts.master')

@section('content')
<section class="image-proj">
<div class="container-fluid mb-4">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div class="title-page px-4 py-3">
		
		<h1 class="lead lead-proj">Tus Proyectos:</h1>
	</div>
		</div>
		<div class="col-md-4 d-flex justify-content-center">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarea"> Crear nuevo proyecto
			</button>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-form">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Proyecto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="body-color">
	      <form method="POST" action="{{ route('proyectos.store') }}">

		      <div class="modal-body">
		        
				{{ csrf_field() }}

				<div class="form-group mb-3">
					<label>Nombre del Proyecto</label>
					<input class="form-control" type="text" name="name" placeholder="Nombre de Tareas">
				</div>
					
				<div class="form-group mb-3">
					<label>Descripción</label>
					<textarea class="form-control" name="description"></textarea>
				</div>

				<div class="form-group mb-3">
					<label>Fecha Final</label>
					<input class="form-control" type="date" name="final_date">
				</div>

				<div class="form-group mb-3">
					<label>Color del Proyecto</label>
					<input class="form-control" type="color" name="hex">
				</div>

		      </div>
		      </div>

		      <div class="footer-color">
		      <div class="modal-footer">
		      	<div class="close-btn">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
		        </div>
		        <div class="save-btn">
		        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
		        </div>
		      </div>
	      </form>
      	</div>
    </div>
  </div>
</div>

<div class="container">

<div class="row div-project-1">
	@foreach($proyectos as $proyecto)

	<div class="col-md-4 mt-4 list-projects">
		
			<div class="line-color" style="height: 110%; width: 100%; background-color: {{$proyecto->hex}}; border-radius: 40px">
				
			
			<div class="card-body body-project">
				<h4 class="name-project">{{ $proyecto->name }}</h4>
				<p>{{ $proyecto->description }}</p>
					<div class="div-texto-tareas">
						Tus tareas:
					</div>
				
			</div>
			<div class="color-div">
			<div class="tareas">
				<ul>
					@foreach($proyecto->tareas as $tarea)
					<li>{{ $tarea->name }} 1</li>
					@endforeach
				</ul>
				
			</div>
			</div>

			<div class="button-div d-flex justify-content-center">
				<a href="" class="btn btn-primary btn-block btn-add" data-bs-toggle="modal" data-bs-target="#modalTarea2{{ $proyecto->id }}">Agregar Tarea
				</a>
			</div>
	
</div>
</div>		


    	@endforeach
	</div>
</div>
</div>

@foreach($proyectos as $proyecto)
<div class="modal fade" id="modalTarea2{{ $proyecto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
				<label>Estado de la Tarea</label>
					<select class="form-control" name="checked">
					<option value="En proceso">En proceso</option>
					<option value="Completada">Completada</option>
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

			<input type="hidden" name="project_id" value="{{ $proyecto->id }}">

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
@endforeach
@endsection
</section>
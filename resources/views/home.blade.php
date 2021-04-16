@extends('layouts.master')

@section('content')
<section class="bg-tareas">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="back-color">
                    <h1 class="text-dash">¿Qué buscas hacer?</h1>

                    <div class="row px-5 pt-3 justify-content-center">

                        <!-- K CHINGUE SU MADRE GIT HUB .l. -->

                        <!-- SUELTAME GIT, ME LASTIMAS -->

                         <!-- CHASM -->
                    <div class="crate_pry col-md-6 mx-4">
                        <h3 class="proyecto-create">Crear Proyecto</h3>
                        <a href="{{ route('proyectos.index') }}" class="nav-link px-2 link-dark">
                        <div class="rec-color">
                            <p class="mas2">+</p>
                        </div>
                        </a>
                    </div>
                    
                    <div class="create-tar col-md-6 mx-4">
                        <h3 class="tarea-create"> Crear Tarea</h3>
                        <a href="{{ route('tareas.index') }}" class="nav-link px-2 link-dark">
                            <div class="rec-color">
                                <p class="mas">+</p>
                            </div>
                        </a>
                    </div>

                </div>
                
            </div>

            </div>
        </div>
    </div>
</section>
@endsection

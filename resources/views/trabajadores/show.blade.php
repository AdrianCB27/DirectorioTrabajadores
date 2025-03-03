@extends('layout.plantilla')
@section('contenido')
    <div class="flex justify-center mx-auto">
        <div class="flex flex-col bg-white shadow-sm border border-slate-200 rounded-lg my-6 w-96">
            <div class="m-2.5 overflow-hidden rounded-md h-80 flex justify-center items-center">
                <?php $url = substr($trabajador->foto, 7);?>

                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $trabajador->foto) }}" alt="profile-picture" />
            </div>
            <div class="p-6 text-center">
                <h4 class="mb-1 text-xl font-semibold text-slate-800">
                    {{$trabajador->nombre}} {{$trabajador->apellidos}}
                </h4>
                <p class="text-sm font-semibold text-slate-500 uppercase">
                    {{$trabajador->email}} {{$trabajador->telefono}}

                </p>
                <p class="text-base text-slate-700 mt-4 font-light ">
                    Cargos:
                    @foreach ($trabajador->cargos as $cargo)
                        {{$cargo}}
                    @endforeach
                </p>
                <p class="text-base text-slate-600 mt-4 font-light ">
                    Departamento: {{$trabajador->departamento}} <br />
                    Fecha de nacimiento: <span class="text-green-600">{{$trabajador->fecha_nacimiento}}</span>
                </p>
            </div>
            <div class="flex justify-center p-6 pt-2 gap-7">
                <a href="{{route('trabajadores.index')}}"
                    class="min-w-32  rounded-md bg-green-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-green-700 focus:shadow-none active:bg-green-700 hover:bg-green-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                    Volver
                </a>
            </div>
        </div>
    </div>
@endsection
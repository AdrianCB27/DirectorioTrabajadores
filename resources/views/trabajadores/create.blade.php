@extends('layout.plantilla')

@section('contenido')
<div class="hidden sm:block absolute top-17 left-2 hover:bg-white rounded-full p-4">
    <a href="{{route('trabajadores.index')}}" class="text-gray-700 hover:text-green-600">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M5 12h14"></path>
        </svg>
    </a>
</div>

<div class="mx-auto mt-10 mb-5 bg-white shadow-lg rounded-lg  max-h-screen overflow-y-auto md:w-2/5">
    <div class="text-2xl py-4 px-6 bg-green-900 text-white text-center font-bold uppercase">
        Añadir un trabajador
    </div>
    <form class="py-4 px-6" action="{{route('trabajadores.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nombre">
                Nombre
            </label>
            <input name="nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Julieta">
            @error('nombre')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="apellidos">
                Apellidos
            </label>
            <input name="apellidos" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="apellidos" type="text" placeholder="Martínez">
            @error('apellidos')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="armando.casitas@gmail.com">
            @error('email')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="telefono">
                Teléfono
            </label>
            <input name="telefono" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="telefono" type="tel" placeholder="Enter your telefono number">
            @error('telefono')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="fecha_nacimiento">
                Fecha de nacimiento
            </label>
            <input name="fecha_nacimiento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fecha_nacimiento" type="date">
            @error('fecha_nacimiento')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="departamento">
                Departamento
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="departamento" name="departamento">
                <option value="">Selecciona un departamento</option>
                <option value="frontend">Frontend</option>
                <option value="backend">Backend</option>
                <option value="manager">Manager</option>
                <option value="recursos humanos">Recursos Humanos</option>
            </select>
            @error('departamento')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="cargos">
                Cargos
            </label>
            <div class="flex flex-col space-y-2">
                <label class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="cargos[]" value="reclutar" class="form-checkbox">
                    <span class="ml-2">Reclutar</span>
                </label>
                <label class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="cargos[]" value="desarrollo" class="form-checkbox">
                    <span class="ml-2">Desarrollo</span>
                </label>
                <label class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="cargos[]" value="administracion" class="form-checkbox">
                    <span class="ml-2">Administración</span>
                </label>
                <label class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="cargos[]" value="limpieza" class="form-checkbox">
                    <span class="ml-2">Limpieza</span>
                </label>
            </div>
            @error('cargos')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="cargos">
                Otros
            </label>
            <div class="flex flex-col space-y-2">
                <label class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="sustituto" value="1" class="form-checkbox">
                    <span class="ml-2">Sustituto</span>
                </label>
                <label class="inline-flex items-center text-gray-700">
                    <input type="checkbox" name="mayor" value="1" class="form-checkbox">
                    <span class="ml-2">Mayor de 55</span>
                </label>

            </div>
            @error('sustituto')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
            @error('mayor')
            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
        @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="foto">
                Foto
            </label>
            <input type="file" name="foto" class="border p-1 rounded mx-auto">
            @error('foto')
                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-center mb-4">
            <button class="bg-green-900 text-white py-2 px-4 rounded hover:bg-green-800 focus:outline-none focus:shadow-outline" type="submit">
                Añadir trabajador
            </button>
        </div>
    </form>
</div>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Directorio trabajadores</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>


</head>
<body style="font-family: 'Nunito', sans-serif; height: 100vh;" class="bg-gray-300">
    <div class="bg-gray-100 lg:h-full">

        <div class="h-full flex bg-gray-300">
            <!-- Sidebar -->
            <div class="absolute bg-gray-800 text-white w-56 h-full transition-transform transform -translate-x-full ease-in-out duration-300 z-50" 
                id="sidebar">
                <!-- Your Sidebar Content -->
                <div class="p-4">
                    <h1 class="text-2xl font-semibold">Opciones</h1>
                    <ul class="mt-4">
                        <li class="mb-2 text-xl"><a href="/" class="block hover:text-indigo-400">Inicio</a></li>
                        <li class="mb-2 text-xl"><a href="{{route('trabajadores.create')}}" class="block hover:text-indigo-400">Añadir Trabajador</a></li>
                    </ul>
                </div>
            </div>
    
            <!-- Content -->
            <div class="flex-1 flex flex-col">
                <!-- Navbar -->
                <div class="bg-slate-100 shadow">
                    <div class="container mx-auto">
                        <div class="flex justify-between items-center py-4 px-2">
                            
    
                            <button class="text-gray-500 hover:text-gray-600" id="open-sidebar">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h1 class="text-xl font-semibold text-green-700">Directorio de trabajadores</h1>
                        </div>
                    </div>
                </div>
                <!-- Content Body -->
                @yield('contenido')
            </div>
        </div>
    
        <script>
            const sidebar = document.getElementById('sidebar');
        const openSidebarButton = document.getElementById('open-sidebar');
        
        openSidebarButton.addEventListener('click', (e) => {
            e.stopPropagation();
            sidebar.classList.toggle('-translate-x-full');
        });
    
        // Close the sidebar when clicking outside of it
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !openSidebarButton.contains(e.target)) {
                sidebar.classList.add('-translate-x-full');
            }
        });
        </script>
    
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gobierno Provincia - Dashboard</title>
    <!-- Tailwind CSS (CDN for quick dynamic design as preferred by user) -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold tracking-tight text-indigo-600">Sistema SEDS</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-slate-700">
                        Bienvenido, {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm font-medium text-red-600 hover:text-red-800 transition-colors">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100">
                <h3 class="text-lg leading-6 font-medium text-slate-900">
                    Información del Usuario Activo
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-slate-500">
                    Detalles personales e información de cuenta cargados desde la base de datos SEDS.
                </p>
            </div>

            <div class="px-6 py-5">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-6">
                    <div class="sm:col-span-1 border border-slate-100 rounded-lg p-4 bg-slate-50">
                        <dt class="text-sm font-medium text-slate-500">Nombre de Usuario</dt>
                        <dd class="mt-1 text-sm text-slate-900 font-semibold">{{ Auth::user()->nomb_usr }}</dd>
                    </div>

                    <div class="sm:col-span-1 border border-slate-100 rounded-lg p-4 bg-slate-50">
                        <dt class="text-sm font-medium text-slate-500">ID de Perfil</dt>
                        <dd class="mt-1 text-sm text-slate-900 font-semibold">{{ Auth::user()->perfilid }}</dd>
                    </div>

                    <div class="sm:col-span-1 border border-slate-100 rounded-lg p-4 bg-slate-50">
                        <dt class="text-sm font-medium text-slate-500">Código de Persona</dt>
                        <dd class="mt-1 text-sm text-slate-900 font-semibold">{{ Auth::user()->codpers }}</dd>
                    </div>

                    <div class="sm:col-span-1 border border-slate-100 rounded-lg p-4 bg-slate-50">
                        <dt class="text-sm font-medium text-slate-500">Estado de Cuenta</dt>
                        <dd class="mt-1 text-sm text-slate-900 font-semibold">
                            @if(Auth::user()->activo)
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Activo
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Inactivo
                                </span>
                            @endif
                        </dd>
                    </div>

                    <div class="sm:col-span-2 border border-slate-100 rounded-lg p-4 bg-slate-50">
                        <dt class="text-sm font-medium text-slate-500">Última Visita Registrada</dt>
                        <dd class="mt-1 text-sm text-slate-900">{{ Auth::user()->ult_visita ?? 'No disponible' }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </main>

    <footer class="bg-white border-t border-slate-200 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-center">
            <p class="text-sm text-slate-500">
                Sistema de Prueba Monolítico - Laravel 12 + Livewire + Fortify
            </p>
        </div>
    </footer>

    @livewireScripts
</body>

</html>
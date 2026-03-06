<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gobierno Provincia - Acceso</title>
    <!-- Tailwind CSS (CDN for quick dynamic design as preferred by user) -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="bg-slate-50 text-slate-900 font-sans antialiased min-h-screen flex items-center justify-center">

    <div
        class="w-full sm:max-w-md px-6 py-8 bg-white shadow-xl sm:rounded-2xl border border-slate-100 relative overflow-hidden">
        <!-- Accent Top Bar -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>

        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold tracking-tight text-slate-800">Sistema SEDS</h1>
            <p class="text-sm text-slate-500 mt-2">Ingrese sus credenciales para continuar</p>
        </div>

        @livewire('auth.login')

    </div>

    @livewireScripts
</body>

</html>
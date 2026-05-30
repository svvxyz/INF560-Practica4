<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Notes App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fdfbf7] min-h-screen text-stone-800">

    <nav class="bg-white border-b border-amber-200 mb-10">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="{{ route('notes.index') }}" 
               class="text-2xl font-serif font-bold text-amber-700 tracking-tight">
                Mis Notas
            </a>
            <a href="{{ route('notes.create') }}" 
               class="bg-amber-600 text-amber-50 px-5 py-2 rounded-full shadow-sm hover:bg-amber-700 transition-colors text-sm font-semibold">
                + Nueva Nota
            </a>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 pb-16">

        @if(session('success'))
            <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-900 rounded-r-lg px-6 py-4 mb-8 shadow-sm animate-fade-in">
                <span class="font-medium">¡Listo!</span> {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>
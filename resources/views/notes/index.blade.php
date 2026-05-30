@extends('layouts.app')
@section('titulo', 'Mis Notas')

@section('content')

<header class="mb-8">
    <h1 class="text-3xl font-serif font-bold text-stone-800">Todas las Notas</h1>
    <p class="text-stone-500 text-sm mt-1">Administra y revisa tus pensamientos personales.</p>
</header>

@if($notes->isEmpty())
    <div class="bg-amber-50/40 border-2 border-dashed border-amber-200 rounded-2xl p-12 text-center">
        <span class="text-4xl block mb-3">📭</span>
        <p class="text-stone-600 font-medium mb-2">Tu bloc de notas está vacío actualmente.</p>
        <a href="{{ route('notes.create') }}" class="text-amber-700 font-semibold underline hover:text-amber-800">
            Escribe tu primera nota
        </a>
    </div>
@else
    <div class="grid md:grid-cols-2 gap-10">
        @foreach($notes as $note)
            <div class="bg-white border border-amber-100 rounded-2xl p-6 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow duration-200 relative overflow-hidden">
                
                @if($note->fijada)
                    <div class="absolute top-0 left-0 right-0 h-1 bg-amber-500"></div>
                @endif

                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs bg-amber-50 text-amber-800 font-medium px-2.5 py-1 rounded-md border border-amber-200/60 uppercase tracking-wider">
                            {{ $note->categoria }}
                        </span>
                        @if($note->fijada)
                            <span class="text-sm bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full font-medium flex items-center gap-1">
                                📌 <span class="text-xs font-serif italic">Fijada</span>
                            </span>
                        @endif
                    </div>

                    <h2 class="text-xl font-serif font-bold text-stone-800 line-clamp-1">
                        {{ $note->titulo }}
                    </h2>

                    <p class="text-stone-600 text-sm mt-2 line-clamp-3 leading-relaxed">
                        {{ $note->contenido }}
                    </p>
                </div>

                <div class="flex items-center justify-end gap-4 mt-6 pt-4 border-t border-stone-100 text-xs font-semibold tracking-wide uppercase">
                    <a href="{{ route('notes.show', $note) }}"
                       class="text-amber-700 hover:text-amber-900 transition-colors">
                        Ver
                    </a>
                    <a href="{{ route('notes.edit', $note) }}"
                       class="text-stone-500 hover:text-stone-800 transition-colors">
                        Editar
                    </a>
                    <form method="POST"
                          action="{{ route('notes.destroy', $note) }}"
                          onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta nota?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-600 hover:text-red-800 transition-colors">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
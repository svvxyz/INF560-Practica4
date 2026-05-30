@extends('layouts.app')
@section('titulo', $note->titulo)

@section('content')

<div class="bg-white border border-amber-100 rounded-2xl p-8 max-w-4xl mx-auto shadow-sm relative overflow-hidden">
    
    @if($note->fijada)
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-amber-500"></div>
    @endif

    <header class="border-b border-stone-100 pb-5 mb-6">
        <div class="flex flex-wrap items-center gap-2 mb-3">
            <span class="text-xs bg-amber-50 text-amber-800 font-medium px-2.5 py-1 rounded-md border border-amber-200/60 uppercase tracking-wider">
                {{ $note->categoria }}
            </span>
            @if($note->fijada)
                <span class="text-xs bg-amber-100 text-amber-800 px-2 py-0.5 rounded-full font-medium flex items-center gap-1">
                    📌 <span class="font-serif italic">Fijada</span>
                </span>
            @endif
        </div>
        
        <h1 class="text-3xl font-serif font-bold text-stone-800 tracking-tight">
            {{ $note->titulo }}
        </h1>
    </header>

    <article class="text-stone-700 leading-relaxed mb-8 whitespace-pre-line font-sans text-[15px]">
        {{ $note->contenido }}
    </article>

    <footer class="text-xs text-stone-400 font-medium border-t border-stone-100 pt-4 mb-8 flex flex-col sm:flex-row sm:justify-between gap-1">
        <span>Creado: {{ $note->created_at->format('d M, Y — H:i') }}</span>
        <span>Última Actualización: {{ $note->updated_at->format('d M, Y — H:i') }}</span>
    </footer>

    <div class="flex flex-wrap items-center justify-between gap-3 pt-2">
        <div class="flex items-center gap-3">
            <a href="{{ route('notes.edit', $note) }}"
               class="bg-amber-600 text-amber-50 px-5 py-2 rounded-xl text-sm font-semibold shadow-sm hover:bg-amber-700 transition-colors">
                Editar Nota
            </a>

            <form method="POST"
                  action="{{ route('notes.destroy', $note) }}"
                  onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta nota?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-50 text-red-600 border border-red-200/60 px-5 py-2 rounded-xl text-sm font-semibold hover:bg-red-100/70 transition-colors">
                    Eliminar
                </button>
            </form>
        </div>

        <a href="{{ route('notes.index') }}"
           class="text-stone-500 hover:text-stone-800 px-4 py-2 rounded-xl text-sm font-semibold transition-colors">
            ← Volver a las Notas
        </a>
    </div>

</div>

@endsection
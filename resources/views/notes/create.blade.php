@extends('layouts.app')
@section('title', 'Crear Nota')
@section('content')

<div class="max-w-4xl mx-auto">

    {{-- ===== Header ===== --}}
    <header class="flex flex-col items-center text-center gap-2 mb-8 px-2">
        <span class="text-4xl">✍️</span>
        <h1 class="font-serif font-bold text-3xl text-stone-800 tracking-tight">
            Crear Nueva Nota
        </h1>
        <p class="text-stone-500 text-sm max-w-xs sm:max-w-none">
            Captura una idea fresca antes de que se escape ✨
        </p>
    </header>

    {{-- ===== Global Errors ===== --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-900 rounded-r-lg px-5 py-4 shadow-sm">
            <span class="font-semibold text-sm block mb-1">Por favor corrige los siguientes errores:</span>
            <ul class="list-disc list-inside text-xs space-y-0.5 text-red-800">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ===== Form ===== --}}
    <form action="{{ route('notes.store') }}" method="POST"
          class="bg-white border border-amber-100 rounded-2xl p-6 sm:p-8 shadow-sm relative overflow-hidden">

        {{-- Top Accent Bar --}}
        <div class="absolute top-0 left-0 right-0 h-1.5 bg-amber-500"></div>

        @csrf
        @include('notes._form', ['note' => null])

        {{-- Actions --}}
        <div class="flex flex-wrap items-center gap-3 pt-6 mt-6 border-t border-stone-100">
            <button type="submit"
                    class="bg-amber-600 text-amber-50 px-6 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:bg-amber-700 transition-colors inline-flex items-center gap-2">
                💾 Guardar Nota
            </button>
            
            <a href="{{ route('notes.index') }}"
               class="text-stone-500 hover:text-stone-800 px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors">
                Cancelar
            </a>
        </div>
    </form>

    {{-- Tip card --}}
    <div class="mt-6 bg-amber-50/60 border border-amber-100/80 rounded-xl px-5 py-3.5 shadow-sm flex items-center gap-3">
        <span class="text-xl shrink-0">💡</span>
        <p class="text-stone-600 text-sm leading-relaxed">
            <span class="font-serif font-bold italic text-amber-800 mr-1">Sugerencia:</span>
            Un buen título resume tu idea entera en menos de 6 palabras.
        </p>
    </div>

</div>

@endsection
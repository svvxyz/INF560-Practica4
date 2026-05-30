@extends('layouts.app')
@section('titulo', 'Editar Nota')

@section('content')

<div class="bg-white border border-amber-100 rounded-2xl p-8 max-w-4xl mx-auto shadow-sm">

    <header class="mb-6">
        <h1 class="text-2xl font-serif font-bold text-stone-800">Editar Nota</h1>
        <p class="text-stone-500 text-xs mt-1">Realiza cambios en tu nota existente a continuación.</p>
    </header>

    @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-900 rounded-r-lg px-5 py-4 mb-6 shadow-sm">
            <span class="font-semibold text-sm block mb-1">Por favor corrige los siguientes errores:</span>
            <ul class="list-disc list-inside text-xs space-y-0.5 text-red-800">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('notes.update', $note) }}">
        @csrf
        @method('PUT')

        @include('notes._form')

        <div class="flex items-center gap-3 pt-2">
            <button type="submit"
                    class="bg-amber-600 text-amber-50 px-6 py-2.5 rounded-xl text-sm font-semibold shadow-sm hover:bg-amber-700 transition-colors">
                Guardar Cambios
            </button>
            
            <a href="{{ route('notes.index') }}"
               class="text-stone-500 hover:text-stone-800 px-4 py-2.5 rounded-xl text-sm font-semibold transition-colors">
                Cancelar
            </a>
        </div>

    </form>
</div>

@endsection
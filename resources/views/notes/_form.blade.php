<div class="mb-5">
    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-1.5">
        Título
    </label>
    <input type="text" name="titulo"
           value="{{ old('titulo', $note->titulo ?? '') }}"
           placeholder="Dale un nombre a tu nota..."
           class="w-full bg-stone-50/50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm text-stone-800 transition-all focus:outline-none focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 @error('titulo') !border-red-400 focus:ring-red-500/10 @enderror">
</div>

<div class="mb-5">
    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-1.5">
        Contenido
    </label>
    <textarea name="contenido" rows="6"
              placeholder="Comienza a escribir tus pensamientos aquí..."
              class="w-full bg-stone-50/50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm text-stone-800 transition-all focus:outline-none focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 leading-relaxed @error('contenido') !border-red-400 focus:ring-red-500/10 @enderror">{{ old('contenido', $note->contenido ?? '') }}</textarea>
</div>

<div class="mb-5">
    <label class="block text-xs font-semibold uppercase tracking-wider text-stone-500 mb-1.5">
        Categoría
    </label>
    <select name="categoria"
            class="w-full bg-stone-50/50 border border-stone-200 rounded-xl px-4 py-2.5 text-sm text-stone-800 transition-all focus:outline-none focus:bg-white focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 @error('categoria') !border-red-400 focus:ring-red-500/10 @enderror">
        @foreach(['Personal','Trabajo','Estudio','Ideas'] as $cat)
            <option value="{{ $cat }}"
                {{ old('categoria', $note->categoria ?? '') == $cat ? 'selected' : '' }}>
                {{ $cat }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-8 flex items-center gap-3 bg-stone-50/50 border border-stone-100 p-3.5 rounded-xl">
    <input type="hidden" name="fijada" value="0">
    <input type="checkbox" name="fijada" value="1" id="fijada"
           {{ old('fijada', $note->fijada ?? false) ? 'checked' : '' }}
           class="w-4 h-4 rounded text-amber-600 focus:ring-amber-500/30 border-stone-300 accent-amber-600">
    <label for="fijada" class="text-sm font-medium text-stone-700 cursor-pointer select-none">
        📌 Fijar esta nota al principio de la lista
    </label>
</div>

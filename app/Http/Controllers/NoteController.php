<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::orderByDesc('fijada')->orderByDesc('created_at')->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        Note::create($request->validated());

        return redirect()->route('notes.index')->with('success', 'La nota se creo exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note)
    {
        $note->update($request->validated());

        return redirect()->route('notes.index')->with('success', 'La nota se actualizo exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'La nota se elimino exitosamente.');
    }

    /**
     * Funcion para actualizar el estado de fijacion de una nota
     */
    public function toggleFijada(Note $note)
    {
        $note->fijada = !$note->fijada;
        $note->save();

        return redirect()->route('notes.index')->with('success', 'La nota se fijo exitosamente.');
    }
}

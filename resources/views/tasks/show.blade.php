@extends('layouts.app')

@section('content')
    <h1>{{ $task->title }}</h1>

    <p>Statut: {{ $task->is_completed ? 'Fait' : 'Pas fait' }}</p>

    <form method="post" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('put')

        <label>
            Statut:
            <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }}>
        </label>

        <button type="submit">Enregistrer</button>
    </form>

    <form method="post" action="{{ route('tasks.destroy', $task) }}">
        @csrf
        @method('delete')

        <button type="submit">Supprimer</button>
    </form>
@endsection

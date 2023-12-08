<x-app-layout>

    @section('content')
        <h1>Task List</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une nouvelle tâche</a>

        @if ($tasks && count($tasks) > 0)
            <ul>
                @foreach ($tasks as $task)
                    <li>
                        <a href="{{ route('tasks.show', $task) }}">
                            {{ $task->title }} - {{ $task->is_completed ? 'Fait' : 'Pas fait' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucune tâche trouvée.</p>
        @endif
    </x-app-layout>

<x-app-layout>

    @section('content')
        <h1>Créer une nouvelle tâche</h1>

        <!-- Formulaire de création de tâche -->
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titre de la tâche</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description de la tâche</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer la tâche</button>
        </form>
    @endsection

</x-app-layout>

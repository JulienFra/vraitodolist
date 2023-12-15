<x-app-layout>
    @section('content')
        <h1>{{ __('tasks.create_new_task') }}</h1>

        <!-- Task creation form -->
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div style="margin-bottom: 1rem;">
                <label for="title">{{ __('tasks.task_title') }}</label>
                <input type="text" id="title" name="title" required>
            </div>

            <button type="submit"
                style="background-color: #3490dc; color: #fff; padding: 0.5rem 1rem; border: none; cursor: pointer;">{{ __('tasks.create_task') }}</button>
        </form>
    </x-app-layout>

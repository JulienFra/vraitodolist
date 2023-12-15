<x-app-layout>
    @section('content')
        <div class="container mt-5">
            <h1 class="text-center mb-4 text-3xl font-bold">{{ __('tasks.title') }}</h1>
            <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-3 inline-block">
                {{ __('tasks.create_new_task') }}
            </a>

            @if ($tasks && count($tasks) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($tasks as $task)
                        <div class="bg-white rounded shadow p-4">
                            <h5 class="font-bold text-xl mb-2">{{ $task->title }}</h5>
                            <ul class="list-inside list-disc mb-4">
                                <li>
                                    {{ __('tasks.status') }}:
                                    <span class="{{ $task->is_completed ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $task->is_completed ? __('tasks.completed') : __('tasks.not_completed') }}
                                    </span>
                                </li>
                            </ul>
                            <div class="text-right">
                                <a href="{{ route('tasks.show', $task) }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded">{{ __('tasks.details') }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500">{{ __('tasks.no_tasks_found') }}</p>
            @endif
        </div>
    </x-app-layout>

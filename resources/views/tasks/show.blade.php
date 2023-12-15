<x-app-layout>
    @section('content')
        <div class="container mt-5">
            <h1 class="text-center mb-4 text-3xl font-bold">{{ $task->title }}</h1>

            <div class="bg-white rounded shadow p-4">
                <p class="mb-4">{{ __('tasks.status') }}:
                    <span class="{{ $task->fresh()->is_completed ? 'text-green-500' : 'text-red-500' }}">
                        {{ $task->fresh()->is_completed ? __('tasks.completed') : __('tasks.not_completed') }}
                    </span>
                </p>

                <form method="post" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('put')

                    <div class="mb-4">
                        <label class="block text-sm font-semibold">
                            {{ __('tasks.status') }}:
                        </label>
                        <input type="checkbox" name="is_completed" {{ $task->is_completed ? 'checked' : '' }} class="ml-2">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">{{ __('tasks.save') }}</button>
                </form>

                <!-- Modal Trigger -->
                <button onclick="window.modal.open()"
                    class="bg-red-500 text-white px-3 py-1 rounded mt-2">{{ __('tasks.delete') }}</button>

                <!-- Modal -->
                <div id="deleteModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="fixed inset-0 bg-black opacity-30"></div>
                        <div class="bg-white p-4 rounded shadow-md z-50">
                            <p class="text-lg font-semibold mb-4">{{ __('tasks.confirm_delete') }}</p>
                            <form method="post" action="{{ route('tasks.destroy', $task) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded">{{ __('tasks.yes_delete') }}</button>
                                <button type="button" onclick="window.modal.close()"
                                    class="bg-gray-300 text-gray-700 px-3 py-1 rounded ml-2">{{ __('tasks.cancel') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- JavaScript to handle modal functionality -->

            </div>
        </div>
    </x-app-layout>

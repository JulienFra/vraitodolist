<?php

// app/Http/Controllers/TaskController.php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function index()
    {
        // Assurez-vous que $tasks est correctement défini et qu'il contient des données
        $tasks = auth()->user()->tasks;

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {

        return view('tasks.show', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update(['is_completed' => $request->input('is_completed', false)]);
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        // Création de la tâche
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tasks.index');
    }
}

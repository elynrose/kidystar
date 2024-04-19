<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Child;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TasksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tasks = Task::with(['assigned_tos', 'created_by'])->get();

        return view('frontend.tasks.index', compact('tasks'));
    }

    public function create()
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assigned_tos = Child::pluck('first_name', 'id');

        return view('frontend.tasks.create', compact('assigned_tos'));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        $task->assigned_tos()->sync($request->input('assigned_tos', []));

        return redirect()->route('frontend.tasks.index');
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assigned_tos = Child::pluck('first_name', 'id');

        $task->load('assigned_tos', 'created_by');

        return view('frontend.tasks.edit', compact('assigned_tos', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->all());
        $task->assigned_tos()->sync($request->input('assigned_tos', []));

        return redirect()->route('frontend.tasks.index');
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->load('assigned_tos', 'created_by');

        return view('frontend.tasks.show', compact('task'));
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskRequest $request)
    {
        $tasks = Task::find(request('ids'));

        foreach ($tasks as $task) {
            $task->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

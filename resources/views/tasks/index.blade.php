@extends ('layout')

@section ('content')
    <div class="pb-4 pt-4">
        <div class="container">
            <div class="d-flex justify-content-end pb-4">
                <a class="btn btn-primary" href="{{ route('tasks.create') }}" role="button">Add Task</a>
            </div>

            @if (request('author'))
                <div class="pb-4">
                    <h3>Author : <strong>{{ request('author') }}</strong></h3>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created by</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td><a href="{{ route('tasks.index', ['author' => $task->user->name]) }}">{{ $task->user->name }}</a></td>
                            <td>{{ \Carbon\Carbon::parse($task->due)->format('d/M/Y') }}</td>
                            <td>@if ($task->is_completed) Completed @else Not Completed @endif</td>
                            <td><a class="btn btn-warning" href="{{ route('tasks.edit', $task) }}" role="button">Edit</a></td>
                        </tr>
                        @empty
                            <h2 class="text-uppercase">No Tasks yet !</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
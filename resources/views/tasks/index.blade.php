@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{--
    h1 element for semantics (seo-purpose)
    h3 class for style
    --}}
    <h1 class="h3">{{ config('app.name') }}</h1>

    <form action="{{  route('store') }}" method="post">
        @csrf
        {{-- cross-site request forgeries --}}
        {{-- to validate the request / security / for CSRF protection --}}
        <div class="row gx-2 mb-3">
            <div class="col-10">
                <input type="text" name="task_name" class="form-control" value="{{ old('task_name') }}" placeholder="Add a task" autofocus>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i>Add</button>
            </div>
            {{-- Error --}}
            @error('task_name')
                <div class="text-danger small">{{ $message }}</div>                
            @enderror
        </div>
    </form>

    {{-- Show all tasks from Database--}}
    @if ($all_tasks->isNotEmpty())
        <ul class="list-group">
            @foreach ($all_tasks as $task)
                <li class="list-group-item d-flex align-items-center">
                    {{-- Task --}}
                    <p class="mb-0 me-auto">{{ $task->name }}</p>

                    {{-- Action Buttons --}}
                    <a href="{{ route('edit', $task->id) }}" class="btn btn-secondary btn-sm" title="Edit"><i class="fa-solid fa-pen"></i></a>
                    <form action="#" method="post" class="ms-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
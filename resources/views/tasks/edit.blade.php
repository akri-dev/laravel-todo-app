@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1 class="h3">Edit Task</h1>

    <form action="{{ route('store') }}" method="post">
        @csrf
        @method('PATCH')
        <div class="row gx-2 mb-3">
            <div class="col-10">
                <input type="text" name="task_name" class="form-control" value="{{ old('task_name', $task->name) }}" autofocus>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-secondary w-100"><i class="fa-solid fa-check"></i>Update</button>
            </div>
            {{-- Error --}}
            @error('task_name')
                <div class="text-danger small">{{ $message }}</div>                
            @enderror
        </div>
    </form>
@endsection
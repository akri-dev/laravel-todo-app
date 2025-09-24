@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{--
    h1 element for semantics (seo-purpose)
    h3 class for style
    --}}
    <h1 class="h3">{{ config('app.name') }}</h1>

    <form action="#" method="post">
        @csrf
        {{-- cross-site request forgeries --}}
        {{-- to validate the request / security / for CSRF protection --}}
        <div class="row gx-2 mb-3">
            <div class="col-10">
                <input type="text" name="task_name" class="form-control" placeholder="Add a task" autofocus>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus"></i> Add</button>
            </div>
            {{-- Error --}}
        </div>
    </form>

@endsection
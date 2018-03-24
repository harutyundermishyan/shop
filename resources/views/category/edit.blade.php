@extends('app')
@section('content')
    <form action="{{ url('/categories/'.$category->id) }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <label for="name">Անուն</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Ավելացնել</button>
    </form>

@endsection
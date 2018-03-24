@extends('app')
@section('content')
    <form action="{{ url('/firms') }}" method="POST">
        @csrf
        <h2>Ավելացնել Ֆիրմա</h2>
        <div class="form-group">
            <label for="name">Անուն</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Ավելացնել</button>
    </form>
@endsection
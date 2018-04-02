@extends('app')
@section('content')
    <form action="{{ url('/firms') }}" method="POST">
        @csrf
        <h2>Ավելացնել Ֆիրմա</h2>
        <div class="form-group">
            <label for="name">Անուն</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="phone">Հեռախոսահամար</label>
            <input type="number" class="form-control" id="phone" name="phone" required>
        </div>

        <button type="submit" class="btn btn-primary">Ավելացնել</button>
    </form>
@endsection
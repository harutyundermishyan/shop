@extends('app')
@section('content')

    <div class="mb-2">
        <a href="{{ url('/firms/create') }}" class="btn btn-success">Ավելացնել Ֆիրմա</a>
    </div>
    <table id="products" class="table table-bordered">
        <thead>
            <tr>
                <th>Անուն</th>
                <th>Հեռախոսահամար</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($firms as $firm)
            <tr>
                <th>
                    <a href="{{ url('/firms/'.$firm->id) }}">{{ $firm->name }}</a>
                </th>
                <th>
                    <span> {{ $firm->phone }}</span>
                </th>
                <th>
                    <a href="{{ url('/firms/'.$firm->id.'/edit') }}" class="btn btn-primary w-100">Խմբագրել</a>
                </th>
                <th>
                    <form action="{{ url('/firms/'.$firm->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete_btn w-100">Ջնջել</button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
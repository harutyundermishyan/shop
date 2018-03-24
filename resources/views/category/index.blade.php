@extends('app')
@section('content')

    <div class="mb-2">
        <a href="{{ url('/categories/create') }}" class="btn btn-success">Ավելացնել Կատեգորիա</a>
    </div>
    <table id="products" class="table table-bordered">
        <thead>
            <tr>
                <th>Անուն</th>
                <th colspan="1"></th>
                <th colspan="1"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th>
                    <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                </th>
                <th>
                    <a href="{{ url('/categories/'.$category->id)."/edit" }}" class="btn btn-primary w-100">Խմբագրել</a>
                </th>
                <th>
                    <form action="{{ url('categories/'.$category->id) }}" method="post">
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
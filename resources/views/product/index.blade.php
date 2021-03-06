@extends('app')
@section('content')

    <div class="mb-2">
        <a href="{{ url('/products/create') }}" class="btn btn-success">Ավելացնել Ապրանք</a>
    </div>
    <table id="products" class="table table-bordered">
        <thead>
        <tr>
            <th>Անուն</th>
            <th>Ֆիրմա</th>
            <th>Կատեգորիա</th>
            <th>Քանակ</th>
            <th>Ընդունման Գին</th>
            <th>Վաճառքի Գին</th>
            <th class="d-none">Id</th>
            <th>Ամսաթիվ</th>
            <th>Նկարագրություն</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th>
                    <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                </th>
                <th>
                    <a href="{{ url('/firms/'.$product->firm->id) }}">{{ $product->firm->name }}</a>
                </th>
                <th>
                    <a href="{{ url('/categories/'.$product->category->id) }}">{{ $product->category->name }}</a>
                </th>
                <th>{{ $product->number }}</th>
                <th>{{ $product->first_price }}</th>
                <th>{{ $product->last_price }}</th>
                <th class="d-none">{{ $product->id }}</th>
                <th>{{ $product->date }}</th>
                <th>{{ $product->description }}</th>
                <th>
                    <a href="{{ url('products/'.$product->id.'/edit') }}" class="btn btn-primary">Խմբագրել</a>
                </th>
                <th>
                    <form action="{{ url('products/'.$product->id) }}" method="post">
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
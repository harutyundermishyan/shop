@extends('app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2> {{ $category->name }}</h2>
        </div>
        <div class="card-body">
            <ul>
                @foreach($category->products as $product)
                    <li>
                        <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                   </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
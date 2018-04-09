@extends('app')
@section('content')

    <div class="form-group">
        <label for="name">Անուն &nbsp;</label>
        <span> {{ $product->name }}</span>
    </div>
    <div class="form-group">
        <label for="firm">Ֆիրմա &nbsp;</label>
        <span> <a href="{{ url('firms/'.$product->firm->id) }}">{{ $product->firm->name }}</a></span>
    </div>
    <div class="form-group">
        <label for="category">Կատեգորիա &nbsp;</label>
        <span>
            <a href="{{ url('categories/'.$product->category->id) }}">{{ $product->category->name }}</a>
        </span>
    </div>
    <div class="form-group">
        <label for="number">Քանակ &nbsp;</label>
        <span> {{ $product->number }}</span>
    </div>
    <div class="form-group">
        <label for="percent">Տոկոս &nbsp;</label>
        <span> {{ $product->percent }}</span>
    </div>
    <div class="form-group">
        <label for="first_price">Ընդունման Գին &nbsp;</label>
        <span> {{ $product->first_price }}</span>
    </div>
    <div class="form-group">
        <label for="last_price">Վաճառքի Գին: &nbsp;</label>
        <span> {{ $product->last_price }}</span>
    </div>
    <div class="form-group">
        <label for="date">Ամսաթիվ &nbsp;</label>
        <span> {{ $product->date }}</span>
    </div>
    <div class="form-group">
        <label for="date">Նկարագրություն &nbsp;</label>
        <span> {{ $product->description }}</span>
    </div>
@endsection
@extends('app')
@section('content')

    <form action="{{ url('/products/'.$product->id) }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <label for="name">Անուն</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="firm">Ֆիրմա</label>
            <select class="form-control" id="firm" name="firm_id" value="{{ $product->firm->id }}">
                @foreach($firms as $firm)
                    <option value="{{ $firm->id }}" {{ ($firm->id == $product->firm->id ? 'selected': '') }}>{{ $firm->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category">Կատեգորիա</label>
            <select class="form-control" id="category" name="category_id" value="{{ $product->category->id }}">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($category->id == $product->category->id ? 'selected': '') }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="number">Քանակ</label>
            <input type="number" class="form-control" id="number" name="number" required value="{{ $product->number }}">
        </div>
        <div class="form-group">
            <label for="percent">Տոկոս</label>
            <input type="number" class="form-control" id="percent" name="percent" required value="{{ $product->percent }}">
        </div>
        <div class="form-group">
            <label for="first_price">Ընդունման Գին</label>
            <input type="number" class="form-control" id="first_price" name="first_price" required value="{{ $product->first_price }}">
        </div>
        <div class="form-group">
            <label for="last_price">Վաճառքի Գին</label>
            <input type="number" class="form-control" id="last_price" name="last_price" required value="{{ $product->last_price }}">
        </div>
        <div class="form-group">
            <label for="date">Ամսաթիվ</label>
            <input type="date" class="form-control" id="date" name="date" required value="{{ $product->date }}">
        </div>
        <button type="submit" class="btn btn-primary">Ավելացնել</button>
    </form>

@endsection
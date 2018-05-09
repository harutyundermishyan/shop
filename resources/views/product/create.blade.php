@extends('app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('/products') }}" method="POST">
        @csrf
        <h2>Ավելացնել Ապրանք</h2>
        <div class="form-group">
            <label for="product-name">Անուն</label>
            <input type="text" class="form-control" id="product-name" name="name" required>
        </div>
        <div class="form-group">
            <label for="firm-name">Ֆիրմա</label>
            <select class="form-control" id="firm-name" name="firm">
                @foreach($firms as $firm)
                    <option value="{{ $firm->id }}" {{ ($firm->id == session()->get('firm') ? 'selected' : '') }}>{{ $firm->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category-name">Կատեգորիա</label>
            <select class="form-control" id="category-name" name="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ ($category->id == session()->get('category') ? 'selected' : '') }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="number">Քանակ</label>
            <input type="number" class="form-control" id="number" name="number" step="any" required>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="percent">Տոկոս</label>--}}
            {{--<input type="number" class="form-control" id="percent" name="percent" required>--}}
        {{--</div> --}}
        <div class="form-group">
            <label for="first_price">Ընդունման Գին</label>
            <input type="number" class="form-control" id="first_price" name="first_price" required>
        </div>
        <div class="form-group">
            <label for="last_price">Վաճառքի Գին</label>
            <input type="number" class="form-control" id="last_price" name="last_price" required>
        </div>
        <div class="form-group">
            <label for="date">Ամսաթիվ</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ (session()->get('date')) ? session()->get('date') : '' }}" required>
        </div>
        <div class="form-group">
            <label for="description"> Նկարագրություն</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary margin-277">Ավելացնել</button>
    </form>
    <div id="products-list" class="d-none">

    </div>
    <style>
        #products-list {
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            background: #fff;
            border: 1px solid #000;
            color: #000;
            max-height: 1000px;
            overflow: auto;
        }
    </style>

@endsection
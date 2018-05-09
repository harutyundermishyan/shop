<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SHOP</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/datatables.min.css') }}"/>
    <style>
        body {
            background-color: #007bff14;
        }
        .nav-link {
            border: 1px solid #444;
        }
        h2 {
            text-align: center;
        }
        .form-group {
            width: 50%!important;
            margin: 0 auto 20px!important;
        }
        .margin-277 {
            margin-left: 277px;
        }
        ul {
            list-style: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mt-2 mb-2">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ isset($products) ? 'active' : '' }}" href="{{ url('/products')}}">Ապրանքներ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($categories) ? 'active' : '' }}" href="{{ url('/categories')}}">Կատեգորիաներ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($firms) ? 'active' : '' }}" href="{{ url('/firms')}}">Ֆիրմաներ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($sum) ? 'active' : '' }}" href="{{ url('/product/sum/day')}}">Օրվա ընդունված ապրանքների գումար</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isset($sum_month) ? 'active' : '' }}" href="{{ url('/product/sum/month')}}">Ամսվա ընդունված ապրանքների գումար</a>
            </li>
        </ul>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @yield('content')

</div>

<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('datatable/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script>
    $('#products').DataTable( {
        "order": [[ 6, "desc" ]]
    });

    $('.delete_btn').click(function(e){
        alert('ապրանք');
        if(!confirm("Ջնջել?")){
            e.preventDefault()
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>


</html>

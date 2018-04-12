@extends('app')
@section('content')

    <form action="{{ url('/product/sum/month') }}" method="POST">
        @csrf
        <h2>Ժամնակահատվածի ընդունված ապրանքների գումար</h2>
        <div class="row">
            <div class="col-6">
                <label for="from">Ընրել Օր</label>
                <input type="date" class="form-control" id="from" name="from" required>
            </div>
            <div class="col-6">
                <label for="to">Ընրել Օր</label>
                <input type="date" class="form-control" id="to" name="to" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Հաշվել</button>
    </form>
    @if(isset($from) && isset($to))
        <div class="row">
            <h2 class="col-6">{{ $from }}</h2>
            <h2 class="col-6">{{ $to }}</h2>
        </div>
    @endif

    @if(isset($sum_month))
        <h4>Ստացած գնի ցուցակ</h4>
        <ul>
            @foreach($sum_month['day_first_price_list'] as $list_item)
            <li>
                {{ $list_item }}
            </li>
            @endforeach
            <hr>
            <li>
                <h5>
                    {{ $sum_month['day_first_price_sum'] }}դր
                </h5>
            </li>
        </ul>
        <h4>Վաճառքի գնի ցուցակ</h4>
        <ul>
            @foreach($sum_month['day_last_price_list'] as $list_item)
            <li>
                {{ $list_item }}
            </li>
            @endforeach
            <hr>
            <li>
                <h5>
                    {{ $sum_month['day_last_price_sum'] }}դր
                </h5>
            </li>
        </ul>
    @elseif(isset($error))
        <div class="alert alert-danger">
            Ապրանք Չկա!
        </div>
    @endif
@endsection
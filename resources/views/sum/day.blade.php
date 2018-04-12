@extends('app')
@section('content')

    <form action="{{ url('/product/sum/day') }}" method="POST">
        @csrf
        <h2>Օրվա ընդունված ապրանքների գումար</h2>
        <div class="form-group">
            <label for="date">Ընրել Օր</label>
            <input type="date" class="form-control" id="date" name="day" required>
        </div>
        <button type="submit" class="btn btn-primary margin-277">Հաշվել</button>
    </form>
    @if(isset($day))
        <h2>{{ $day }}</h2>
    @endif

    @if(isset($sum))
        <h4>Ստացած գնի ցուցակ</h4>
        <ul>
            @foreach($sum['day_first_price_list'] as $list_item)
            <li>
                {{ $list_item }}
            </li>
            @endforeach
            <hr>
            <li>
                <h5>
                    {{ $sum['day_first_price_sum'] }}դր
                </h5>
            </li>
        </ul>
        <h4>Վաճառքի գնի ցուցակ</h4>
        <ul>
            @foreach($sum['day_last_price_list'] as $list_item)
            <li>
                {{ $list_item }}
            </li>
            @endforeach
            <hr>
            <li>
                <h5>
                    {{ $sum['day_last_price_sum'] }}դր
                </h5>
            </li>
        </ul>
    @elseif(isset($error))
        <div class="alert alert-danger">
            Ապրանք Չկա!
        </div>
    @endif
@endsection
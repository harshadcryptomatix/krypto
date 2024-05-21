@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{__('Orders')}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('Order Create')}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form method="post" action="{{ route('orders.store')}}" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Amount" style="width: 70%;" required>
                                <select class="form-control input-group-text" id="currency" name="currency">
                                    @foreach($currencies ?? [] as $key => $value)
                                        <option value="{{$key}}" @if($default_currency == $key) selected @endif>{{$key}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2" style="text-align: center;font-size: 31px;">
                            <i class="ri-exchange-fill"></i>
                        </div>
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <input name="converted_amount" type="text" value="0.00" class="form-control" id="crypto-amount" placeholder="Crypto Amount" style="width: 70%; background: #e9ecef;" readonly required>
                                <select class="form-control input-group-text" id="crypto" name="crypto_currency">
                                    <option value="bitcoin">BTC</option>
                                    <option value="ethereum">ETH</option>
                                    <option value="litecoin">LTC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" id="submit_order" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@section('scripts')
<script>
function debounce(func, wait) {
    let timeout;
    return function(...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

// Cache to store recent conversion rates
const conversionCache = {};

function convertCurrencyToCrypto() {
    $("#submit_order").attr('disabled',true);
    const amount = parseFloat(document.getElementById('amount').value);
    const currency = document.getElementById('currency').value.toLowerCase();
    const crypto = document.getElementById('crypto').value;
    if (isNaN(amount) || amount <= 0) {
        document.getElementById('crypto-amount').value = '0.00';
        $("#submit_order").attr('disabled',false);
        return;
    }

    const cacheKey = `${crypto}_${currency}`;
    if (conversionCache[cacheKey]) {
        const conversionRate = conversionCache[cacheKey];
        const result = amount / conversionRate;
        document.getElementById('crypto-amount').value = `${result.toFixed(8)}`;
        $("#submit_order").attr('disabled',false);
        return;
    }

    fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${crypto}&vs_currencies=${currency}`)
        .then(response => {
            $("#submit_order").attr('disabled',false);
            if (response.status === 429) {
                throw new Error('Too Many Requests');
            }
            return response.json();
        })
        .then(data => {
            if (data[crypto] && data[crypto][currency]) {
                const conversionRate = data[crypto][currency];
                conversionCache[cacheKey] = conversionRate; // Cache the conversion rate
                const result = amount / conversionRate;
                document.getElementById('crypto-amount').value = `${result.toFixed(8)}`;
            } else {
                document.getElementById('crypto-amount').value = 'Error';
            }
        })
        .catch(error => {
            document.getElementById('crypto-amount').value = 'Try Sometime';
            console.error('Error fetching conversion rate:', error);
        });
}

const debouncedConvertCurrencyToCrypto = debounce(convertCurrencyToCrypto, 500);

document.getElementById('amount').addEventListener('input', debouncedConvertCurrencyToCrypto);
document.getElementById('currency').addEventListener('change', convertCurrencyToCrypto);
document.getElementById('crypto').addEventListener('change', convertCurrencyToCrypto);
</script>
@endsection
@endsection

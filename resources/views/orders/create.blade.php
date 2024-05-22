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
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter Amount" style="width: 70%;" required min="1">
                                <select class="form-control input-group-text" id="currency" name="currency">
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-1" style="text-align: center;font-size: 31px;">
                            <i class="ri-exchange-fill"></i>
                        </div>
                        <div class="col-3">
                            <div class="input-group mb-3">
                                <input name="converted_amount" type="text" value="0.00" class="form-control" id="crypto-amount" placeholder="Crypto Amount" style="width: 70%; background: #e9ecef;" readonly required min="1">
                                <select class="form-control input-group-text" id="crypto" name="crypto_currency">
                                  
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" id="submit_order" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@section('scripts')
<script src="{{asset('assets/js/crypto-convert.min.js')}}"></script>
<script>
const convert = new CryptoConvert({
    cryptoInterval: 15000, // Crypto prices update interval in ms (default 5 seconds on Node.js & 15 seconds on Browsers)
    fiatInterval: (60 * 1e3 * 60), // Fiat prices update interval (default every 1 hour)
    calculateAverage: true, // Calculate the average crypto price from exchanges
    binance: true, // Use binance rates
    bitfinex: true, // Use bitfinex rates
    coinbase: true, // Use coinbase rates
    kraken: true, // Use kraken rates
    HTTPAgent: null // HTTP Agent for server-side proxies (Node.js only)
});

async function init() {
    await convert.ready(); // Wait for the initial cache to load    
}
// Initialize and run the conversions
init();

function debounce(func, wait) {
    let timeout;
    return function(...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}

async function convertCurrencyToCrypto(fromCurrency, toCurrency, amount) {
   
    if (convert[fromCurrency] && convert[fromCurrency][toCurrency]) {
        const result = await convert[fromCurrency][toCurrency](amount);
        return result;
    } else {
     
        throw new Error(`Conversion from ${fromCurrency} to ${toCurrency} is not supported.`);
    }
}

const debouncedConvert = debounce(async function() {
   
    try {
       
        $("#crypto-amount").val(0.00);
        const amount = $("#amount").val();
        const currency = $("#currency").val();
        const crypto = $("#crypto").val();
        const converted_amount = await convertCurrencyToCrypto(currency, crypto, Number(amount));
        (typeof converted_amount) == 'number' ? $("#crypto-amount").val(converted_amount) : 0.00;
        $("#submit_order").attr('disabled', false);
    } catch (error) {
        console.error(error.message);
    }
}, 500);

$('#amount, #currency, #crypto').on('input change keyup', function(){
    $("#submit_order").attr('disabled', true);
    debouncedConvert()
});

document.addEventListener('DOMContentLoaded', () => {
    var default_currency = "{{$default_currency}}";

    const cryptoDropdown = document.getElementById('crypto');
    const fiatDropdown = document.getElementById('currency');

    convert.list.crypto.forEach(crypto => {
        const option = document.createElement('option');
        option.value = crypto;
        option.textContent = crypto;
        cryptoDropdown.appendChild(option);
    });

    convert.list.fiat.forEach(fiat => {
        const option = document.createElement('option');
        if(default_currency == fiat){
            option.selected = true;
        }
        option.value = fiat;
        option.textContent = fiat;
        fiatDropdown.appendChild(option);
    });
});
</script>
@endsection
@endsection

@if(session()->has('message'))
    <div class="w-100 d-flex justify-content-center mt-2 animated bounceInDown">
        <div class="alert alert-{{ (session()->has('message-type')) ? session('message-type') : 'success' }} w-50">

            @if(session('message-type') == 'danger')
                <i class="fas fa-exclamation-circle"></i>
            @else
                <i class="fas fa-check-circle"></i>
            @endif

            {!! session('message') !!}
        </div>
    </div>
@endif

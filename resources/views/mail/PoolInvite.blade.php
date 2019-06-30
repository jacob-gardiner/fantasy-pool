@component('mail::message')

You have been invited to {{ $pool->name }}!

Please click the button below to complete your registration.

@component('mail::button', ['url' => route('register') ])
    Register Now!
@endcomponent

Thanks,<br>
{{ config('app.name') }} Support
@endcomponent

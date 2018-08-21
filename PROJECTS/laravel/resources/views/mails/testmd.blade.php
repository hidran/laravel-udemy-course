@component('mail::message')
# Welcome {{$user->name}}

The body of your message.

@component('mail::button', ['url' => route('login')])
Please login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

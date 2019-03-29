@component('mail::message')
# We have a new contact

##Name
{{$name}}

##Email
{{$email}}

##Company
{{$company}}

@component('mail::button', ['url' => ''])
Go to the application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
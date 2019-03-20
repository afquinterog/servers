@component('mail::message')
# Server threshold reached

##Server
{{$server}}

##message
{{$message}}

@component('mail::button', ['url' => ''])
Go to the application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

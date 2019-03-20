@component('mail::message')
# Task Execution Report

After executing the task **{{$task}}** on the server **{{$server}}** we got this results:

```ruby
    {{$result}}
``` 


@component('mail::button', ['url' => ''])
Go to the application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

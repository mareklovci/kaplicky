@component('mail::message')
# Register email

Hello and welcome to our page. This email was sent to you due to your registration on our page.
To activate your account, please click the link below.<br>

@component('mail::button', ['url' => ''])
Activate
@endcomponent

We much appreciate your initiative.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

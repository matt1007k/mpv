@component('mail::message')
@isset($user)
<h1>Hola {{ $user->name }},</h1>
@endisset

<p>{{ $response->observation }}</p>

@component('mail::button', ['url' => $url])
Registrar nuevo
@endcomponent

Gracias por usar nuestra aplicación,<br>
{{ config('app.name') }}
@endcomponent
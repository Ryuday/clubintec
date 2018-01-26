@component('mail::message')
# Hola, {{ $name }}, bienvenido a Clubintec

Espero sus recomendaciones.

@component('mail::button', ['url' => route('verifyEmail', ['code' => $confirmation_code])])
Click para confirmar correo electrónico
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent

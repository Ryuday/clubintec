@component('mail::message')
# Hola, {{ $name }}, bienvenido a Clubintec

Espero sus recomendaciones.

@component('mail::button', ['url' => 'www.clubintec.com.ve'])
Ver sitio web
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent

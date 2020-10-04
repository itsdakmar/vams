@component('mail::message')
# Introduction

Hi, {{ $userName }}.
Anda telah di daftarkan ke sistem {{ config('app.name') }}.
Anda boleh log masuk ke sistem dengan menggunakan password ini {{ $password }}.

@component('mail::button', ['url' => route('dashboard')])
Log masuk
@endcomponent

Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent

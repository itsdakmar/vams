@component('mail::message')
# Penyelenggaran Jentera {{ $no_kenderaan }}

Perhatian!, <br>
Jentera untuk <span style="font-weight: bold">{{ $no_kenderaan }}</span> perlu di selenggara pada tarikh <span style="font-weight: bold">{{ $tarikh }}</span> .

Sila tekan butang di bawah untuk mengesahkan atau menangguh tarikh penyelenggaran
@component('mail::button', ['url' =>  $url ])
Sahkan / Tangguh
@endcomponent

Sekian terima kasih,<br>
{{ config('app.name') }}
@endcomponent

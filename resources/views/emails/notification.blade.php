@component('mail::message')
# Penyelenggaran Jentera {{ $no_kenderaan }}

Perhatian!, <br>
Jentera untuk {{ $no_kenderaan }} perlu di selenggara pada tarikh {{ $tarikh }}.

Sila tekan butang di bawah untuk mengesahkan atau menangguh tarikh penyelenggaran
@component('mail::button', ['url' =>  $url ])
Sahkan / Tangguh
@endcomponent

Sekian terima kasih,<br>
{{ config('app.name') }}
@endcomponent

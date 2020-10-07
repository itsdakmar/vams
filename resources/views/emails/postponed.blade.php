@component('mail::message')
# Penangguhan Penyelenggaran Jentera {{ $no_kenderaan }}

Perhatian!, <br>
<span style="font-weight: bold">{{ $username }}</span> telah memohon untuk penangguhan penyelenggaran bagi jentera <span style="font-weight: bold">{{ $no_kenderaan }}</span>.<br>
<br>
# Maklumat Penyelenggaraan <br>
No. Kenderaan : <span style="font-weight: bold">{{ $no_kenderaan }}</span><br>
Tarikh Asal : <span style="font-weight: bold">{{ $tarikh }}</span><br>

Sila tekan butang di bawah untuk lihat melalui sistem
@component('mail::button', ['url' =>  $url ])
    Papar
@endcomponent

Sekian terima kasih,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
    # Penyelenggaran Jentera {{ $no_kenderaan }}

    Perhatian!, <br>
    Jentera untuk <span style="font-weight: bold">{{ $no_kenderaan }}</span> perlu di selenggara pada tarikh <span style="font-weight: bold">{{ $tarikh }}</span> .

    Sekian terima kasih,<br>
    {{ config('app.name') }}
@endcomponent

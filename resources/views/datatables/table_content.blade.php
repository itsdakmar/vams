<thead>
<tr>
    <th>Nama</th>
    <th>Jawatan</th>
    <th>Balai</th>
    <th>Alamat Emel</th>
    <th>No. Telefon</th>
    <th>Tarikh Daftar</th>
</tr>
</thead>
<tbody>

</tbody>
<tfoot>
<tr>
    <th>Nama</th>
    <th>Jawatan</th>
    <th>Balai</th>
    <th>Alamat Emel</th>
    <th>No. Telefon</th>
    <th>Tarikh Daftar</th>
</tr>
</tfoot>

@section('bottom-js')
    <script>
        $(function (){
           $('#users-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('users.all') }}',
               column: [
                   { data: 'nama', name: 'nama'},
                   { data: 'nama', name: 'nama'},
                   { data: 'nama', name: 'nama'},
                   { data: 'nama', name: 'nama'},
                   { data: 'nama', name: 'nama'},
                   { data: 'nama', name: 'nama'},
               ]
           })
        });
    </script>
@endsection

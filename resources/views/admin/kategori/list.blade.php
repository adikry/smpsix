@extends('layout.backend.main', [
'title' => 'Kategori Rubrik',
'contentTitle' => 'Kategori Rubrik'
])
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="dataTable1" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listKategori as $kategori)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $kategori->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

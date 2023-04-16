@extends('layout.backend.main', [
'title' => 'Siswa',
'contentTitle' => 'Jumlah Siswa'
])

@section('content')

@if (session('success'))
<div class="row justify-content-end">
    <div class="alert bg-gradient-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="tableSiswa" class="table table-bordered table-hover" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Jumlah Siswa</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $sis)
                        <tr>
                            <td class="text-center">{{ $sis->jumlah }}</td>
                            <td><a href="/admin/siswa/{{ $sis->id }}/edit" class="btn btn-info btn-sm ml-1"><i class="fas fa-edit fa-fw"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

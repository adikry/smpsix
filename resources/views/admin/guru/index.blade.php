@extends('layout.backend.main',[
'title' => 'Guru',
'contentTitle' => 'Manage Guru',
])
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="/assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush
@section('content')
{{-- <x-alert></x-alert> --}}
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
                <table id="dataTable1" class="table table-bordered table-hover" width="100%">
                    <div class="text-right mb-3">
                        <a href="/admin/guru/create" class="btn btn-light active"><i class="fas fa-plus fa-fw"></i> Tambah Data</a>
                    </div>
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th width="12%">Foto</th>
                            <th width="30%">Nama</th>
                            <th width="25%">NIP</th>
                            <th width="18%">JK</th>
                            <th width="18%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataGuru as $guru)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @if ($guru->foto)
                                <img src="{{ asset('storage/' . $guru->foto) }}" alt="" class="img-thumbnail" width="75">
                                @else
                                @if ($guru->jk === 'Laki-laki')
                                <img src="/assets/images/avatar/default-male.png" alt="" class="img-thumbnail" width="75">
                                @else
                                <img src="/assets/images/avatar/default-female.png" alt="" class="img-thumbnail" width="75">
                                @endif
                                @endif
                            </td>
                            <td>{{ $guru->nama }}</td>
                            <td>{{ $guru->nip }}</td>
                            <td>{{ $guru->jk }}</td>
                            <td>
                                <div class="row ml-1">
                                    <a href="/admin/guru/{{ $guru->nip }}" class="btn btn-success btn-sm"><i class="fas fa-eye fa-fw"></i></a>
                                    <a href="/admin/guru/{{ $guru->nip }}/edit" class="btn btn-info btn-sm ml-1"><i class="fas fa-edit fa-fw"></i></a>

                                    <form action="/admin/guru/" method="post" id="formDelete">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm ml-1 deleteArtikel" value="{{ $guru->nip }}"><i class="fas fa-fw fa-trash-alt"></i></button>
                                    </form>
                                </div>

                                {{-- <a href="javasript:void(0)" class="btn btn-danger btn-sm">
                                    <i class="fas fa-ban"></i> No Action Available
                                </a> --}}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<!-- DataTables -->
<script src="/assets/adminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="/assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(function() {
        $("#dataTable1").DataTable({
            responsive: true
        });

        $("body").on('click', '.deleteArtikel', function(e) {
            e.preventDefault();

            $form = $("#formDelete")
            const artikel_slug = $(this).val();

            const formAct = $form.attr('action');
            $("#deleteModal").modal('show');

            $("#deleteModal").on("click", "#submitDelete", function() {
                $form.attr('action', formAct + artikel_slug);
                $form.submit();
            });
        });
    });

</script>
@endpush

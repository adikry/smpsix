@extends('layout.backend.main',[
'title' => 'Rubrik',
'contentTitle' => 'Manage Kategori Rubrik',
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
                <table id="dataTable2" class="table table-bordered table-hover" width="100%">
                    <div class="text-right mb-3">
                        <a href="/admin/kategori/create" class="btn btn-light active"><i class="fas fa-plus fa-fw"></i> Tambah Data</a>
                    </div>
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Kategori / Rubrik</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategori as $kat)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $kat->nama }}</td>

                            <td>
                                <div class="row ml-1">

                                    {{-- <a href="/admin/kategori/{{ $kat->id }}/edit" class="btn btn-info btn-sm ml-1"><i class="fas fa-edit fa-fw"></i></a> --}}
                                    @if ($kat->id != 3)
                                    <form action="/admin/kategori/" method="post" id="formDelete">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm ml-1 deleteArtikel" value="{{ $kat->id }}"><i class="fas fa-fw fa-trash-alt"></i></button>
                                    </form>
                                    @endif
                                </div>
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
        $("#dataTable2").DataTable({
            responsive: true
        });

        $("body").on('click', '.deleteArtikel', function(e) {
            e.preventDefault();

            $form = $("#formDelete")
            const kategori_id = $(this).val();

            const formAct = $form.attr('action');
            $("#deleteModal").modal('show');

            $("#deleteModal").on("click", "#submitDelete", function() {
                $form.attr('action', formAct + kategori_id);
                $form.submit();
            });
        });
    });

</script>
@endpush

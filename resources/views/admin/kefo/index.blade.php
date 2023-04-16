@extends('layout.backend.main',[
'title' => 'Rubrik KEFO',
'contentTitle' => 'Manage Rubrik : Kegiatan Foto & Vidio',
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
                        <a href="/admin/kefo/create" class="btn btn-light active"><i class="fas fa-plus fa-fw"></i> Tambah Data</a>
                    </div>
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Kegiatan / Acara</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kefo as $kepo)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $kepo->judul }}</td>
                            <td>
                                <div class="row ml-1">
                                    <a href="/admin/kefo/{{ $kepo->slug }}" class="btn btn-success btn-sm"><i class="fas fa-eye fa-fw"></i></a>
                                    <a href="/admin/kefo/{{ $kepo->slug }}/edit" class="btn btn-info btn-sm ml-1"><i class="fas fa-edit fa-fw"></i></a>

                                    <form action="/admin/kefo/" method="post" id="formDelete">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm ml-1 deleteArtikel" value="{{ $kepo->slug }}"><i class="fas fa-fw fa-trash-alt"></i></button>
                                    </form>
                                    @can('admin')
                                    @if ($kepo->published_at)
                                    <button type="button" class="btn btn-primary btn-sm ml-1 isPublished" value="{{ $kepo->judul }}"><i class="fas fa-fw fa-check"></i></button>
                                    @else
                                    <form action="/admin/kefo/publish?" id="formPublish">
                                        @csrf
                                        <input type="hidden" value="{{ $kepo->slug }}" name="slug">
                                        <button type="button" class="btn btn-default btn-sm ml-1 publishArtikel" value="{{ $kepo->slug }}"><i class="fas fa-fw fa-ellipsis-h"></i></button>
                                    </form>
                                    @endif
                                    @endcan
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
            const slug = $(this).val();

            const formAct = $form.attr('action');
            $("#deleteModal").modal('show');

            $("#deleteModal").on("click", "#submitDelete", function() {
                $form.attr('action', formAct + slug);
                // console.log(formAct + slug);
                $form.submit();
            });
        });

        $("body").on('click', '.publishArtikel', function(e) {
            e.preventDefault();
            $form = $("#formPublish")
            const valueId = $(this).val();
            const action = $form.attr('action');
            $("#publishModal").modal('show');
            console.log($form);

            $("#publishModal").on('click', "#confirm", function() {
                $form.attr('action', action + valueId);
                $form.submit();
            });
        });

        $("body").on('click', '.isPublished', function(e) {
            e.preventDefault();
            $("#isPublished").modal('show');
        })
    });

</script>
@endpush

@extends('layout.backend.main',[
'title' => 'Slide',
'contentTitle' => 'Manage Slide',
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
                        <a href="/admin/slide/create" class="btn btn-light active"><i class="fas fa-plus fa-fw"></i> Tambah Data</a>
                    </div>
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th width="25%">Foto</th>
                            <th width="20%">Alt Text</th>
                            <th width="17%">Urutan</th>
                            <th width="20%">Ditambahkan Oleh</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSlide as $slide)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $slide->imageSlide) }}" alt="" class="img-thumbnail" width="80%">
                            </td>
                            <td>{{ $slide->alt }}</td>
                            <td>{{ $slide->urutan }}</td>
                            <td>{{ $slide->user->nama }}</td>
                            <td>
                                <div class="row ml-1">
                                    <a href="/admin/slide/{{ $slide->id }}/edit" class="btn btn-info btn-sm ml-1"><i class="fas fa-edit fa-fw"></i></a>

                                    {{-- <form action="/admin/slide/" method="post" id="formDelete">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm ml-1 deleteArtikel" value="{{ $slide->id }}"><i class="fas fa-fw fa-trash-alt"></i></button>
                                    </form> --}}
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

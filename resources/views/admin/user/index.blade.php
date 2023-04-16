@extends('layout.backend.main', [
'title' => 'User Admin',
'contentTitle' => 'Manage Admin'
])
@section('content')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="/assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
@endpush

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
                <table id="tableUser" class="table table-bordered table-hover" width="100%">
                    <div class="text-right mb-3">
                        <a href="/admin/user/create" class="btn btn-light active"><i class="fas fa-plus fa-fw"></i> Tambah Admin</a>
                    </div>
                    <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->is_admin) ? "Administrator" : "User"  }}</td>
                            <td>
                                @if ($user->id != auth()->user()->id)
                                <div class="row ml-1">
                                    <a href="/admin/user/{{ $user->username }}/edit" class="btn btn-info btn-sm ml-1"><i class="fas fa-edit fa-fw"></i></a>
                                    <a href="/admin/user/change-password-admin/{{ $user->username }}" class="btn btn-warning btn-sm ml-1"><i class="fas fa-unlock-alt fa-fw"></i></a>
                                    <form action="/admin/user/" method="post" id="formDelete">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-sm ml-1 deleteArtikel" value="{{ $user->username }}"><i class="fas fa-fw fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('js')
<script src="/assets/adminLTE/plugins/datatables/jquery.dataTables.js"></script>
<script src="/assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {

        $("#tableUser").DataTable();

        $("body").on('click', '.deleteArtikel', function(e) {
            e.preventDefault();

            $form = $("#formDelete")
            const user_id = $(this).val();

            const formAct = $form.attr('action');
            $("#deleteModal").modal('show');

            $("#deleteModal").on("click", "#submitDelete", function() {
                $form.attr('action', formAct + user_id);
                $form.submit();
            });
        });

    });

</script>
@endpush
@endsection

@extends('layout.backend.main', [
'title' => 'Detail Staff',
'contentTitle' => 'Detail Staff'
])
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-12">
        <div class="pb-3">
            <a href="/admin/staff" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
            <a href="/admin/staff/{{ $staff->nip }}/edit" class="btn btn-info"><i class="fas fa-edit fa-fw"></i> Edit</a>
            <form action="/admin/staff/" method="post" id="formDelete" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-danger ml-1 deleteArtikel" value="{{ $staff->nip }}"><i class="fas fa-fw fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
        <div class="news-block bg-white mb-5 rounded shadow-lg">
            <div class="row justify-content-center">
                <div class="col-md-4 py-3 mb-5">
                    @if ($staff->foto)
                    <img src="{{ asset('storage/' . $staff->foto) }}" alt="" class="img-fluid rounded shadow-lg">
                    @else
                    <img src="/assets/images/avatar/default-male.png" alt="" class="img-fluid rounded shadow-lg">
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="35%">Nama</th>
                                <td width="5%">:</td>
                                <td>{{ $staff->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>{{ $staff->nip }}</td>
                            </tr>
                            <tr>
                                <th>Jabtan</th>
                                <td>:</td>
                                <td>{{ $staff->jabatan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="news-block-info px-5">
                    <a href="/admin/linagar" class="my-2 btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
                </div>
                <div class="news-block-info px-5">
                    <p class="text-muted">
                        <i style="font-size:12px">
                            @if ($staff->created_at == $staff->updated_at)
                            Profil dibuat tanggal: {{ $staff->created_at }} oleh {{ $staff->user->nama }}
                            @else
                            Terakhir dirubah {{ $staff->updated_at }} oleh {{ $staff->user->nama }}
                            @endif
                        </i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script>
    $("body").on('click', '.deleteArtikel', function(e) {
        e.preventDefault();

        $form = $("#formDelete")
        const id_nip = $(this).val();

        const formAct = $form.attr('action');
        $("#deleteModal").modal('show');

        $("#deleteModal").on("click", "#submitDelete", function() {
            $form.attr('action', formAct + id_nip);
            $form.submit();
        });
    });

</script>
@endpush

@endsection

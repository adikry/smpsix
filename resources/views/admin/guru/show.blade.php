@extends('layout.backend.main', [
'title' => 'Detail Guru',
'contentTitle' => 'Detail Guru'
])
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-8 col-12">
        <div class="pb-3">
            <a href="/admin/guru" class="btn btn-success"><i class="fas fa-angle-left fa-fw"></i> Back</a>
            <a href="/admin/guru/{{ $guru->nip }}/edit" class="btn btn-info"><i class="fas fa-edit fa-fw"></i> Edit</a>
            <form action="/admin/guru/" method="post" id="formDelete" class="d-inline">
                @method('delete')
                @csrf
                <button type="button" class="btn btn-danger ml-1 deleteArtikel" value="{{ $guru->nip }}"><i class="fas fa-fw fa-trash-alt"></i> Hapus</button>
            </form>
        </div>
        <div class="news-block bg-white mb-5 rounded shadow-lg">
            <div class="row justify-content-center">
                <div class="col-md-4 py-3 mb-5">
                    @if ($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="" class="img-fluid rounded shadow-lg">
                    @else
                    @if ($guru->jk === 'Laki-laki')
                    <img src="/assets/images/avatar/default-male.png" alt="" class="img-fluid rounded shadow-lg">
                    @else
                    <img src="/assets/images/avatar/default-female.png" alt="" class="img-fluid rounded shadow-lg">
                    @endif
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
                                <td>{{ $guru->nama }}</td>
                            </tr>
                            <tr>
                                <th>NIP</th>
                                <td>:</td>
                                <td>{{ $guru->nip }}</td>
                            </tr>
                            <tr>
                                <th>Mapel</th>
                                <td>:</td>
                                <td><i>Some Data</i></td>
                            </tr>
                            <tr>
                                <th>JK</th>
                                <td>:</td>
                                <td>{{ $guru->jk }}</td>
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
                            @if ($guru->created_at == $guru->updated_at)
                            Profil dibuat tanggal: {{ $guru->created_at }} oleh {{ $guru->user->nama }}
                            @else
                            Terakhir dirubah {{ $guru->updated_at }} oleh {{ $guru->user->nama }}
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
        const artikel_slug = $(this).val();

        const formAct = $form.attr('action');
        $("#deleteModal").modal('show');

        $("#deleteModal").on("click", "#submitDelete", function() {
            $form.attr('action', formAct + artikel_slug);
            $form.submit();
        });
    });

</script>
@endpush

@endsection

@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Data Pemetaan
    </div>

    <div class="card-body">
        <div style="margin-bottom: 10px;" class="row align-items-center">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <a class="btn btn-success" href="{{ route('admin.kecamatan.create') }}">
                    Tambah Data
                </a>
            </div>
            <div class="col-lg-6">
                <input type="text" id="kecamatanSearch" class="form-control" placeholder="Cari data…">
            </div>
        </div>

        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Kecamatan">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>Nama Kecamatan</th>
                        <th>Jalan Diperbaiki</th>
                        <th>Panjang Jalan</th>
                        <th>Lebar Jalan</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Data Pembangunan</th>
                        <th>Dokumen</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kecamatans as $key => $kecamatan)
                        <tr data-entry-id="{{ $kecamatan->id }}">
                            <td></td>
                            <td>{{ $kecamatan->nama }}</td>
                            <td>{{ $kecamatan->jalan_diperbaiki }}</td>
                            <td>{{ $kecamatan->panjang_jalan }}</td>
                            <td>{{ $kecamatan->lebar_jalan }}</td>
                            <td>{{ $kecamatan->rt }}</td>
                            <td>{{ $kecamatan->rw }}</td>
                            <td>{{ $kecamatan->data_pembangunan }}</td>
                            <td>
                                @if($kecamatan->dokumen)
                                    <a href="{{ asset('storage/'.$kecamatan->dokumen) }}" target="_blank">Lihat</a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.kecamatan.edit', $kecamatan->id) }}">Edit</a>
                                <form action="{{ route('admin.kecamatan.destroy', $kecamatan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-xs btn-danger" value="Hapus">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
      $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 100,
      });
      let table = $('.datatable-Kecamatan:not(.ajaxTable)').DataTable()

      // Wire up custom search input to DataTables global search
      $('#kecamatanSearch').on('keyup change', function () {
        table.search(this.value).draw();
      });

      $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
          $($.fn.dataTable.tables(true)).DataTable()
              .columns.adjust();
      });
    })
</script>
@endsection

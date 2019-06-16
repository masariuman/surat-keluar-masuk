@extends('tenpureto.beken.index')

@section('seo-title')
	Surat Keluar
@endsection

@section('title')
  <h1>
    Surat Keluar
    <small>Info Surat Keluar</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Surat Keluar</a></li>
  <li class="active">Info Surat Keluar</li>
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('tenpureto/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- SweetAlert -->
    <link href="{{asset('tenpureto/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endpush

@section('main')

      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content" >
            <div class="box box-default">
            <div class="box">
              @if(session('new'))
              <!-- Success Alert -->
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('new') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('new')}}
              @endif
              @if(session('edit'))
              <!-- Success Alert -->
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('edit') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('edit')}}
              @endif
              @if(session('delete'))
              <!-- Success Alert -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><strong><i class="hi hi-check"></i> Sukses</strong></h4>
                    <p>{{ session('delete') }}</p>
                </div>
              <!-- END Success Alert -->
              {{session()->forget('delete')}}
              @endif
              <div style="margin:10px;">
                <a href="/surat-keluar/new" class="btn btn-block btn-primary btn-lg">Tambah Surat Keluar</a>
              </div>
              <hr>
            <div class="box-header">
              <h3 class="box-title">Data Seluruh Surat Keluar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>NOMOR BERKAS</th>
                  <th class='text-center'>ALAMAT PENERIMA</th>
                  <th class='text-center'>TANGGAL</th>
                  <th class='text-center'>PERIHAL</th>
                  <th class='text-center'>NOMOR PETUNJUK</th>
                  <th class='text-center'>NOMOR</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($keluar as $no => $keluar)
                    <tr>
                      <td class='text-center'>{{$no+1}}</td>
                      <td class='text-center'>{{$keluar->nomor_berkas}}</td>
                      <td class='text-center'>{{$keluar->alamat_penerima}}</td>
                      <td class='text-center'>{{ Carbon\Carbon::parse($keluar->tanggal)->formatLocalized('%d %B %Y')}}</td>
                      <td class='text-center'>{{$keluar->perihal}}</td>
                      <td class='text-center'>{{$keluar->nomor_petunjuk}}</td>
                      <td class='text-center'>{{$keluar->nomor}}</td>
                      <td class='text-center'>
                        <button title="LIHAT DATA" id="info" class="btn bg-purple btn-xs" data-photo-id="{{$keluar->id}}" data-toggle="modal" data-target="#modal-default" data-karyawan='{{$keluar}}' data-tgl='{{ Carbon\Carbon::parse($keluar->tanggal)->formatLocalized('%d %B %Y')}}'><i class="fa fa-eye"></i></button>
                        <a title="UBAH DATA" href="{{ url('/surat-keluar/'.$keluar->id.'/edit') }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a><br>
                        <button title="HAPUS DATA" class="delete-data btn btn-danger btn-xs" data-photo-id="{{$keluar->id}}"><i class="fa fa-trash"></i></button>
                        <a title="DOWNLOAD DATA" href="{{ url('/tenpureto/dokumen_keluar/'.$keluar->dokumen) }}" class="btn btn-success btn-xs"><i class="fa fa-cloud-download"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th class='text-center'>NO</th>
                  <th class='text-center'>NOMOR BERKAS</th>
                  <th class='text-center'>ALAMAT PENERIMA</th>
                  <th class='text-center'>TANGGAL</th>
                  <th class='text-center'>PERIHAL</th>
                  <th class='text-center'>NOMOR PETUNJUK</th>
                  <th class='text-center'>NOMOR</th>
                  <th class='text-center'>AKSI</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
              <b>
                <table class="table table-striped">
                  </tr>
                    <tr>
                      <td>Nomor Berkas</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="nama"></div></td>
                    </tr>
                    <tr>
                      <td>Alamat Penerima</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="nip"></div></td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="kelamin"></div></td>
                    </tr>
                    <tr>
                      <td>Perihal</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="agama"></div></td>
                    </tr>
                    <tr>
                      <td>Nomor Petunjuk</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="ttl">aswawu</div></td>
                    </tr>
                    <tr>
                      <td>Nomor</td>
                      <td>:</td>
                      <td style="width: 65%"><div class="email">aswawu</div></td>
                    </tr>
                  </table>
                </b>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{asset('tenpureto/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tenpureto/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <!-- SweeAlert -->
    <script src="{{asset('tenpureto/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
    <script>
      $('button.delete-data').click(function() {
        var eventId = $(this).attr("data-photo-id");
        deleteEvent(eventId);
      });
      function deleteEvent(eventId) {
        swal({
          title: "Apakah anda yakin?",
          text: "Apakah anda yakin ingin menghapus?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Ya",
          confirmButtonColor: "#ec6c62"
        }, function() {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
          $.ajax({
            url: "surat-keluar/delete/" + eventId,
            type: "post"
          })
          .done(function(data) {
            swal("SUKSES!", "Data Berhasil Dihapus", "success");
            setTimeout(function () {
              location.reload();
            }, 1500);

          })
          .error(function(data) {
            swal("Oops", "Kami Tidak Dapat Terhubung Ke Server !", "error");
          });
        });
      }
    </script>
    <script>
        $('#modal-default').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var nomor_berkas = button.data('karyawan').nomor_berkas
          var alamat_pengirim = button.data('karyawan').alamat_penerima
          var tanggal = button.data('tgl')
          var nomor = button.data('karyawan').perihal
          var perihal = button.data('karyawan').nomor_petunjuk
          var nomor_petunjuk = button.data('karyawan').nomor
          var stats = button.data('karyawan').stats
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('.modal-title').text('INFO LENGKAP')
          modal.find('.nama').text(nomor_berkas)
          modal.find('.nip').text(alamat_pengirim)
          modal.find('.kelamin').text(tanggal)
          modal.find('.agama').text(nomor)
          modal.find('.ttl').text(perihal)
          modal.find('.email').text(nomor_petunjuk)
        })
      </script>
@endpush

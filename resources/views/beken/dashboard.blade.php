@extends('tenpureto.beken.index')

@section('seo-title')
	Dashboard
@endsection

@section('title')
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
@endsection

@section('breadcrumb')
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Dashboard</li>
@endsection

@push('css')
@endpush

@section('main')
<!-- Small boxes (Stat box) -->
<div class="row">
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$countmasuk}}</h3>

              <p>Jumlah Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-in"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$countkeluar}}</h3>

              <p>Jumlah Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="fa fa-sign-out"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content" >
            <div class="box box-default">
            <div class="box">
                <br>
            <div class="box-header">
              <h3 class="box-title">10 Surat Keluar Baru Terakhir</h3>
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
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
            <hr>
            <div class="box-header">
                <h3 class="box-title">10 Data Seluruh Surat Masuk</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class='text-center'>NO</th>
                    <th class='text-center'>NOMOR BERKAS</th>
                    <th class='text-center'>ALAMAT PENGIRIM</th>
                    <th class='text-center'>TANGGAL</th>
                    <th class='text-center'>NOMOR</th>
                    <th class='text-center'>PERIHAL</th>
                    <th class='text-center'>NOMOR PETUNJUK</th>
                    <th class='text-center'>NOMOR PAKKET</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($masuk as $no => $masuk)
                      <tr>
                        <td class='text-center'>{{$no+1}}</td>
                        <td class='text-center'>{{$masuk->nomor_berkas}}</td>
                        <td class='text-center'>{{$masuk->alamat_pengirim}}</td>
                        <td class='text-center'>{{ Carbon\Carbon::parse($masuk->tanggal)->formatLocalized('%d %B %Y')}}</td>
                        <td class='text-center'>{{$masuk->nomor}}</td>
                        <td class='text-center'>{{$masuk->perihal}}</td>
                        <td class='text-center'>{{$masuk->nomor_petunjuk}}</td>
                        <td class='text-center'>{{$masuk->nomor_paket}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                      <th class='text-center'>NO</th>
                      <th class='text-center'>NOMOR BERKAS</th>
                      <th class='text-center'>ALAMAT PENGIRIM</th>
                      <th class='text-center'>TANGGAL</th>
                      <th class='text-center'>NOMOR</th>
                      <th class='text-center'>PERIHAL</th>
                      <th class='text-center'>NOMOR PETUNJUK</th>
                      <th class='text-center'>NOMOR PAKKET</th>
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
@endsection

@push('js')
@endpush

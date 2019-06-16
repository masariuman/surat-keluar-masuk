{!! csrf_field() !!}
<!-- nama	 -->

@if(isset($masuk))
	{!! Form::hidden('id',$masuk->id) !!}
@endif

<div>
	{!! Form::label('nomor_berkas', 'Nomor Berkas :', ['class' => 'control-label']) !!}
	{!! Form::text('nomor_berkas', null, ['class' => 'form-control']) !!}

  @if($errors->has('nomor_berkas'))
    <span><i><b><font color="red">{{$errors->first('nomor_berkas')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('alamat_pengirim', 'Alamat Pengirim :', ['class' => 'control-label']) !!}
	{!! Form::text('alamat_pengirim', null, ['class' => 'form-control']) !!}

  @if($errors->has('alamat_pengirim'))
    <span><i><b><font color="red">{{$errors->first('alamat_pengirim')}}</font></b></i></span><br>
  @endif
</div>
<br>
{!! Form::label('tanggal', 'Tanggal :', ['class' => 'control-label']) !!}
<br />
<div class="input-group date">
  <div class="input-group-addon">
    <i class="fa fa-calendar"></i>
  </div>
	{!! Form::text('tanggal', null, ['class' => 'form-control pull-right', 'id' => 'datepicker']) !!}

  @if($errors->has('tanggal'))
    <span><i><b><font color="red">{{$errors->first('tanggal')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nomor', 'Nomor :', ['class' => 'control-label']) !!}
	{!! Form::text('nomor', null, ['class' => 'form-control']) !!}

  @if($errors->has('nomor'))
    <span><i><b><font color="red">{{$errors->first('nomor')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('perihal', 'Perihal :', ['class' => 'control-label']) !!}
	{!! Form::text('perihal', null, ['class' => 'form-control']) !!}

  @if($errors->has('perihal'))
    <span><i><b><font color="red">{{$errors->first('perihal')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nomor_petunjuk', 'Nomor Petunjuk :', ['class' => 'control-label']) !!}
	{!! Form::text('nomor_petunjuk', null, ['class' => 'form-control']) !!}

  @if($errors->has('nomor_petunjuk'))
    <span><i><b><font color="red">{{$errors->first('nomor_petunjuk')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
	{!! Form::label('nomor_paket', 'Nomor Paket :', ['class' => 'control-label']) !!}
	{!! Form::text('nomor_paket', null, ['class' => 'form-control']) !!}

  @if($errors->has('nomor_paket'))
    <span><i><b><font color="red">{{$errors->first('nomor_paket')}}</font></b></i></span><br>
  @endif
</div>
<br>
<div>
    @if($errors->any())
      <div class="form-group {{$errors->has('dokumen') ? 'has-error' : 'has-success'}}">
    @else
      <div class="form-group">
    @endif
    {!! Form::label('dokumen','Upload File :') !!}
    {!! Form::file('dokumen') !!}

    @if($errors->has('dokumen'))
      <span><i><b><font color="red">{{$errors->first('dokumen')}}</font></b></i></span><br>
    @endif
</div>
<br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

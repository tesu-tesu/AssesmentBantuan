@extends('layout.template')
@section('title', 'Edit Pengajuan')

@section('content-title', 'Edit Data Pengajuan')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Edit Data Pengajuan</h2>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('add_pengajuan_data') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Program Bantuan</label>
                                <input name="program_bantuan" required type="text" class="form-control" placeholder="Masukkan Nama" value="{{ $pengajuan->program_bantuan }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    <option value=0 @if($pengajuan->status == 0) {{ 'selected' }} @endif>Verifikasi</option>
                                    <option value=1 @if($pengajuan->status == 1) {{ 'selected' }} @endif>Survey</option>
                                    <option value=2 @if($pengajuan->status == 2) {{ 'selected' }} @endif>Tidak Dibantu</option>
                                    <option value=3 @if($pengajuan->status == 3) {{ 'selected' }} @endif>Dibantu</option>
                                    <option value=4 @if($pengajuan->status == 4) {{ 'selected' }} @endif>Rekomendasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lembaga</label>
                                <select name="lembaga" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    @foreach ($lembagas as $data)
                                        <option value="{{ $data->id }}" @if($pengajuan->id_lembaga == $data->id) {{ 'selected' }} @endif) >{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user" value="{{ $pengajuan->id }}">
                            <!-- /.card-body -->
                            <div class="">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

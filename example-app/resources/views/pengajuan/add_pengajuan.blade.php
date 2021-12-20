@extends('layout.template')
@section('title', 'Tambah Pengajuan')

@section('content-title', 'Data Pengajuan')

@section('content')
    <div class="container">
        <div class="">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Tambah Data Pengajuaaaa</h2>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('add_pengajuan_data') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Program Bantuan</label>
                                <input name="program_bantuan" type="text"  required class="form-control" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    <option value=0>Verifikasi</option>
                                    <option value=1>Survey</option>
                                    <option value=2>Tidak Dibantu</option>
                                    <option value=3>Dibantu</option>
                                    <option value=4>Rekomendasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lembaga</label>
                                <select name="lembaga" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    @foreach ($lembaga as $data)
                                        <option value="{{ $data->id }}" {{ $loop->first ? 'selected="selected"' : '' }}>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user" value="{{ $temp->id }}">
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

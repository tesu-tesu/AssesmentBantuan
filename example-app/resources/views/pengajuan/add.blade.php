@extends('layout.template')
@section('title', 'Tambah Pengajuan')

@section('content-title', 'Data Pengajuan')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Cari Data Pengaju</h2>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover m-0">
                            <thead>
                                <tr>
                                    <th scope="col-1">#</th>
                                    <th scope="col-9">Nama Pengaju</th>
                                    <th scope="col-9">NIK</th>
                                    <th scope="col-9">Alamat</th>
                                    <th scope="col-2">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($user as $data)
                                    <tr>
                                        <td scope="col">{{ $no++ }}</td>
                                        <td scope="col">{{ $data->name }}</td>
                                        <td scope="col">{{ $data->nik }}</td>
                                        <td scope="col">{{ $data->alamat }}</td>
                                        <td scope="col">
                                            <form method="POST" action="{{ route('add_pengajuan_data_page') }}">
                                                @csrf
                                                <input name="id" type="hidden" value="{{ $data->id }}">
                                                <input name="name" type="hidden" value="{{ $data->name }}">
                                                <input name="nik" type="hidden" value="{{ $data->nik }}">
                                                <input name="alamat" type="hidden" value="{{ $data->alamat }}">
                                                <input name="no_telp" type="hidden" value="{{ $data->no_telp }}">
                                                <button type="submit" class="btn btn-block btn-success">Pilih</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Tambah Data Pengaju</h2>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('add_pengajuan_data_page') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input name="name" required type="text" class="form-control" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <input name="nik" type="number" required class="form-control" placeholder="Masukkan NIK">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input name="alamat" type="text" required class="form-control" placeholder="Masukkan Alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon</label>
                                <input name="no_telp" type="text" required class="form-control" placeholder="Masukkan No Telepon">
                            </div>
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

@extends('layout.template')
@section('title', 'Tambah Pengaju')

@section('content-title', 'Data Pengaju')

@section('content')

    <div class="">
        <div class="p-5 mt-5">
                <div class="">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pengaju</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('add_user_data') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input name="nama" required type="text" class="form-control" required placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <input name="nik" required type="number" class="form-control" required placeholder="Masukkan NIK">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input name="alamat" required type="text" class="form-control" required placeholder="Masukkan Alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Telepon</label>
                                <input name="no_telp" required type="text" class="form-control" required placeholder="Masukkan No Telepon">
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

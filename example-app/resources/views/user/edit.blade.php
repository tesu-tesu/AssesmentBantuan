@extends('layout.template')
@section('title', 'Data Pengaju')

@section('content-title', 'Data Pengaju')

@section('content')


<div class="">
    <div class="p-5 mt-5">
            <div class="">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('edit_user_data', ['id_user' => $user->id]) }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pengaju</label>
                            <input name="name" required type="text" class="form-control" placeholder="Masukkan Nama Lembaga" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label>NIK</label>
                            <input name="nik" required type="text" class="form-control" placeholder="Masukkan NIK" value="{{ $user->nik }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input name="alamat" required type="text" class="form-control" placeholder="Masukkan Alamat" value="{{ $user->alamat }}">
                        </div>
                        <div class="form-group">
                            <label>Nomer Telepon</label>
                            <input name="no_telp" required type="text" class="form-control" placeholder="Masukkan Nomer Telepon" value="{{ $user->no_telp }}">
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
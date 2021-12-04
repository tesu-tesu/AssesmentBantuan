@extends('layout.template')
@section('title', 'Tambah Admin')

@section('content-title', 'Data Admin')

@section('content')

    <div class="container">
        <div class=" justify-content-center mt-5">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('add_admin_data') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Admin</label>
                                <input name="name" type="text" class="form-control" placeholder="Masukkan Nama">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lembaga</label>
                                <select name="lembaga" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    @foreach ($lembaga as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input name="nik" type="text" class="form-control" placeholder="Masukkan NIK">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomer Telepon</label>
                                        <input name="no_telp" type="text" class="form-control"
                                            placeholder="Masukkan Nomer Telepon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat"
                                    placeholder="Masukkan Alamat"> </textarea>
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

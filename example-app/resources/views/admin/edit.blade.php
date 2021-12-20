@extends('layout.template')
@section('title', 'Edit Admin')

@section('content-title', 'Data Admin')

@section('content')
    <div class="container">
        <div class=" justify-content-center mt-5">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('edit_admin_data', ['id_admin' => $admin->id]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Admin</label>
                                <input name="name" required type="text" class="form-control" placeholder="Masukkan Nama" value="{{ $user->name }}" >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" required type="email" class="form-control"
                                    placeholder="Masukkan Email" value="{{ $admin->email }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" required type="password" class="form-control"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input name="password-confirmation" required type="password" class="form-control"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lembaga</label>
                                <select name="lembaga" class="custom-select rounded-0" id="exampleSelectRounded0">
                                    @foreach ($lembagas as $data)
                                        @if ($lembaga->id == $data->id)
                                                <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                                            @else
                                                <option value="{{ $data->id }}" >{{ $data->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input name="nik" required type="text" class="form-control" placeholder="Masukkan NIK" value="{{ $user->nik }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomer Telepon</label>
                                        <input name="no_telp" required type="text" class="form-control"
                                            placeholder="Masukkan Nomer Telepon" value="{{ $user->no_telp }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat"
                                    placeholder="Masukkan Alamat"> {{ $user->alamat }} </textarea>
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

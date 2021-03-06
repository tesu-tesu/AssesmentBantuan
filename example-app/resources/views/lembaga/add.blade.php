@extends('layout.template')
@section('title', 'Tambah Lembaga')

@section('content-title', 'Data Lembaga')

@section('content')

    <div class="container">
        <div class="justify-content-center mt-5">
                <div class="">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('add_lembaga_data') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Lembaga</label>
                                <input name="name" type="text" required class="form-control" placeholder="Masukkan Nama Lembaga">
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

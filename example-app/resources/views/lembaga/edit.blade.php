@extends('layout.template')
@section('title', 'Data Lembaga')

@section('content-title', 'Data Lembaga')

@section('content')


<div class="container">
    <div class="d-flex justify-content-center mt-5">
            <div class="row">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Data</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('edit_lembaga_data', ['id_lembaga' => $lembaga->id]) }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lembaga</label>
                            <input name="nama_lembaga" type="text" class="form-control" placeholder="Masukkan Nama Lembaga" value="{{ $lembaga->name }}">
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
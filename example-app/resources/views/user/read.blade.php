@extends('layout.template')
@section('title', 'Data User')

@section('content-title', 'Data User')

@section('content')

    <div class="row">
        <div class="col-md-2 m-3">
            <a href="{{ route('add_user_page') }}" class="btn btn-success">+ Tambah User</a>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover m-0">
                                <thead>
                                    <tr>
                                        <th scope="col-1">#</th>
                                        <th scope="col-9">Nama Pengaju</th>
                                        <th scope="col-9">NIK</th>
                                        <th scope="col-9">Alamat</th>
                                        <th scope="col-9">Nomer Telepon</th>
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
                                            <td scope="col">{{ $data->no_telp }}</td>
                                            <td scope="col">
                                                <div class="dropdown">
                                                    <a class="btn btn-default dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Atur
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{ route('edit_user_page', ['id_data' => $data->id]) }}"><i
                                                                class="fa fa-edit"></i>&nbsp;Edit</a>
                                                        <a class="dropdown-item" href="{{ route('delete_user_data', ['id_data' => $data->id]) }}"><i
                                                                class="fa fa-trash"></i>&nbsp;Delete</a>
                                                    </div>
                                                </div>
                                                <!--  -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection

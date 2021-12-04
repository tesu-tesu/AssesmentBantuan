@extends('layout.template')
@section('title', 'Data Pengajuan')

@section('content-title', 'Data Pengajuan')

@section('content')


    <div class="row">
        <div class="col-md-2 m-3">
            <a href="{{ route('add_pengajuan_page') }}" class="btn btn-success">+ Tambah Pengajuan</a>
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
                                        <th scope="col-9">Nama</th>
                                        <th scope="col-9">NIK</th>
                                        <th scope="col-9">Alamat</th>
                                        <th scope="col-9">Lembaga</th>
                                        <th scope="col-9">Program Bantuan</th>
                                        <th scope="col-9">Status</th>
                                        <th scope="col-2">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($pengajuan as $data)
                                        <tr>
                                            <td scope="col">{{ $no++ }}</td>
                                            <td scope="col">{{ $data->users_->name }}</td>
                                            <td scope="col">{{ $data->users_->nik }}</td>
                                            <td scope="col">{{ $data->users_->alamat }}</td>
                                            <td scope="col">{{ $data->lembagas_->name }}</td>
                                            <td scope="col">{{ $data->program_bantuan }}</td>
                                            <td scope="col">
                                                <div class="btn-group">
                                                    @if ($data->status == 0)
                                                        <button type="button" class="btn btn-info">Verifikasi</button>
                                                    @elseif ($data->status == 1)
                                                        <button type="button" class="btn btn-info">Survey</button>
                                                    @elseif ($data->status == 2)
                                                        <button type="button" class="btn btn-danger">Tidak Dibantu</button>
                                                    @elseif ($data->status == 3)
                                                        <button type="button" class="btn btn-success">Dibantu</button>
                                                    @elseif ($data->status == 4)
                                                        <button type="button" class="btn btn-info">Rekomendasi</button>
                                                    @endif

                                                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a  class="dropdown-item" href="{{ route('edit_status_pengajuan_data', ['data' => "0 $data->id"]) }}">Verifikasi</a>
                                                        <a class="dropdown-item" href="{{ route('edit_status_pengajuan_data', ['data' => "1 $data->id"]) }}">Survey</a>
                                                        <a class="dropdown-item" href="{{ route('edit_status_pengajuan_data', ['data' => "2 $data->id"]) }}">Tidak Dibantu</a>
                                                        <a class="dropdown-item" href="{{ route('edit_status_pengajuan_data', ['data' => "3 $data->id"]) }}">Dibantu</a>
                                                        <a class="dropdown-item" href="{{ route('edit_status_pengajuan_data', ['data' => "4 $data->id"]) }}">Rekomendasi</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td scope="col">
                                                <div class="dropdown">
                                                    <a class="btn btn-default dropdown-toggle" href="#" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Atur
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit_pengajuan_page', ['id_data' => $data->id]) }}"><i
                                                                class="fa fa-edit"></i>&nbsp;Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('delete_pengajuan_data', ['id_data' => $data->id]) }}"><i
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

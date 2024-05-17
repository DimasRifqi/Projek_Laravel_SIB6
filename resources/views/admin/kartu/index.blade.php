@extends('admin.layouts.app')
@section('konten')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kartu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/kartu/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="kode"
                            aria-describedby="emailHelp" placeholder="Tambah Kode">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                            aria-describedby="emailHelp" placeholder="Tambah Nama">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="diskon"
                            aria-describedby="emailHelp" placeholder="Tambah Diskon">
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" id="exampleInputEmail1" name="iuran"
                            aria-describedby="emailHelp" placeholder="Tambah Iuran">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid px-4">
        <h1 class="mt-4">Kartu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                DataTables is a third party plugin that is used to generate the demo table below. For more information about
                DataTables, please visit the
                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                .
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <a href="" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-regular fa-square-plus"></i></a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Diskon</th>
                            <th>Iuran</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Diskon</th>
                            <th>Iuran</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($kartu as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->kode }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->diskon }}</td>
                                <td>{{ $k->iuran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

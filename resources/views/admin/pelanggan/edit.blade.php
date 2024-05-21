@extends('admin.layouts.app')

@section('konten')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <h1 align="center">Edit Pelanggan</h1>

    <form action="{{ route('pelanggan.update', $pl->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="kode" class="col-4 col-form-label">Kode</label>
            <div class="col-8">
                <input id="kode" name="kode" type="text" class="form-control" value="{{ $pl->kode }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama</label>
            <div class="col-8">
                <input id="nama" name="nama" type="text" class="form-control" value="{{ $pl->nama }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-4">Jenis Kelamin</label>
            <div class="col-8">
                @foreach ($gender as $g)
                    @php
                        $cek = ($g == $pl->jk) ? 'checked' : '';
                    @endphp
                    <div class="custom-control custom-radio custom-control-inline">
                        <input name="jk" id="radio_0{{ $g }}" type="radio" class="custom-control-input" value="{{ $g }}" {{ $cek }}>
                        <label for="radio_0{{ $g }}" class="custom-control-label">{{ $g }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="tmp_lahir" class="col-4 col-form-label">Tempat Lahir</label>
            <div class="col-8">
                <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="{{ $pl->tmp_lahir }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label>
            <div class="col-8">
                <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control" value="{{ $pl->tgl_lahir }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input id="email" name="email" type="email" class="form-control" value="{{ $pl->email }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="foto" class="col-4 col-form-label">Foto</label>
            <div class="col-8">
                <input id="foto" name="foto" type="file" class="form-control">
                @if (!empty($pl->foto))
                    <img src="{{ url('admin/image') }}/{{ $pl->foto }}" alt="Foto Pelanggan" class="mt-2" style="width: 150px;">
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="kartu_id" class="col-4 col-form-label">Pilihan Kartu</label>
            <div class="col-8">
                <select id="kartu_id" name="kartu_id" class="custom-select">
                    @foreach ($kartu as $k)
                        @php
                            $sel = $k->id == $pl->kartu_id ? 'selected' : '';
                        @endphp
                        <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@extends('layouts.app2')
@section('title', 'Chapter')
@section('content')
<h1>Kas Masjid Masuk</h1>
<div class="card bg-success my-3">
    <p class="text-white p-2">Total Kas Masjid Masuk = Rp {{ number_format($total, 0, '.', '.') }} </p>
</div>
<a href="{{route('kas-masjid.tambah-data')}}" class="btn btn-info" role="button">Tambah Data</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tgl</th>
            <th scope="col">Urain</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $jumlah = 0;
        ?>
        @foreach ($kasMasjid as $row)

        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $row->created_at }}</td>
            <td>{{$row->urain_kas_masjid}}</td>
            <td>{{ number_format($row->masuk, 0, ',', '.') }}</td>
            <td>
                <a href="{{route('kas-masjid.edit',$row->id_masjid)}}" class="btn btn-info">edit</a>
                <form action="{{route('kas-masjid.destroy',$row->id_masjid)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini ?')">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>

            </td>

        </tr>
        @endforeach
    </tbody>


    <tr>

    </tr>
</table>

@endsection
@extends('layouts.app2')
@section('title', 'Chapter')
@section('content')
<h1>Kas Sosial Keluar</h1>
<div class="card bg-danger my-3">
    <p class="text-white p-2">Total Kas Sosial Keluar = Rp {{ number_format($total, 0, '.', '.') }} </p>
</div>
<a href="{{route('kas-sosial.tambah-data.pengeluaran')}}" class="btn btn-info" role="button">Tambah Data</a>
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
        @foreach ($kasSosial as $row)

        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $row->created_at }}</td>
            <td>{{$row->uraian}}</td>
            <td>{{ number_format($row->keluar, 0, ',', '.') }}</td>
            <td>
                <a href="{{route('kas-sosial.edit.pengeluaran',$row->id)}}" class="btn btn-info">edit</a>
                <form action="{{route('kas-sosial.destroy.pengeluaran',$row->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini ?')">
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
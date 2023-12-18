@extends('layouts.app2')
@section('title', 'Chapter')
@section('content')
    <h1>Laporan Kas Masjid </h1>
    <div class="card bg-warning my-3">
        <p class="text-white p-2">Total kas Masjid = Rp {{ number_format($total, 0, '.', '.') }} </p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tgl</th>
                <th scope="col">Urain</th>
                <th scope="col">Pemasukan</th>
                <th scope="col">Pengeluaran</th>

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
                    <td>{{ $row->urain_kas_masjid }}</td>
                    <td>{{ number_format($row->masuk, 0, ',', '.') }}</td>
                    <td>{{ number_format($row->keluar, 0, ',', '.') }}</td>

                    <td>
                        <form action="{{ route('kas-masjid.destroy.laporan', $row->id_masjid) }}" method="post"
                            class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini ?')">
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

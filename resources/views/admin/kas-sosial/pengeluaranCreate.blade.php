@extends('layouts.app2')
@section('title', 'Chapter')
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Pemasukan
        </h3>
    </div>
    <form action="{{ route('kas-sosial.store.pengeluaran') }}" method="POST">
        @csrf
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Uraian</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Uraian Pengeluaran" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Pemasukan (Rp.)</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="keluar" name="keluar" placeholder="Jumlah Pengeluaran" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="?page=i_data_ks" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

@endsection
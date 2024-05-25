@extends('bukus.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Detail Buku</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>id_buku: </b>{{$Buku->id_buku}}</li>
                <li class="list-group-item"><b>judul: </b>{{$Buku->judul}}</li>
                <li class="list-group-item"><b>penerbit: </b>{{$Buku->penerbit}}</li>
                <li class="list-group-item"><b>pengarang: </b>{{$Buku->pengarang}}</li>
                <li class="list-group-item"><b>bahasa: </b>{{$Buku->bahasa->nama_bahasa}}</li>
                <li class="list-group-item"><b>jumlah: </b>{{$Buku->jumlah}}</li>
                <li class="list-group-item"><b>status: </b>{{$Buku->status}}</li>
            </ul>
        </div>
        <a class="btn btn-success mt-3" href="{{ route('bukus.index') }}">Kembali</a>
    </div>
</div>
</div>
@endsection
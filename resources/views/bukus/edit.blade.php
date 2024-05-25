@extends('bukus.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">Edit Buku</div>
        <div class="card-body">@if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="{{ route('bukus.update', $buku->id_buku) }}" id="myForm">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_buku">Id Buku</label> 
                    <input type="text" name="id_buku" class="form-control" id="id_buku" value="{{ $buku->id_buku }}" aria-describedby="id_buku" > 
                </div>
                <div class="form-group">
                    <label for="judul">Judul</label> 
                    <input type="text" name="judul" class="form-control" id="judul" value="{{ $buku->judul }}" aria-describedby="judul" > 
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label> 
                    <input type="kategori" name="kategori" class="form-control" id="kategori" value="{{ $buku->kategori }}" aria-describedby="kategori" > 
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label> 
                    <input type="penerbit" name="penerbit" class="form-control" id="penerbit" value="{{ $buku->penerbit }}" aria-describedby="penerbit" > 
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label> 
                    <input type="pengarang" name="pengarang" class="form-control" id="pengarang" value="{{ $buku->pengarang }}" aria-describedby="pengarang" > 
                </div>
                <div class="form-group">
                    <label for="bahasa_id">Bahasa</label>
                    <select name="bahasa_id" class="form-control">
                         @foreach($bahasa as $bhs)
                        <option value="{{$bhs->id}}"{{$buku->bahasa_id == $bhs->id ? 'selected' : ''}}>{{$bhs->nama_bahasa}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label> 
                    <input type="jumlah" name="jumlah" class="form-control" id="jumlah" value="{{ $buku->jumlah }}" aria-describedby="jumlah" > 
                </div>
                <div class="form-group">
                    <label for="status">Status</label> 
                    <input type="status" name="status" class="form-control" id="status" value="{{ $buku->status }}" aria-describedby="status" > 
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@extends('adminlte::page')

@section('content')
  <div class="card mt-3">
    <div class="card-header">
      <h2>Edit Berita</h2>
    </div>
    <form action="/admin/berita/{{ $berita->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul }}">
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control" value="{{ $berita->gambar }}">
        </div>
        <div class="form-group">
          <label for="konten">Konten</label>
          <textarea name="konten" id="konten">
            {{ $berita->content }}
          </textarea>
        </div>
        <button class="btn btn-block btn-primary">Simpan</button>
      </div>
    </form>
  </div>
@endsection

{{-- @section('css')
  
@endsection --}}

@section('js')
  <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'konten' );
  </script>
@endsection
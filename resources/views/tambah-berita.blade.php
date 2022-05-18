@extends('adminlte::page')

@section('content')

  <div class="card mt-3">
    <div class="card-header">
      <h2>Tambah Berita</h2>
    </div>
    <form action="/admin/berita" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror">
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <input type="file" name="gambar" id="gambar" class="form-control @error('gambar') is-invalid @enderror">
        </div>
        <div class="form-group">
          <label for="konten">Konten</label>
          <textarea name="konten" id="konten"></textarea>
          @error('konten') <span class="text-danger">Konten Harus Diisi</span> @enderror
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
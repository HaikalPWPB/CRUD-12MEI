@extends('adminlte::page')

@section('content')

  @if (Session::has('success'))
    <div class="alert alert-success mt-3">
      {{ session('success') }}
    </div>
  @endif

  <div class="card mt-3">
    <div class="card-header">
      <h2>Daftar Berita</h2>
      <a href="/admin/berita/create">Tambah Berita</a>
    </div>
    <div class="card-body">
      <table class="table table-responsive-md table-bordered table-striped">
        <tr>
          <th>ID</th>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Aksi</th>
        </tr>

        @foreach ($berita as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><img src="{{ asset('uploads/berita/' . $item->image) }}" height="100"></td>
            <td>{{ $item->judul }}</td>
            <td>
              <a href="/admin/berita/{{ $item->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <form action="/admin/berita/{{ $item->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
      <br>
      {{ $berita->links() }}
    </div>
  </div>
@endsection
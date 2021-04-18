@extends('ppdbs.layout')
@section('content')
<title>Form PPDB</title>
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br><a class="btn btn-primary" href="/dashboard">Kembali</a><br>
                <br><h2>Data Pendaftar</h2>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>NIS Siswa</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Asal Sekolah</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th width="175px">Action</th>
        </tr>
        @foreach ($ppdbs as $ppdb)
        <tr>
            <td>{{ $ppdb->nis }}</td>
            <td>{{ $ppdb->nama }}</td>
            <td>{{ $ppdb->jk }}</td>
            <td>{{ $ppdb->tmp_lahir }}</td>
            <td>{{ $ppdb->tgl_lahir }}</td>
            <td>{{ $ppdb->alamat }}</td>
            <td>{{ $ppdb->asal_sekolah }}</td>
            <td>{{ $ppdb->kelas }}</td>
            <td>{{ $ppdb->jurusan }}</td>
            <td>
                <form action="{{ route('ppdbs.destroy',$ppdb->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('ppdbs.edit',$ppdb->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $ppdbs->links() !!} 
@endsection
@extends('mahasiswa.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Mahasiswa
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('mahasiswa.update', $Mahasiswa->nim) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nim">Nim</label>
                        <input type="text" name="Nim" class="form-control" id="Nim" value="{{ $Mahasiswa->nim }}" ariadescribedby="Nim">
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" class="form-control" id="Nama" value="{{ $Mahasiswa->nama }}" aria-describedby="Nama">
                    </div>
                    <div class="form-group">
                        <label for="Kelas"> Kelas </label>
                        <select name="Kelas" id="Kelas" class="form-control">
                            <option disabled>Pilih Kelas</option>
                        @foreach($kelas as $Kelas)
                            <option value="{{ $Kelas->id }}" {{ $Mahasiswa->kelas_id == $Kelas->id ? 'selected': ''}}>{{ $Kelas->nama_kelas }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Jurusan">Jurusan</label>
                        <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" value="{{ $Mahasiswa->jurusan }}" aria-describedby="Jurusan">
                    </div>
                    <div class="form-group">
                        <label for="image">Foto</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ $Mahasiswa->image }}" 
                        required="required" aria-describedby="image" ></br>
                        <img width="50px" height="50px" src="{{asset('storage/'.$Mahasiswa->image)}}">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="Email" name="Email" class="form-control" id="Email" value="{{ $Mahasiswa->email}}" ariadescribedby="Email" >
                    </div>
                    <div class="form-group">
                        <label for="Tanggal_Lahir">Tanggal Lahir</label>
                        <input type="Tanggal_Lahir" name="Tanggal_Lahir" class="form-control" id="Tanggal_Lahir" value="{{ $Mahasiswa->tanggal_lahir }}" ariadescribedby="Tanggal_Lahir" >
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="Alamat" name="Alamat" class="form-control" id="Alamat" value="{{ $Mahasiswa->alamat }}" ariadescribedby="Alamat" >
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
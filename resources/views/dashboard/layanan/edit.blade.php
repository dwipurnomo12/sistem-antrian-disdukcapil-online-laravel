@extends('dashboard.layouts.main')

@section('container')

<div class="row">
  <div class="col-xl-8 mx-auto">
      <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Layanan</h6>
              <a class="btn btn-secondary float-end" href="/dashboard/layanan" role="button">Kembali</a>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form action="/dashboard/layanan/{{ $layanan->id }}" method="POST">
              @csrf
              @method('put')
        
              <div class="mb-3">
                <label for="nama_layanan" class="form-label">Nama Layanan</label>
                <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}">
                @error('nama_layanan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>

              
              <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $layanan->kode) }}">
                @error('kode')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
          
              <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                  @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
              </div>
              
              <button type="submit" class="btn btn-primary float-end">Simpan</button>
    
            </form>
    
          </div>
      </div>
  </div>
</div>

@endsection






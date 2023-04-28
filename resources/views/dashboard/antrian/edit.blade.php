@extends('dashboard.layouts.main')

@section('container')

<div class="row">
  <div class="col-xl-8 mx-auto">
      <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Menu Antrian</h6>
              <a class="btn btn-secondary float-end" href="/dashboard/antrian" role="button">Kembali</a>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form action="/dashboard/antrian/{{ $antrian->slug }}" method="POST">
              @csrf
              @method('PUT')
        
              <div class="mb-3">
                <label for="nama_layanan" class="form-label">Nama Antrian</label>
                <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan" name="nama_layanan" value="{{ old('nama_layanan', $antrian->nama_layanan) }}">
                @error('nama_layanan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" value="{{ old('kode', $antrian->kode) }}">
                @error('kode')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $antrian->slug) }}">
                @error('slug')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>
          
              <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $antrian->deskripsi) }}</textarea>
                  @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                  @enderror
              </div>

              <div class="mb-3">
                <label for="batas_antrian" class="form-label">Batas Antrian</label>
                <input type="number" class="form-control @error('batas_antrian') is-invalid @enderror" id="batas_antrian" name="batas_antrian" min="1" max="100" value="{{ old('batas_antrian', $antrian->batas_antrian) }}">
                @error('batas_antrian')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="persyaratan" class="form-label">Persyaratan</label>
                <textarea class="form-control  @error('persyaratan') is-invalid @enderror" id="persyaratan" name="persyaratan" rows="3">{{ old('persyaratan', $antrian->persyaratan) }}</textarea>
                @error('persyaratan')
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






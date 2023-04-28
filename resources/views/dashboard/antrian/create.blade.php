<!-- Modal Tambah Data Antrian -->
<div class="modal fade" id="tambah-menu-antrian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu Antrian Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/antrian/" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            @csrf
            <div class="mb-3">
              <label for="nama_layanan" class="form-label">Nama Antrian</label>
              <input type="text" class="form-control @error('nama_layanan') is-invalid @enderror" id="nama_layanan" name="nama_layanan">
              @error('nama_layanan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="kode" class="form-label">Kode</label>
              <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode">
              @error('kode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
              @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="batas_antrian" class="form-label">Batas Antrian</label>
              <input type="number" class="form-control @error('batas_antrian') is-invalid @enderror" id="batas_antrian" name="batas_antrian" min="1" max="100">
              @error('batas_antrian')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3"></textarea>
                @error('deskripsi')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="persyaratan" class="form-label">persyaratan</label>
                <textarea class="form-control  @error('persyaratan') is-invalid @enderror" id="persyaratan" name="persyaratan" rows="3"></textarea>
                @error('persyaratan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                @enderror
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Otomatis Membuatkan Slug yang mengambil dari field nama_layanan -->
  <script>
    const nama_layanan = document.querySelector('#nama_layanan');
    const slug  = document.querySelector('#slug');

    nama_layanan.addEventListener('change', function(){
        fetch('/dashboard/antrian/checkSlug?nama_layanan=' + nama_layanan.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
  </script>

  <!-- Validasi Form Input -->
  <script>
    $(document).ready(function(){
      $('#tambah-menu-antrian form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var nama_layanan  = form.find('#nama_layanan').val();
        var kode          = form.find('#kode').val();
        var deskripsi     = form.find('#deskripsi').val();
        var slug          = form.find('#slug').val();
        var batas_antrian = form.find('#batas_antrian').val();
        var persyaratan   = form.find('#persyaratan').val();
        var error         = false;

        if(!nama_layanan){
          form.find('#nama_layanan').addClass('is-invalid');
          error = true;
        } else {
          form.find('#nama_layanan').removeClass('is-invalid');
        }

        if(!kode){
          form.find('#kode').addClass('is-invalid');
          error = true;
        } else {
          form.find('#kode').removeClass('is-invalid');
        }

        if(!deskripsi){
          form.find('#deskripsi').addClass('is-invalid');
          error = true;
        } else {
          form.find('#deskripsi').removeClass('is-invalid');
        }

        if(!slug){
          form.find('#slug').addClass('is-invalid');
          error = true;
        } else {
          form.find('#slug').removeClass('is-invalid');
        }

        if(!batas_antrian){
          form.find('#batas_antrian').addClass('is-invalid');
          error = true;
        } else {
          form.find('#batas_antrian').removeClass('is-invalid');
        }

        if(!persyaratan){
          form.find('#persyaratan').addClass('is-invalid');
          error = true;
        } else {
          form.find('#persyaratan').removeClass('is-invalid');
        }

        if(!error){
          form.unbind('submit').submit();
        }

      })
    })
  </script>



<!-- Modal -->
<div class="modal fade" id="tambah-layanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Layanan Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/dashboard/layanan/" method="POST">
          <div class="modal-body">
            @csrf

            <div class="mb-3">
              <label for="nama_layanan" class="form-label">Nama Layanan</label>
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
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3"></textarea>
                @error('deskripsi')
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

  <script>
    $(document).ready(function(){
      $('#tambah-layanan form').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var nama_layanan = form.find('#nama_layanan').val();
        var deskripsi = form.find('#deskripsi').val();
        var error = false;

        if(!nama_layanan){
          form.find('#nama_layanan').addClass('is-invalid');
          error = true;
        } else {
          form.find('#nama_layanan').removeClass('is-invalid');
        }

        if(!deskripsi){
          form.find('#deskripsi').addClass('is-invalid');
          error = true;
        } else {
          form.find('#deskripsi').removeClass('is-invalid');
        }

        if(!error){
          form.unbind('submit').submit();
        }

      })
    })
  </script>
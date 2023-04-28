
<!-- Modal Pengambilan Nomor Antrian -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('store.antrian') }}" method="POST" enctype="multipart/form-data">
            @csrf
  
            <input type="hidden" name="antrian_id" id="antrian_id" value="{{ $antrian->id }}">
  
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal Kedatangan</label>
              <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Tanggal Antrian">
              @error('tanggal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap">
              @error('nama_lengkap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
              @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="mb-3">
              <label for="nomorhp" class="form-label">Nomor HP</label>
              <input type="text" class="form-control @error('nomorhp') is-invalid @enderror" id="nomorhp" name="nomorhp" placeholder="Masukkan nomor hp aktif">
              @error('nomorhp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="modal-footer">
              <button id="btnSimpan" type="submit" class="btn btn-primary float-end">Simpan</button>
            </div>
  
          </form>
        </div>
  
      </div>
    </div>
  </div>
  
  <!-- Script untuk validasi jika form input belum terisi -->
  <script>
    $(document).ready(function() {
        $('#exampleModal form').submit(function(event) {
            event.preventDefault();
            var form = $(this);
            var nama_lengkap = form.find('#nama_lengkap').val();
            var alamat = form.find('#alamat').val();
            var nomorhp = form.find('#nomorhp').val();
            var error = false;

            if (!nama_lengkap) {
                form.find('#nama_lengkap').addClass('is-invalid');
                error = true;
            } else {
                form.find('#nama_lengkap').removeClass('is-invalid');
            }

            if (!alamat) {
                form.find('#alamat').addClass('is-invalid');
                error = true;
            } else {
                form.find('#alamat').removeClass('is-invalid');
            }

            if (!nomorhp) {
                form.find('#nomorhp').addClass('is-invalid');
                error = true;
            } else {
                form.find('#nomorhp').removeClass('is-invalid');
            }

            if (!error) {
                form.unbind('submit').submit();
            }
        });
    });
</script>







  
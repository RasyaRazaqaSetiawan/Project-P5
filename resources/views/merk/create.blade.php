<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
</script>
<!-- Modal Add Data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Merk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('merk.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaMerk">Nama Merk</label>
                        <input type="text" class="form-control @error('nama_merk') is-invalid @enderror" id="namaMerk" name="nama_merk" required>
                        @error('nama_merk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    @if ($errors->any())
        $(document).ready(function() {
            $('#addModal').modal('show');
        });
    @endif
</script>

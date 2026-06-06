{{--
    Partial ini dipakai oleh create.blade.php maupun edit.blade.php.
    Jika ada $event (mode edit), field akan terisi dari data DB.
    Jika tidak ada (mode create), field kosong / default.
--}}

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Nama Event</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
               value="{{ old('nama', $event->nama ?? '') }}" required>
        @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
            @foreach (['Pagelaran', 'Workshop', 'Lomba', 'Festival'] as $kat)
                <option value="{{ $kat }}" {{ old('kategori', $event->kategori ?? '') === $kat ? 'selected' : '' }}>
                    {{ $kat }}
                </option>
            @endforeach
        </select>
        @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
               value="{{ old('tanggal', isset($event) ? $event->tanggal->format('Y-m-d') : '') }}" required>
        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach (['Mendatang', 'Selesai'] as $st)
                <option value="{{ $st }}" {{ old('status', $event->status ?? 'Mendatang') === $st ? 'selected' : '' }}>
                    {{ $st }}
                </option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Harga Tiket</label>
        <div class="input-group">
            <span class="input-group-text bg-light text-muted">Rp</span>
            <input type="text" name="harga" id="harga_input" class="form-control @error('harga') is-invalid @enderror"
                   value="{{ old('harga', isset($event) && !$event->isFree() ? preg_replace('/[^0-9]/', '', $event->harga) : '') }}"
                   placeholder="Contoh: 25.000 atau Gratis">
            <span class="input-group-text bg-light text-muted">,00</span>
        </div>
        <small class="text-muted mt-1 d-block">Ketik angka saja (akan otomatis terformat), atau ketik <strong>0</strong> / <strong>Gratis</strong> untuk event gratis.</small>
        @error('harga') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Lokasi</label>
    <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror"
           value="{{ old('lokasi', $event->lokasi ?? '') }}" required>
    @error('lokasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Upload Gambar Event</label>
        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
        <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror

        {{-- Tampilkan gambar yang sudah tersimpan saat mode edit --}}
        @if (isset($event) && $event->gambar)
            <div class="mt-2">
                <small class="text-muted">Gambar saat ini:</small><br>
                <img src="{{ asset('storage/' . $event->gambar) }}" alt="Gambar saat ini"
                     class="img-thumbnail mt-1" style="max-height: 100px;">
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">URL Gambar <small class="text-muted">(alternatif jika tidak upload)</small></label>
        <input type="url" name="gambar_url" class="form-control @error('gambar_url') is-invalid @enderror"
               value="{{ old('gambar_url', $event->gambar_url ?? '') }}"
               placeholder="https://...">
        @error('gambar_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

{{-- Preview gambar saat mode edit --}}
@if (isset($event) && ($event->gambar || $event->gambar_url))
    <div class="mb-4">
        <label class="form-label">Preview Gambar</label>
        <div class="rounded overflow-hidden border" style="max-width: 360px;">
            <img src="{{ $event->gambar_final }}" alt="Preview event" class="img-fluid">
        </div>
    </div>
@endif

<div class="mb-4">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
              placeholder="Deskripsi singkat tentang event (opsional)">{{ old('deskripsi', $event->deskripsi ?? '') }}</textarea>
    @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary">
    <i class="bi bi-save me-1"></i> {{ $button }}
</button>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const hargaInput = document.getElementById('harga_input');
    if (hargaInput) {
        // Fungsi untuk format ribuan dengan titik
        function formatRibuan(val) {
            let clean = val.replace(/[^0-9]/g, '');
            if (!clean) return '';
            return parseInt(clean, 10).toLocaleString('id-ID');
        }

        hargaInput.addEventListener('input', function() {
            let cursorPosition = this.selectionStart;
            let originalLength = this.value.length;
            
            let value = this.value;
            // Jika user mengetik 'gratis' atau '0', biarkan apa adanya
            if (value.toLowerCase() === 'gratis' || value === '0') {
                return;
            }

            let formatted = formatRibuan(value);
            this.value = formatted;
            
            let newLength = this.value.length;
            let diff = newLength - originalLength;
            this.setSelectionRange(cursorPosition + diff, cursorPosition + diff);
        });

        // Format saat halaman pertama kali dibuka (mode edit)
        if (hargaInput.value && hargaInput.value.toLowerCase() !== 'gratis') {
            hargaInput.value = formatRibuan(hargaInput.value);
        }
    }
});
</script>
@endpush

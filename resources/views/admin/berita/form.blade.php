{{--
    Partial ini dipakai oleh create.blade.php maupun edit.blade.php.
    Jika ada $berita (mode edit), field akan terisi dari data DB.
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
        <label class="form-label">Judul Berita</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
               value="{{ old('judul', $berita->judul ?? '') }}" required>
        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select @error('kategori') is-invalid @enderror">
            @foreach (['Kegiatan', 'Prestasi', 'Pengumuman'] as $kat)
                <option value="{{ $kat }}" {{ old('kategori', $berita->kategori ?? '') === $kat ? 'selected' : '' }}>
                    {{ $kat }}
                </option>
            @endforeach
        </select>
        @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal Publikasi</label>
        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
               value="{{ old('tanggal', isset($berita) ? $berita->tanggal->format('Y-m-d') : '') }}" required>
        @error('tanggal') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control"
               value="{{ old('penulis', $berita->penulis ?? 'Admin DSB') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            @foreach (['Published', 'Draft'] as $st)
                <option value="{{ $st }}" {{ old('status', $berita->status ?? 'Draft') === $st ? 'selected' : '' }}>
                    {{ $st }}
                </option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Ringkasan</label>
    <input type="text" name="ringkasan" class="form-control"
           value="{{ old('ringkasan', $berita->ringkasan ?? '') }}"
           placeholder="Deskripsi singkat berita (opsional)">
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Upload Gambar Berita</label>
        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
        <small class="text-muted">Format: JPG, PNG, WEBP. Maks 2MB.</small>
        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror

        {{-- Tampilkan gambar yang sudah tersimpan saat mode edit --}}
        @if (isset($berita) && $berita->gambar)
            <div class="mt-2">
                <small class="text-muted">Gambar saat ini:</small><br>
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar saat ini"
                     class="img-thumbnail mt-1" style="max-height: 100px;">
            </div>
        @endif
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">URL Gambar <small class="text-muted">(alternatif jika tidak upload)</small></label>
        <input type="url" name="gambar_url" class="form-control @error('gambar_url') is-invalid @enderror"
               value="{{ old('gambar_url', $berita->gambar_url ?? '') }}"
               placeholder="https://...">
        @error('gambar_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

{{-- Preview gambar dinamis --}}
@if (isset($berita) && ($berita->gambar || $berita->gambar_url))
    <div class="mb-4">
        <label class="form-label">Preview Gambar</label>
        <div class="rounded overflow-hidden border" style="max-width: 360px;">
            <img src="{{ $berita->gambar_final }}" alt="Preview berita" class="img-fluid">
        </div>
    </div>
@endif

<div class="mb-4">
    <label class="form-label">Isi Berita</label>
    <textarea name="konten" rows="7" class="form-control @error('konten') is-invalid @enderror"
              placeholder="Tulis isi berita di sini..." required>{{ old('konten', $berita->konten ?? '') }}</textarea>
    @error('konten') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-primary">
    <i class="bi bi-save me-1"></i> {{ $button }}
</button>

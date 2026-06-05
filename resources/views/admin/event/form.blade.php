<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Nama Event</label>
        <input type="text" name="nama" class="form-control" value="{{ $event['nama'] ?? 'Workshop Fotografi & Sinematografi' }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select">
            <option>Pagelaran</option>
            <option>Workshop</option>
            <option>Lomba</option>
            <option>Festival</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="2026-06-20" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option>Mendatang</option>
            <option>Selesai</option>
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Harga Tiket</label>
        <input type="text" name="harga" class="form-control" value="Rp 25.000">
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Lokasi</label>
    <input type="text" name="lokasi" class="form-control" value="{{ $event['lokasi'] ?? 'Aula UPI Cibiru, Bandung' }}" required>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Upload Gambar Event</label>
        <input type="file" name="gambar" class="form-control" accept="image/*">
        <small class="text-muted">Pilih gambar dari perangkat untuk banner/kartu event.</small>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">URL Gambar</label>
        <input type="url" name="gambar_url" class="form-control" value="{{ $event['gambar_url'] ?? 'https://images.unsplash.com/photo-1560421683-6856ea585c78?w=900&h=600&fit=crop' }}">
    </div>
</div>
<div class="mb-4">
    <label class="form-label">Preview Gambar</label>
    <div class="rounded overflow-hidden border" style="max-width: 360px;">
        <img src="{{ $event['gambar_url'] ?? 'https://images.unsplash.com/photo-1560421683-6856ea585c78?w=900&h=600&fit=crop' }}" alt="Preview event" class="img-fluid">
    </div>
</div>
<div class="mb-4">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="5" class="form-control">Pagelaran seni tahunan terbesar DSB yang menampilkan teater, musik, tari, dan karya visual mahasiswa.</textarea>
</div>
<button type="submit" class="btn btn-primary">
    <i class="bi bi-save me-1"></i> {{ $button }}
</button>

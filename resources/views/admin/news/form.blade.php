<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Judul Berita</label>
        <input type="text" name="judul" class="form-control" value="{{ $news['judul'] ?? 'Pendaftaran Member Baru Dapur Seni Biru 2026' }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select">
            <option>Kegiatan</option>
            <option>Prestasi</option>
            <option>Pengumuman</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Tanggal Publikasi</label>
        <input type="date" name="tanggal" class="form-control" value="2026-05-05" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="Admin DSB">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option>Published</option>
            <option>Draft</option>
        </select>
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Ringkasan</label>
    <input type="text" name="ringkasan" class="form-control" value="Informasi terbaru seputar kegiatan Dapur Seni Biru.">
</div>
<div class="mb-4">
    <label class="form-label">Isi Berita</label>
    <textarea name="konten" rows="7" class="form-control">Dapur Seni Biru membuka kesempatan bagi mahasiswa untuk bergabung, mengembangkan minat seni, dan terlibat dalam program kreatif sepanjang tahun.</textarea>
</div>
<button type="submit" class="btn btn-primary">
    <i class="bi bi-save me-1"></i> {{ $button }}
</button>

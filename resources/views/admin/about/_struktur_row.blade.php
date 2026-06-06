<tr class="struktur-row" data-index="{{ $index }}">
    <td>
        <img src="{{ \App\Models\AboutPage::strukturImageUrl($person['img'] ?? '') }}"
             alt="{{ $person['name'] ?? '' }}"
             class="struktur-foto-preview rounded border"
             width="56" height="56"
             style="object-fit: cover;">
        <input type="hidden" name="struktur[{{ $index }}][img]" value="{{ $person['img'] ?? '' }}">
    </td>
    <td>
        <input type="text" name="struktur[{{ $index }}][name]"
               class="form-control form-control-sm @error('struktur.' . $index . '.name') is-invalid @enderror"
               value="{{ $person['name'] ?? '' }}" placeholder="Nama lengkap" required>
        @error('struktur.' . $index . '.name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </td>
    <td>
        <input type="text" name="struktur[{{ $index }}][role]"
               class="form-control form-control-sm @error('struktur.' . $index . '.role') is-invalid @enderror"
               value="{{ $person['role'] ?? '' }}" placeholder="Jabatan" required>
        @error('struktur.' . $index . '.role')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="file" name="struktur[{{ $index }}][foto]"
               class="form-control form-control-sm mt-2 struktur-foto-input"
               accept="image/*">
        <small class="text-muted">Upload foto baru (opsional)</small>
    </td>
    <td class="text-end">
        <button type="button" class="btn btn-sm btn-danger btn-hapus-pengurus" title="Hapus">
            <i class="bi bi-trash"></i>
        </button>
    </td>
</tr>

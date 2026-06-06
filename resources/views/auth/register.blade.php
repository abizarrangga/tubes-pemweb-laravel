<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dapur Seni Biru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-[#0A1931] flex items-center justify-center min-h-screen font-sans">

    <div class="bg-[#15305B] p-8 rounded-2xl shadow-2xl w-full max-w-md border border-gray-700">
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-[#0B2545] font-bold text-xs">DSB</div>
            </a>
            <h2 class="text-3xl font-bold text-white tracking-wide">PORTAL <span class="text-[#F8bde2]">DAPUS</span></h2>
            <p class="text-[#d7c9e1] text-sm mt-2">Daftar akun baru untuk menjelajahi event seni</p>
        </div>

        {{-- Tampilkan semua error sekaligus --}}
        @if ($errors->any())
            <div class="bg-red-900/50 border border-red-500 text-red-200 rounded-lg px-4 py-3 mb-5 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-gray-300 text-sm mb-2">Nama Lengkap</label>
                <input type="text" name="nama"
                       value="{{ old('nama') }}"
                       placeholder="Masukkan nama lengkap" required
                       class="w-full px-4 py-3 bg-[#0A1931] text-white rounded-lg border
                              {{ $errors->has('nama') ? 'border-red-500' : 'border-gray-600' }}
                              focus:outline-none focus:border-[#FF4181] transition duration-300">
                @error('nama')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Email</label>
                <input type="email" name="email"
                       value="{{ old('email') }}"
                       placeholder="contoh@mail.com" required
                       class="w-full px-4 py-3 bg-[#0A1931] text-white rounded-lg border
                              {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }}
                              focus:outline-none focus:border-[#FF4181] transition duration-300">
                @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Password</label>
                <input type="password" name="password" placeholder="********" required
                       class="w-full px-4 py-3 bg-[#0A1931] text-white rounded-lg border
                              {{ $errors->has('password') ? 'border-red-500' : 'border-gray-600' }}
                              focus:outline-none focus:border-[#FF4181] transition duration-300">
                @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-gray-300 text-sm mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="********" required
                       class="w-full px-4 py-3 bg-[#0A1931] text-white rounded-lg border
                              {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-600' }}
                              focus:outline-none focus:border-[#FF4181] transition duration-300">
                @error('password_confirmation')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                    class="w-full py-3 bg-[#F8bde2] hover:bg-[#e0306d] text-[#0b2c58] font-semibold rounded-lg shadow-lg hover:shadow-[#FF4181]/50 transition duration-300">
                DAFTAR SEKARANG
            </button>
        </form>

        <div class="text-center mt-6 space-y-3">
            <p class="text-gray-400 text-sm">
                Sudah punya akun?
                <a href="{{ url('/login') }}" class="text-[#F8bde2] hover:underline">Login di sini</a>
            </p>
            <p>
                <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-300 text-xs"><- Kembali ke Beranda</a>
            </p>
        </div>
    </div>

</body>
</html>

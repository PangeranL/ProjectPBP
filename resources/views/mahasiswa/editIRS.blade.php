<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit IRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100">
    <div class="mt-24 px-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-bold mb-4">Edit IRS</h3>
            <form action="{{ route('updateIRS', ['nim' => $irs->nim, 'smt' => $irs->smt, 'kodeMK' => $irs->kodeMK]) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="kodeMK" class="block text-gray-700 font-semibold">Mata Kuliah</label>
                    <select name="kodeMK" id="kodeMK" class="border p-2 rounded w-full" required>
                        @foreach ($jadwals as $kodeMK => $jadwalsByKodeMK)
                            <option value="{{ $kodeMK }}" {{ $irs->kodeMK == $kodeMK ? 'selected' : '' }}>
                                {{ $jadwalsByKodeMK->first()->matakuliah->namaMK }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-semibold">Kelas</label>
                    <select name="kelas" id="kelas" class="border p-2 rounded w-full" required>
                        @foreach ($jadwals[$irs->kodeMK] as $jadwal)
                            <option value="{{ $jadwal->kelas }}" {{ $irs->kelas == $jadwal->kelas ? 'selected' : '' }}>
                                {{ $jadwal->kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="ruang" class="block text-gray-700 font-semibold">Ruang</label>
                    <select name="ruang" id="ruang" class="border p-2 rounded w-full" required>
                        @foreach ($jadwals[$irs->kodeMK] as $jadwal)
                            <option value="{{ $jadwal->ruang }}" {{ $irs->ruang == $jadwal->ruang ? 'selected' : '' }}>
                                {{ $jadwal->ruang }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-green-700 text-white py-2 px-4 rounded w-full">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
</body>
</html>
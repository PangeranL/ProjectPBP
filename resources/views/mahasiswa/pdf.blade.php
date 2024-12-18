<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="mt-24 px-8">
        <h2 class="text-lg font-bold mb-4">Daftar IRS untuk NIM: {{ $nim }}, Semester: {{ $smt }}</h2>
        <div class="bg-white p-6 rounded-lg shadow-md pb-20">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Kode Mata Kuliah</th>
                        <th class="border px-4 py-2">Nama Mata Kuliah</th>
                        <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">Ruang</th>
                        <th class="border px-4 py-2">Hari</th>
                        <th class="border px-4 py-2">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($isi as $irs)
                        <tr>
                            <td class="border px-4 py-2">{{ $irs->kodeMK }}</td>
                            <td class="border px-4 py-2">{{ $irs->jadwal->matakuliah->namaMK }}</td>
                            <td class="border px-4 py-2">{{ $irs->kelas }}</td>
                            <td class="border px-4 py-2">{{ $irs->ruang }}</td>
                            <td class="border px-4 py-2">{{ $irs->jadwal->hari }}</td>
                            <td class="border px-4 py-2">{{ $irs->jadwal->mulai }}-{{ $irs->jadwal->selesai }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border px-4 py-2 text-center" colspan="5">Tidak ada data IRS.</td>
                        </tr>
                    @endforelse
                        <tr>
                            <td class="border px-4 py-2 font-bold">Total SKS : {{ $totalSKS }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
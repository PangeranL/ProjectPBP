<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Ruang Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-[#D6EFD8] flex flex-col min-h-screen">

    <!-- Header -->
    <div class="bg-[#508D4E] text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">UNIVERSITAS DIPONEGORO</h1>
        <div class="flex items-center">
            <span class="mr-4 font-semibold">Smith Welson</span>
            <img class="w-12 h-12 rounded-full" src="{{ asset('images/SW2.png') }}" alt="User Avatar">
        </div>
    </div>

    <!-- Title Section -->
    <div class="flex items-center justify-between px-6 mt-10">
        <a href="/dashboard/bagianakademik" class="text-lg font-semibold ml-5 text-gray-700">&lt; Kembali</a>
        <h1 class="text-3xl font-bold text-center flex-grow mr-16">LIST RUANG KULIAH</h1>
        <button onclick="toggleAddModal()" class="text-lg font-semibold ml-5 text-gray-700">Tambahkan &gt;</button>
    </div>

    <!-- Alert for Error or Success -->
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        </script>
    @elseif (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    <!-- Table Wrapper -->
    <div class="bg-[#D9D9D9] rounded-lg shadow-md p-2 mb-2 w-3/4 mt-10 mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center text-black font-semibold text-sm">
            <div class="w-1/6 text-center">No</div>
            <div class="w-1/3 text-center">Kode Ruang</div>
            <div class="w-1/3 text-center">Aksi</div>
        </div>
    </div>

    <!-- Baris Data -->
    <div id="ruangTable" class="w-3/4 mx-auto">
        @foreach ($ruangs as $index => $ruang)
        <div class="bg-white rounded-lg shadow-md p-2 flex justify-between items-center mb-2">
            <div class="w-1/6 text-center text-sm">{{ $index + 1 }}</div>
            <div class="w-1/3 text-center text-sm">{{ $ruang->nama }}</div>
            <div class="w-1/3 text-center">
                <form action="{{ route('ruang.destroy', $ruang->nama) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white font-semibold py-1 px-3 rounded-full hover:bg-red-600 text-sm">
                        Hapus
                    </button>
                </form>
                <button onclick="editRuang('{{ $ruang->nama }}')" class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded-full hover:bg-yellow-600 text-sm ml-2">
                    Edit
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal Tambah Ruang -->
    <div id="addModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Tambah Ruang Baru</h2>
            <form id="addForm" action="{{ route('ruangs.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="namaRuang" class="block text-sm font-medium text-gray-700">Kode Ruang</label>
                    <input type="text" id="namaRuang" name="namaRuang" required
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="toggleAddModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                        Tambahkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Ruang -->
    <div id="editModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Edit Nama Ruang</h2>
            <form id="editForm" action="{{ route('ruangs.update', 'ruang_nama') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editNamaRuang" class="block text-sm font-medium text-gray-700">Kode Ruang</label>
                    <input type="text" id="editNamaRuang" name="namaRuang" required
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div class="flex justify-end gap-4">
                    <button type="button" onclick="toggleEditModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#508D4E] text-white text-center py-3 mt-auto">
        <p>TIM IT SIKAT © 2024 UNDIP, All rights reserved.</p>
    </footer>

    <!-- Script -->
    <script>
        function toggleAddModal() {
            const modal = document.getElementById('addModal');
            modal.classList.toggle('hidden');
            document.getElementById('addForm').reset();  // Reset form fields for add modal
        }

        function toggleEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.toggle('hidden');
            document.getElementById('editForm').reset();  // Reset form fields for edit modal
        }

        function editRuang(name) {
            // Open Edit Modal and set the route and value
            document.getElementById('editForm').action = '/ruang/' + name;
            document.getElementById('editNamaRuang').value = name; // Set the current name to input field
            toggleEditModal(); // Show Edit modal
        }
    </script>
</body>
</html>

@extends('layout.homelayout')

@section('content')
    <section class="p-6">

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md p-6">
            <!-- Data Finansial -->
            <div class="mb-8">
                <h2 class="text-xl font-bold mb-4">Data Finansial</h2>
                <div class="flex justify-between items-center mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Wishlist</button>
                    <a href="{{ route('finansial.tambah') }}" class="bg-indigo-500 text-white px-4 py-2 rounded">Tambah
                        Finansial</a>
                </div>
                <table class="w-full border-collapse" id="finansialTable">
                    <thead>
                        <tr>
                            <th class="border p-3">ID</th>
                            <th class="border p-3">Tanggal</th>
                            <th class="border p-3">Jumlah</th>
                            <th class="border p-3">Sumber</th>
                            <th class="border p-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="finansialTableBody">
                        @foreach ($finansials->take(5) as $finansial)
                            <tr>
                                <td class="border p-3">{{ $finansial->id_finansial }}</td>
                                <td class="border p-3">{{ $finansial->tanggal_pemasukan }}</td>
                                <td class="border p-3">{{ number_format($finansial->penghasilan, 0, ',', '.') }}</td>
                                <td class="border p-3">{{ $finansial->sumber }}</td>
                                <td class="border p-3 flex space-x-2 justify-between">
                                    <!-- Hidden element to store JSON data -->
                                    <div id="finansial-data-{{ $finansial->id_finansial }}" class="hidden">
                                        {!! htmlspecialchars(json_encode($finansial), ENT_QUOTES, 'UTF-8') !!}
                                    </div>

                                    <!-- Button to open modal -->
                                    <button class="bg-blue-500 text-white px-3 py-1 rounded detailButton"
                                        data-id="{{ $finansial->id_finansial }}">
                                        Detail
                                    </button>
                                    <a href="{{ route('finansial.edit', $finansial->id_finansial) }}"
                                        class="bg-orange-500 text-white px-3 py-1 rounded">Edit</a>
                                    <form action="{{ route('finansial.destroy', $finansial->id_finansial) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Load More Button -->
                @if ($finansials->count() > 5)
                    <div class="mt-4 text-center">
                        <button id="loadMoreButton" class="bg-indigo-500 text-white px-4 py-2 rounded">Load More</button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Target Tabungan -->
        <div class="container mx-auto max-w-4xl bg-white rounded-lg shadow-md p-6 mt-5">
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <h3 class="text-lg font-bold mb-4">Target Tabungan</h3>


                    <form action="{{ route('finansial.target.save') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="target_tabungan">
                                Nominal Target
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="nominal_target" type="text" placeholder="Rp."
                                value="{{ $target ? $target->target_tabungan : '0' }}">
                        </div>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="target_tabungan">
                                Tanggal Target
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="tanggal_target" type="date" value="{{ $target ? $target->tanggal_target : '' }}">
                        </div>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="finansial_saat_ini">
                                Finansial Saat ini
                            </label>
                            <input
                                class="rp appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="finansial_saat_ini" type="text" placeholder="Rp."
                                value="{{ $recommendation->financeSekarang }}" readonly>
                        </div>
                        <div class="mb-4">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="total_pengeluaran">
                                Total Pengeluaran
                            </label>
                            <input
                                class="rp appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="total_pengeluaran" type="text" placeholder="Rp."
                                value="{{ $recommendation->totalPengeluaran }}" readonly>
                        </div>
                        <div class="flex items-center mb-4 space-x-4">
                            <button id="reset" type="button" class="bg-red-500 text-white px-4 py-2 rounded"
                                onclick="confirmReset()">Reset</button>
                            <button id="save" type="submit"
                                class="bg-indigo-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-lg font-bold mb-4">Rekomendasi</h3>
                    <div class="mb-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="target_tabungan_rek">
                            Rasio
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="target_tabungan_rek" type="text" placeholder="0%" readonly
                            value="{{ $recommendation->rasio }}">
                    </div>
                    <div class="mb-4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="saran">
                            Saran
                        </label>
                        <textarea
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="saran" rows="4" placeholder="..." readonly>{{ $recommendation->recommendation }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="detailModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="fixed inset-0 bg-black opacity-50"></div>
                <div class="relative bg-white w-11/12 md:w-1/2 rounded-lg shadow-lg p-6 z-10">
                    <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-bold mb-4">Detail Finansial</h2>
                    <div>
                        <p><strong>ID Finansial:</strong> <span id="modalIdFinansial"></span></p>
                        <p><strong>Tanggal Pemasukan:</strong> <span id="modalTanggalPemasukan"></span></p>
                        <p><strong>Jumlah:</strong> Rp. <span id="modalPenghasilan"></span></p>
                        <p><strong>Sumber:</strong> <span id="modalSumber"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function confirmReset() {
            if (confirm('Apakah Anda yakin ingin mereset target tabungan?')) {
                window.location.href = "{{ route('finansial.target.reset') }}";
            }
        }

        // Function to attach event listeners to detail buttons
        function attachDetailButtonListeners() {
            document.querySelectorAll('.detailButton').forEach(button => {
                button.addEventListener('click', function() {
                    const idFinansial = this.getAttribute('data-id');
                    const finansialDataElement = document.getElementById(`finansial-data-${idFinansial}`);
                    const finansialData = JSON.parse(finansialDataElement.textContent);

                    document.getElementById('modalIdFinansial').textContent = finansialData.id_finansial;
                    document.getElementById('modalTanggalPemasukan').textContent = finansialData
                        .tanggal_pemasukan;
                    document.getElementById('modalPenghasilan').textContent = new Intl.NumberFormat('id-ID')
                        .format(finansialData.penghasilan);
                    document.getElementById('modalSumber').textContent = finansialData.sumber;

                    document.getElementById('detailModal').classList.remove('hidden');
                });
            });
        }

        // Attach initial event listeners
        attachDetailButtonListeners();

        // Function to close modal
        function closeModal() {
            document.getElementById('detailModal').classList.add('hidden');
        }

        // Pagination logic
        let currentPage = 1;
        const allFinansials = {!! json_encode($finansials) !!};
        const pageSize = 5;

        document.getElementById('loadMoreButton')?.addEventListener('click', function() {
            const tableBody = document.getElementById('finansialTableBody');
            const start = currentPage * pageSize;
            const end = start + pageSize;

            for (let i = start; i < Math.min(end, allFinansials.length); i++) {
                const finansial = allFinansials[i];
                const row = `
                <tr>
                    <td class="border p-3">${finansial.id_finansial}</td>
                    <td class="border p-3">${finansial.tanggal_pemasukan}</td>
                    <td class="border p-3">${new Intl.NumberFormat('id-ID').format(finansial.penghasilan)}</td>
                    <td class="border p-3">${finansial.sumber}</td>
                    <td class="border p-3 flex space-x-2 justify-between">
                        <div id="finansial-data-${finansial.id_finansial}" class="hidden">
                            ${JSON.stringify(finansial)}
                        </div>
                        <button 
                            class="bg-blue-500 text-white px-3 py-1 rounded detailButton" 
                            data-id="${finansial.id_finansial}">
                            Detail
                        </button>
                        <a href="/finansial/edit/${finansial.id_finansial}" class="bg-orange-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="/finansial/${finansial.id_finansial}" method="POST" style="display:inline;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            `;
                tableBody.insertAdjacentHTML('beforeend', row);
            }

            // Reattach event listeners for new buttons
            attachDetailButtonListeners();

            currentPage++;
            if (end >= allFinansials.length) {
                this.style.display = 'none';
            }
        });
    </script>
@endsection

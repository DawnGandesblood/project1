    @extends('siswa/layout/index')
    @section('title', 'Halaman Tambah')
    @section('content')
        <form action="/siswa" method="post">
            @csrf
            @if (session()->has('error'))
                <p>{{ session('error') }}</p>
            @endif
            <div class="flex items-center justify-center">
                <div class="block px-10 space-y-5 py-10">
                    <div class="rounded-md px-8 py-5 mb-4 ml-auto mr-auto">
                        <div class="w-full max-w-md mr-auto ml-auto mt-4 mb-1 text-center">
                            <h1 class="text-gray-700 block text-3xl font-extrabold font-title uppercase">TAMBAH DATA</h1>
                            {{-- @include('component/alert') --}}
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-3 mt-3">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="nis">
                                    Nis
                                </label>
                                <input name="nis"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="nis" type="text" placeholder="Nis" value="{{ Session::get('nis') }}"
                                    required>
                            </div>
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="nama">
                                    Nama
                                </label>
                                <input name="nama"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="nama" type="text" placeholder="Nama" value="{{ Session::get('nama') }}"
                                    required>
                            </div>
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="kelas">Kelas</label>
                                <div
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-1.5 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <select data-te-select-init name="kelas" id="kelas">
                                        <option value="" hidden></option>
                                        <option value="{{ Session::get('kelas') }}" hidden
                                            @if (Session::get('kelas')) {{ 'selected' }} @endif>
                                            {{ Session::get('kelas') }}</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                    <label data-te-select-label-ref>Kelas</label>
                                </div>
                            </div>
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="jurusan">Jurusan</label>
                                <div
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-1.5 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <select data-te-select-init name="jurusan" id="jurusan">
                                        <option value="" hidden></option>
                                        <option value="{{ Session::get('jurusan') }}" hidden
                                            @if (Session::get('jurusan')) {{ 'selected' }} @endif>
                                            {{ Session::get('jurusan') }}</option>
                                        <option value="TJKT">TJKT</option>
                                        <option value="RPL">RPL</option>
                                        <option value="DKV">DKV</option>
                                        <option value="ANIM">ANIM</option>
                                    </select>
                                    <label data-te-select-label-ref>Jurusan</label>
                                </div>
                            </div>
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="angkatan">
                                    Angkatan
                                </label>
                                <input name="angkatan"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="angkatan" type="number" placeholder="angkatan" value="{{ Session::get('angkatan') }}"
                                    required>
                            </div>
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="jp">Jenis Kelamin</label>
                                <div
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-1.5 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <select data-te-select-init name="jp" id="jp">
                                        <option value="" hidden></option>
                                        <option value="{{ Session::get('jp') }}" hidden
                                            @if (Session::get('jp')) {{ 'selected' }} @endif>
                                            {{ Session::get('jp') }}</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">perempuan</option>
                                    </select>
                                    <label data-te-select-label-ref>Jenis Kelamin</label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button type="submit"
                                class="mb-2 block w-full rounded bg-primary px-6 pb-2 pt-2.5 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                name="submit">
                                TAMBAH
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection

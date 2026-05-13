@extends('layouts.admin')

@section('page_title', 'Partners')
@section('page_subtitle', 'Kelola data partner event')

@section('content')

<div class="space-y-8">

    {{-- FORM TAMBAH PARTNER --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 p-8">

        {{-- HEADER --}}
        <div class="mb-8">

            <h2 class="text-3xl font-black text-slate-900">
                Tambah Partner Baru
            </h2>

            <p class="text-slate-500 font-medium mt-1">
                Tambahkan perusahaan atau organisasi partner pendukung event.
            </p>

        </div>

        {{-- FORM --}}
        <form action="/admin/partners" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- NAMA PARTNER --}}
                <div class="md:col-span-2">

                    <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">

                        Nama Partner

                    </label>

                    <input type="text"
                           name="name"
                           placeholder="Contoh: Amikom Yogyakarta"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                           required>

                </div>

                {{-- LOGO URL --}}
                <div>

                    <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">

                        Logo URL

                    </label>

                    <input type="text"
                           name="logo_url"
                           id="logoInput"
                           value="https://placehold.co/200x200"
                           placeholder="Masukkan URL logo partner"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">

                </div>

                {{-- PREVIEW LOGO --}}
                <div>

                    <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">

                        Preview Logo

                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex items-center justify-center h-[88px]">

                        <img id="logoPreview"
                             src="https://placehold.co/200x200"
                             class="w-16 h-16 rounded-xl object-cover shadow-sm border">

                    </div>

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-4 border-t border-slate-100 pt-6 mt-10">

                <button type="reset"
                        class="px-6 py-3 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition">

                    Reset

                </button>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition">

                    Simpan Partner

                </button>

            </div>

        </form>

    </div>

    {{-- TABLE PARTNER --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">

        {{-- HEADER TABLE --}}
        <div class="p-8 border-b border-slate-100 flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-black text-slate-900">
                    List Partner
                </h2>

                <p class="text-slate-500 mt-1">
                    Daftar partner yang mendukung platform event.
                </p>

            </div>

            <div class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-2xl text-sm font-bold">

                Total: {{ count($partners) }} Partner

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">

                    <tr>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            No
                        </th>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            Logo
                        </th>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            Nama Partner
                        </th>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($partners as $partner)

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        {{-- NO --}}
                        <td class="px-6 py-5 font-semibold text-slate-700">

                            {{ $loop->iteration }}

                        </td>

                        {{-- LOGO --}}
                        <td class="px-6 py-5">

                            <img src="{{ $partner->logo_url }}"
                                 class="w-16 h-16 rounded-2xl object-cover border shadow-sm">

                        </td>

                        {{-- NAMA --}}
                        <td class="px-6 py-5">

                            <div class="font-bold text-slate-800">

                                {{ $partner->name }}

                            </div>

                            <div class="text-sm text-slate-400">

                                Partner Event

                            </div>

                        </td>

                        {{-- ACTION --}}
                        <td class="px-6 py-5">

                            <div class="flex gap-3">

                                {{-- EDIT --}}
                                <a href="/admin/partners/{{ $partner->id }}/edit"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm">

                                    Edit

                                </a>

                                {{-- DELETE --}}
                                <form action="/admin/partners/{{ $partner->id }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus partner ini?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold transition shadow-sm">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4"
                            class="text-center py-16 text-slate-400">

                            Belum ada data partner

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
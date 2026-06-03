@extends('layouts.admin')

@section('page_title', 'Categories')
@section('page_subtitle', 'Kelola kategori event')

@section('content')

<div class="space-y-8">

    {{-- FORM TAMBAH CATEGORY --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 p-8">

        <div class="mb-8">

            <h2 class="text-3xl font-black text-slate-900">
                Tambah Kategori Baru
            </h2>

            <p class="text-slate-500 font-medium mt-1">
                Tambahkan kategori untuk event yang tersedia.
            </p>

        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">

            @csrf

            <div>

                <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">
                    Nama Kategori
                </label>

                <input type="text"
                       name="name"
                       placeholder="Contoh: Seminar"
                       class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                       required>

            </div>

            <div class="flex justify-end border-t border-slate-100 pt-6 mt-8">

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition">

                    Simpan Kategori

                </button>

            </div>

        </form>

    </div>

    {{-- LIST CATEGORY --}}
    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 overflow-hidden">

        <div class="p-8 border-b border-slate-100">

            <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-6">

                <div>

                    <h2 class="text-2xl font-black text-slate-900">
                        List Kategori
                    </h2>

                    <p class="text-slate-500 mt-1">
                        Daftar kategori event yang tersedia.
                    </p>

                </div>

                <div class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-2xl text-sm font-bold">

                    Total: {{ count($categories) }} Kategori

                </div>

            </div>

            {{-- SEARCH --}}
            <form method="GET">

                <div class="flex gap-3">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Cari kategori..."
                           class="w-full md:w-96 bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-2xl font-bold transition">

                        Cari

                    </button>

                </div>

            </form>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50 border-b border-slate-100">

                    <tr>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            No
                        </th>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            Nama Kategori
                        </th>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            Slug
                        </th>

                        <th class="text-left px-6 py-5 text-xs uppercase tracking-wider font-extrabold text-slate-500">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($categories as $category)

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-6 py-5 font-semibold text-slate-700">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-5 font-bold text-slate-800">
                            {{ $category->name }}
                        </td>

                        <td class="px-6 py-5 text-slate-500">
                            {{ $category->slug }}
                        </td>

                        <td class="px-6 py-5">

                            <div class="flex gap-3">

                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-5 py-2 rounded-xl text-sm font-bold">

                                    Edit

                                </a>

                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus kategori ini?')"
                                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl text-sm font-bold">

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

                            Belum ada kategori

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
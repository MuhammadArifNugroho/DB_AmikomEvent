@extends('layouts.admin')

@section('page_title', 'Edit Category')
@section('page_subtitle', 'Ubah data kategori event')

@section('content')

<div class="max-w-3xl">

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 p-8">

        <div class="mb-8">

            <h2 class="text-3xl font-black text-slate-900">
                Edit Kategori
            </h2>

            <p class="text-slate-500 mt-1">
                Perbarui data kategori event.
            </p>

        </div>

        <form action="{{ route('admin.categories.update', $category->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div>

                <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">

                    Nama Kategori

                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ $category->name }}"
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>

            </div>

            <div class="flex justify-end gap-4 border-t border-slate-100 pt-6 mt-8">

                <a href="{{ route('admin.categories.index') }}"
                   class="px-6 py-3 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition">

                    Kembali

                </a>

                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition">

                    Update Kategori

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
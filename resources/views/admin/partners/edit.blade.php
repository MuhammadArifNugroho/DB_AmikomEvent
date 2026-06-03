@extends('layouts.admin')

@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Perbarui data partner event')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-[32px] shadow-sm border border-slate-100 p-8">

        {{-- HEADER --}}
        <div class="mb-8">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-3xl font-black text-slate-900">
                        Edit Partner
                    </h2>

                    <p class="text-slate-500 font-medium mt-1">
                        Perbarui informasi partner event dengan mudah.
                    </p>

                </div>

                {{-- LOGO --}}
                <div class="hidden md:block">

                    <img id="logoPreview"
                         src="{{ $partner->logo_url }}"
                         class="w-20 h-20 rounded-2xl object-cover border shadow-sm">

                </div>

            </div>

        </div>

        {{-- FORM --}}
        <form action="/admin/partners/{{ $partner->id }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="space-y-6">

                {{-- NAMA PARTNER --}}
                <div>

                    <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">

                        Nama Partner

                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $partner->name }}"
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
                           value="{{ $partner->logo_url }}"
                           class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition">

                </div>

                {{-- PREVIEW --}}
                <div>

                    <label class="block text-sm font-extrabold uppercase tracking-wide text-slate-700 mb-3">

                        Preview Logo

                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 flex justify-center">

                        <img id="previewImage"
                             src="{{ $partner->logo_url }}"
                             class="w-28 h-28 rounded-2xl object-cover shadow-sm border">

                    </div>

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-between items-center border-t border-slate-100 pt-6 mt-10">

                {{-- BACK --}}
                <a href="/admin/partners"
                   class="px-6 py-3 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition">

                    ← Kembali

                </a>

                <div class="flex gap-4">

                    {{-- RESET --}}
                    <button type="reset"
                            class="px-6 py-3 rounded-2xl font-bold text-slate-500 hover:bg-slate-100 transition">

                        Reset

                    </button>

                    {{-- UPDATE --}}
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 transition">

                        Update Partner

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>



@endsection
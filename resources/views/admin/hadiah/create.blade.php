@extends('v_layouts.app')
@section('title', 'Create Hadiah')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Form for creating a new Hadiah -->
                    <form action="{{ route('hadiah.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="mb-2 block text-sm font-bold text-gray-700">
                                Nama:
                            </label>
                            <input type="text" name="nama" id="nama" class="w-full rounded border px-3 py-2"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="code_voucer" class="mb-2 block text-sm font-bold text-gray-700">
                                Code Voucher:
                            </label>
                            <input type="text" name="code_voucer" id="code_voucer"
                                class="w-full rounded border px-3 py-2">
                        </div>

                        <div>
                            <button type="submit" class="rounded bg-blue-500 px-4 py-2 text-white">
                                Create Hadiah
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('v_layouts.app')
@section('title', 'Create Hadiah')

@section('content')
    <h2>Create Hadiah</h2>

    <!-- Form for creating a new Hadiah -->
    <form action="{{ route('hadiah.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">
                Nama:
            </label>
            <input type="text" name="nama" id="nama" class="border rounded w-full py-2 px-3" required>
        </div>

        <div class="mb-4">
            <label for="code_voucer" class="block text-gray-700 text-sm font-bold mb-2">
                Code Voucher:
            </label>
            <input type="text" name="code_voucer" id="code_voucer" class="border rounded w-full py-2 px-3">
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                Create Hadiah
            </button>
        </div>
    </form>
@endsection

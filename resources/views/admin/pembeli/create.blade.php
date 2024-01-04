
@extends('v_layouts.app')
@section('title', 'Home')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <!-- Form for creating a new Pembeli -->
                <form action="{{ url('pembeli/store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">
                            Nama:
                        </label>
                        <input type="text" name="nama" id="nama" class="border rounded w-full py-2 px-3" required>
                    </div>

                    <div class="mb-4">
                        <label for="nomer_hp" class="block text-gray-700 text-sm font-bold mb-2">
                            Nomer HP:
                        </label>
                        <input type="text" name="nomer_hp" id="nomer_hp" class="border rounded w-full py-2 px-3" required>
                    </div>

                    <div class="mb-4">
                        <label for="code_voucer" class="block text-gray-700 text-sm font-bold mb-2">
                            Code Voucher:
                        </label>
                        <input type="text" name="code_voucer" id="code_voucer" class="border rounded w-full py-2 px-3">
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                            Create Pembeli
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection

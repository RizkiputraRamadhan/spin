@extends('v_layouts.app')
@section('title', 'Create Pemenang')

@section('content')
    <h2>Create Pemenang</h2>

    <!-- Form for creating a new Pemenang -->
    <form action="{{ route('pemenang.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="hadiah" class="block text-gray-700 text-sm font-bold mb-2">
                Hadiah:
            </label>
            <select name="hadiah_id" id="hadiah" class="border rounded w-full py-2 px-3" required>
                @foreach($hadiahs as $hadiah)
                    <option value="{{ $hadiah->id }}">{{ $hadiah->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="pembeli" class="block text-gray-700 text-sm font-bold mb-2">
                Pembeli:
            </label>
            <select name="pembeli_id" id="pembeli" class="border rounded w-full py-2 px-3" required>
                @foreach($pembelis as $pembeli)
                    <option value="{{ $pembeli->id }}">{{ $pembeli->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">
                Create Pemenang
            </button>
        </div>
    </form>
@endsection

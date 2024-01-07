@extends('v_layouts.app')
@section('title', 'Data Hadiah')

@section('content')
<div class="p-5">
    <a href="{{ route('hadiah.create') }}" class="btn btn-success my-3">Tambah Hadiah</a>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">#</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Code Voucher</th>
                    <th class="py-2 px-4 border-b">Dibuat</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hadiahs as $hadiah)
                    <tr  class="text-center">
                        <!-- Display Hadiah data in each row -->
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $hadiah->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $hadiah->code_voucer }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($hadiah->updated_at)->format('d M Y') }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Delete Button -->
                            <form action="{{ route('hadiah.destroy', $hadiah->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-500 py-1 px-3 rounded-full focus:outline-none focus:shadow-outline-red">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection

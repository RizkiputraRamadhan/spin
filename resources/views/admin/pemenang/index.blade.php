@extends('v_layouts.app')
@section('title', 'Data Pemenang')

@section('content')
<div class="p-5">
    <h2 class="text-2xl font-bold mb-4">Data Pemenang</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Hadiah</th>
                    <th class="py-2 px-4 border-b">No Telepon</th>
                    <th class="py-2 px-4 border-b">Dibuat</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemenangs as $pemenang)
                    <tr class="text-center">
                        <!-- Display Pemenang data in each row -->
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $pemenang->hadiah }}</td>
                        <td class="py-2 px-4 border-b">{{ $pemenang->notlp }}</td>
                        <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pemenang->updated_at)->format('d M Y') }}</td>
                        <td class="py-2 px-4 border-b">
                            <!-- Delete Button -->
                            <form action="{{ route('pemenang.destroy', $pemenang->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-500 py-1 px-3 rounded-full focus:outline-none focus:shadow-outline-red">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

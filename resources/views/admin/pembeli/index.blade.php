@extends('v_layouts.app')
@section('title', 'Home')
@section('content')
<div class="p-5">

    <div class="py-">
    <a href="{{ url('pembeli/create') }}" class="btn btn-success my-3">Tambah Pembeli</a>

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Nama</th>
                <th class="py-2 px-4 border-b">Nomer HP</th>
                <th class="py-2 px-4 border-b">Code Voucher</th>
                <th class="py-2 px-4 border-b">Dibuat </th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelis as $pembeli)
                <tr  class="text-center">
                    <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b">{{ $pembeli->nama }}</td>
                    <td class="py-2 px-4 border-b">{{ $pembeli->nomer_hp }}</td>
                    <td class="py-2 px-4 border-b">{{ $pembeli->code_voucer }}</td>
                    <td class="py-2 px-4 border-b">{{ \Carbon\Carbon::parse($pembeli->updated_at)->format('d M Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        <!-- Delete Button -->
                        <form action="{{ url('pembeli/delete', $pembeli->id) }}" method="POST">
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

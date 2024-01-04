@extends('v_layouts.app')
@section('title', 'Home')
@section('content')


<section class="bg-white">

    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <div class="relative">
            <canvas id="wheel" class="w-full"></canvas>
            <img src="https://i.ibb.co/jWwDTYM/Wheel-arrow.png" alt="spinner arrow" class="w-24 absolute top-1/2 left-1/2 transform -translate-x-1/3 -translate-y-1/2">
        </div>
        <div class="mt-4 md:mt-0">
            <form id="lottery-form" action="/" method="POST">
                @csrf
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone" class="mt-1 p-2 border rounded-md w-full" placeholder="Masukkan nomor telepon Anda" required>

                <label for="voucher" class="block mt-4 text-sm font-medium text-gray-700">Voucher:</label>
                <textarea id="voucher" name="voucher" class="mt-1 p-2 border rounded-md w-full" placeholder="Masukkan voucher Anda"></textarea>

                <button id="spin-btn" class="mt-4 btn bg-yellow-500" type="button">Undi Sekarang</button>
            </form>

            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">
                <div class="text-5xl font-bold" id="final-value">
                    <p>Pemenang</p>
                </div>
            </h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg">peraturan : .</p>
        </div>
    </div>
</section>

 @endsection

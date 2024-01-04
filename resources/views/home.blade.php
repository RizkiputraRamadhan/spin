@extends('v_layouts.app')
@section('title', 'Home')
@section('content')

    <style>
        .prize-animation {
            animation: prizeAnimation 3s ease-in-out;
        }
        @keyframes prizeAnimation {
            0% {
                transform: scale(1);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 0.5;
            }
        }
    </style>
    <section class="bg-white">
        <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
            <div class="relative">
                <canvas id="wheel" class="w-full"></canvas>
                <img width="170px"
                    src="https://i.ibb.co/y5j2S1h/pngtree-update-spin-arrow-png-image-5932980-removebg-preview.png"
                    alt="spinner arrow" class=" absolute top-1/2 left-1/2 -ml-6 transform -translate-x-1/3 -translate-y-1/2">
            </div>
            <div class="mt-4 md:mt-0">
                <form action="/undi" method="post">
                    @csrf
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                    <input type="tel" id="phone" name="phone" class="mt-1 p-2 border rounded-md w-full"
                        placeholder="Masukkan nomor telepon Anda" required value="{{ old('phone') }}">

                    <label for="voucher" class="block mt-4 text-sm font-medium text-gray-700">Voucher:</label>
                    <textarea id="voucher" name="voucher" class="mt-1 p-2 border rounded-md w-full" placeholder="Masukkan voucher Anda">{{ old('voucher') }}</textarea>

                    @if (session('selamat'))
                        <button id="spin-btn" class="mt-4 hidden btn bg-yellow-500" type="button">Undi</button>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('spin-btn').click();
                            });
                        </script>
                    @endif

                    <button id="spin-btn" class="mt-4 hidden btn bg-yellow-500" type="button">Undi</button>
                    <button class="mt-4 btn bg-yellow-500" type="submit">Undi Sekarang</button>
                </form>

                <h2 class="mb-4 mt-5 text-4xl tracking-tight font-extrabold text-gray-900">
                    <div class="text-4xl font-bold" id="final-value">
                        @if (session('gagalUndi'))
                            <p>upps... nomer atau vocer anda belum beruntung</p>
                        @endif
                    </div>
                </h2>
            </div>
        </div>
        <canvas id="canvas"></canvas>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <!-- Chart JS Plugin for displaying text over chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js">
    </script>


    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const wheel = document.getElementById("wheel");
        const spinBtn = document.getElementById("spin-btn");
        const finalValue = document.getElementById("final-value");
        const hadiahLabels = @json($hadiah->pluck('nama')->toArray());
        const hadiahVocer = @json($hadiah->pluck('code_voucer')->toArray());
        const selamatMessage = @json(session('selamat'));
        document.getElementById('spin-btn').addEventListener('click', function() {
            var phoneNumber = document.getElementById('phone').value;
            var voucherCode = document.getElementById('voucher').value;
        });

        //Object that stores values of minimum and maximum angle for a value
        const rotationValues = [{
                minDegree: 0,
                maxDegree: 30,
                value: 2
            },
            {
                minDegree: 31,
                maxDegree: 90,
                value: 1
            },
            {
                minDegree: 91,
                maxDegree: 150,
                value: 6
            },
            {
                minDegree: 151,
                maxDegree: 210,
                value: 5
            },
            {
                minDegree: 211,
                maxDegree: 270,
                value: 4
            },
            {
                minDegree: 271,
                maxDegree: 330,
                value: 3
            },
            {
                minDegree: 331,
                maxDegree: 360,
                value: 2
            },
        ];
        //Size of each piece
        const data = [16, 16, 16, 16, 16, 16];
        //background color for each piece
        var pieColors = [
            "#045F5F", // Kuning
            "#0000FF", // Biru
            "#8b35bc",
            "#008000", // Hijau
            "#FF0000", // Merah
            "#b163da",
        ];


        //Create chart
        let myChart = new Chart(wheel, {
            plugins: [ChartDataLabels],
            type: "pie",
            data: {
                labels: hadiahLabels,
                datasets: [{
                    backgroundColor: pieColors,
                    data: data,
                }, ],
            },
            options: {
                //Responsive chart
                responsive: true,
                animation: {
                    duration: 0
                },
                plugins: {
                    //hide tooltip and legend
                    tooltip: false,
                    legend: {
                        display: false,
                    },
                    //display labels inside pie chart
                    datalabels: {
                        color: "#ffffff",
                        formatter: (_, context) => context.chart.data.labels[context.dataIndex],
                        font: {
                            size: 24
                        },
                    },
                },
            },
        });

        const valueGenerator = (angleValue) => {
            for (let i in rotationValues) {
                if (angleValue >= rotationValues[i].minDegree && angleValue <= rotationValues[i].maxDegree) {
                    finalValue.innerHTML =
                        `<p>Selamat Anda Mendapatkan ${selamatMessage} <br> Tunggu Nomer Anda Dihubungi Admin</p>`;
                    spinBtn.disabled = false;

                    // Add a CSS class for animation
                    finalValue.classList.add('prize-animation');

                    // Remove the animation class after a delay (adjust the delay as needed)
                    setTimeout(() => {
                        finalValue.classList.remove('prize-animation');
                    }, 8000); // 3000 milliseconds (adjust as needed)


                    Swal.fire({
                        title: `Selamat Anda Mendapatkan ${selamatMessage} .`,
                        width: 600,
                        padding: "3em",
                        color: "#716add",
                        background: "#fff url(/images/trees.png)",
                        backdrop: `
                          rgba(0,0,123,0.4)
                          url("https://i.ibb.co/LrcZRVc/352159-206ae.gif")
                          left top
                          no-repeat
                        `
                    });
                    break;


                }
            }
        };



        let count = 0;
        let resultValue = 101;
        spinBtn.addEventListener("click", () => {
            spinBtn.disabled = true;
            finalValue.innerHTML = `<p>semoga beruntung!¨</p>`;
            let randomDegree = Math.floor(Math.random() * (355 - 0 + 1) + 0);
            let rotationInterval = window.setInterval(() => {
                myChart.options.rotation = myChart.options.rotation + resultValue;
                myChart.update();
                if (myChart.options.rotation >= 360) {
                    count += 1;
                    resultValue -= 5;
                    myChart.options.rotation = 0;
                } else if (count > 15 && myChart.options.rotation == randomDegree) {
                    valueGenerator(randomDegree);
                    clearInterval(rotationInterval);
                    count = 0;
                    resultValue = 101;
                }
            }, 50);
        });
    </script>

@endsection

@section('title', 'Home')
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        outline: none;
    }

    body {
        font-family: "Open Sans";
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow: hidden;
        background: url('https://i.ibb.co/4FGT5Fj/Whats-App-Image-2024-01-06-at-14-49-28-53d1248d.jpg') no-repeat;
        background-size: cover;
    }

    .mainbox {
        position: relative;
        width: 500px;
        height: 500px;
    }

    .mainbox:after {
        position: absolute;
        content: '';
        width: 32px;
        height: 32px;
        background-size: 32px;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
    }

    .box {
        width: 100%;
        height: 100%;
        background: url('https://i.ibb.co/Rg0JRnW/my-singing-monsters-drinking-wheel-spin-and-strip-big-blue-bubble-game-pinwheel-removebg-preview.png') no-repeat;
        background-size: 100%;
        position: relative;
        font-weight: bold;
        border-radius: 50%;
        border: 10px solid transparent;
        overflow: hidden;
        transition: all ease 5s;

    }

    span {
        width: 50%;
        height: 50%;
        display: inline-block;
        position: absolute;


    }

    .span1 {
        clip-path: polygon(0 92%, 100% 50%, 0 8%);
        top: 120px;
        left: 0;

    }

    .span2 {
        clip-path: polygon(100% 92%, 0 50%, 100% 8%);
        top: 120px;
        right: 0;
    }

    .span3 {
        clip-path: polygon(50% 0%, 8% 100%, 92% 100%);
        bottom: 0;
        left: 120px;
    }

    .span4 {
        clip-path: polygon(50% 100%, 92% 0, 8% 0);
        top: 0;
        left: 120px;
    }

    .box1 .span3 b {
        transform: translate(-50%, -50%) rotate(-270deg);
    }

    .box1 .span1 b,
    .box2 .span1 b {
        transform: translate(-50%, -50%) rotate(185deg);
    }

    .box2 .span3 b {
        transform: translate(-50%, -50%) rotate(90deg);
    }

    .box1 .span4 b,
    .box2 .span4 b {
        transform: translate(-50%, -50%) rotate(-85deg);
    }

    span b {
        font-size: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #000000;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-shadow: 2px 1px rgb(255, 255, 255);
        font-weight: bold;

    }

    .box2 {
        width: 100%;
        height: 100%;
        transform: rotate(-135deg);
    }

    .spin {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 4px solid #ff0000;
        background-color: #000000;
        color: #fff;
        box-shadow: 0 5px 20px #000;
        font-weight: bold;
        font-size: 22px;
        cursor: pointer;
        font-family: 'Courier New', Courier, monospace;
    }

    .spin:active {
        width: 70px;
        height: 70px;
        font-size: 20px;

    }

    .mainbox.animate:after {
        animation: animateArrow 0.7s ease infinite;
    }

    .flex {
        display: flex;
    }

    .input-container {
        margin-top: 20px;
        text-align: center;
    }

    input[type="text"] {
        width: 250px;
        padding: 10px;
        margin: 5px;
        box-sizing: border-box;
    }

    input {
        border: 2px solid rgb(0, 0, 0);
        text-align: center;
        border-radius: 10px;
        color: rgb(0, 0, 0);
        font-weight: bold;
        background-color: rgb(204, 204, 204);

    }

    .input-section {
        margin-top: 70px;
        margin-left: 40;
        padding: 32px;
        height: 400px;
        -webkit-box-shadow: inset -2px 1px 13px -4px rgba(237, 224, 35, 0.69);
        -moz-box-shadow: inset -2px 1px 13px -4px rgba(237, 224, 35, 0.69);
        box-shadow: inset -2px 1px 13px -4px rgba(237, 224, 35, 0.69);
        background-color: white;
        border-radius: 24px;
    }

    .butonSpin {
        padding: 10px;
        margin-top: 10px;
        width: 78%;
        text-align: center;
        align-items: center;
        margin: 10px 35px;
        background-color: aqua;
        border-radius: 5px;
        font-weight: bold;
        transition: transform 0.2s ease;
    }

    .butonSpin:active {
        transform: scale(0.95);
    }



    @keyframes animateArrow {
        50% {
            right: -40px;
        }
    }

    @media only screen and (max-width: 800px) {

        .mainbox {
            width: 90vw;
            height: 90vw;
            margin-bottom: -90;
        }

        span {
            width: 38%;
            height: 38%;
            display: inline-block;
            position: absolute;
        }

        .span1 {
            top: 100px;
            left: 20;
        }

        .span2 {
            top: 100px;
            right: 20;
        }

        .span3 {
            bottom: 20;
            left: 100px;
        }

        .span4 {
            top: 20;
            left: 100px;
        }

        .flex {
            display: block;
        }

        .input-section {
            padding: 20px;
            justify-content: center;
            align-items: center;
            margin: 65 20;
            width: 300px;
            margin-bottom: 10px;
            height: 300px;
            -webkit-box-shadow: inset -2px 1px 13px -4px rgba(237, 224, 35, 0.69);
            -moz-box-shadow: inset -2px 1px 13px -4px rgba(237, 224, 35, 0.69);
            box-shadow: inset -2px 1px 13px -4px rgba(237, 224, 35, 0.69);
            background-color: white;
            border-radius: 24px;
            margin-left: 25px;
        }

        .logo {
            width: 90;
            display: flex;
            margin: auto;
        }

        .butonSpin {
            padding: 10px;
            margin-top: 10px;
            width: 80%;
            text-align: center;
            align-items: center;
            margin: 10px 30px;
            background-color: aqua;
            border-radius: 5px;
            font-weight: bold;
            transition: transform 0.2s ease;
        }

    }
</style>
</head>
<div class="flex">
    <div id="mainbox" class="mainbox">
        <div id="box" class="box">
            <div class="box1">
                @foreach ($topHadiah as $h)
                    <span class="span{{ $loop->iteration }} sp"><b>{{ $h->nama }}</b></span>
                @endforeach
            </div>

            <div class="box2">
                @foreach ($bottomHadiah as $h)
                    <span class="span{{ $loop->iteration }} sp"><b>{{ $h->nama }}</b></span>
                @endforeach
            </div>
        </div>
        <button class="spin" id="plush" onclick="stopRotation()">SPIN</button>
        <button  id="undi" onclick="rotateFunction()"></button>
    </div>
    <br>
    <form class="input-section" action="/undi" method="post">
        @csrf
        <img class="logo" src="https://i.ibb.co/jWfTb3c/Whats-App-Image-2024-01-06-at-14-50-55-bafac6b3.jpg"
            alt="">
        <div class="input-container">
            <input type="text" name="phone" id="phoneNumber" required placeholder="Enter your phone number">
        </div>
        <div class="input-container">
            <input type="text" name="voucher" id="voucherCode" required placeholder="Enter your voucher code">
        </div>
        <button id="undi" class="butonSpin" type="submit">Spin</button>
    </form>
   

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('gagalUndi'))
<div>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Gagal!',
            text: '{{ session('gagalUndi') }}',
        });
    </script>
</div>
@endif
<script>
    let rotationInterval;
    let undianBerhasil = {!! json_encode(session('undianBerhasil', false)) !!};
    if (undianBerhasil) {
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('undi').click();
        });
    } else{
       
    }

    function rotateFunction() {
        let phoneNumberValue = document.getElementById('phoneNumber').value;
        let voucherCodeValue = document.getElementById('voucherCode').value;

        let min = 1024;
        let max = 9999;
        let deg = Math.floor(Math.random() * (max - min)) + min;

        document.getElementById('box').style.transform = 'rotate(' + deg + 'deg)';
        clearInterval(rotationInterval);
        rotationInterval = setInterval(function() {}, 100);

        setTimeout(function() {
            stopRotation();
            document.getElementById('box').style.transform = 'rotate(' + +'deg)';
            let selectedItem = '';
            let elements = document.querySelectorAll('.box1 span, .box2 span');
            let index;
            if (deg >= 1024 && deg <= 2000) {
                index = 0;
            } else if (deg >= 2000 && deg <= 3000) {
                index = 1;
            } else if (deg >= 3000 && deg <= 4000) {
                index = 2;
            } else if (deg >= 4000 && deg <= 5000) {
                index = 3;
            } else if (deg >= 6000 && deg <= 7000) {
                index = 4;
            } else if (deg >= 7000 && deg <= 8000) {
                index = 5;
            } else if (deg >= 8000 && deg <= 9000) {
                index = 6;
            } else if (deg >= 9000 && deg <= 9999) {
                index = 7;
            } else {
                index = -1;
            }

            if (index !== -1) {
                selectedItem = elements[index].textContent.trim();
            } else {
                selectedItem = 'zoonkk';
            }
            if (selectedItem === 'zoonkk' || selectedItem === '') { 
                Swal.fire({
                title: `Anda Mendapatkan ${selectedItem} Belum Beruntung Coba Lagi.`,
                width: 600,
                padding: "3em",
                color: "#716add",
                background: "#fff",
                backdrop: `
                      rgba(0,0,123,0.4)
                      url("https://i.ibb.co/LrcZRVc/352159-206ae.gif")
                      left top
                      no-repeat
                    `
            });
            }else {

                Swal.fire({
                    title: `Selamat Anda Mendapatkan ${selectedItem} .`,
                    width: 600,
                    padding: "3em",
                    color: "#716add",
                    background: "#fff url(https://i.ibb.co/LrcZRVc/352159-206ae.gif )",
                    backdrop: `
                          rgba(0,0,123,0.4)
                          url("https://i.ibb.co/LrcZRVc/352159-206ae.gif")
                          left top
                          no-repeat
                        `
                });
            }


        }, 5000);
    }
 
    function stopRotation() {
        clearInterval(rotationInterval);
    }
    
</script>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Día de la familia</title>

    <!-- Agrega la etiqueta link para el favicon -->
    <link rel="icon" href="{{ asset('img/Imagen2.png') }}" type="image/x-icon"/>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
    @font-face {
        font-family: 'BMWTypeNext';
        src: url('/fonts/BMWTypeNext-Regular.otf') format('truetype');
    }

    body {
        font-family: 'BMWTypeNext';
    }
    .fund {
        background: linear-gradient(to bottom, #67aa70, #368faf);
        height: 100vh;
        overflow-y: auto;
    }

    .content-container {
        display: flex;
        flex-direction: column;
    }

    .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;

        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }


        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        .gradientX {
            background: linear-gradient(-45deg, #39B54A, #39B54A, #2A97D4, #55ABDC);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            overflow-y: auto;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
</style>
</head>
<body>
    <div class="gradientX relative">

        <ul class="circles" style="z-index: 0">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>

        <a href="{{ url('/') }}" class="text-white">
            <button class="top-4 left-4 absolute w-2/5 sm:w-1/5 sm:h-16 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #B11926; color: white;">REGRESAR</button>
        </a>
        
        <div class="pt-20 pb-5 sm:pb-10 mx-auto flex flex-col items-center content-container z-100">
            <img class="w-3/4 sm:w-1/5 mb-10 sm:mb-8" src="/img/Imagen2.png">
            <img src="{{ asset('images/' . $name . '.jpg') }}" class="sm:w-3/5 shadow" alt="Image" style="border-radius: 20px; " />
        </div>
        <div class="w-full mb-5 text-center">
            <!-- Download link -->
            <a href="{{ asset('images/' . $name . '.jpg') }}" download="{{ $name }}.jpg" class="text-white">
                <button class="w-2/5 sm:w-1/5 h-9 sm:h-16 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #B11926; color: white;">DESCARGAR</button>
            </a>
        </div>
    </div>
</body>
</html>

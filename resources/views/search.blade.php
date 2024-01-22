<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Día de la Familia</title>

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

      .div-info {
        border-radius: 1rem;
      }

      .fund {
        background: linear-gradient(to bottom, #67aa70, #368faf);
        height: 100vh;
        overflow-y: auto;
      }

      @media (min-width: 640px) {
        .div-info {
          border-radius: 4rem;
        }
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
    <div class="gradientX z-1 h-full w-full items-center flex justify-center">
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

      <div class="z-2 w-full sm:w-2/4 mx-2 my-5">

        <!-- section one -->
        <section class="mb-8">
          <div class="max-w-5xl pb-6 mx-auto flex justify-center items-center">
            <img class="w-3/4 sm:w-2/5" src="/img/Imagen2.png">
          </div>
        </section>

        <!-- section two -->
        <section class="flex justify-center items-center">
          <div class="div-info w-full sm:w-2/3 px-3 transform flex flex-col justify-center items-center bg-white">
            <p class="text-center my-5 sm:text-3xl text-xl font-bold">Ingresa el código de tu fotografía</p>
            <form method="POST" action="search">
                @csrf
                <input name="name" id="numericInput" type="text" placeholder="ej. 111111" class="text-center shadow appearance-none border rounded w-full p-2 text-grey-darker focus:ring-2 focus:ring-gray-900 uppercase mb-4" oninput="validateInput(event)">                
                <button type="submit" class="my-10 w-full max-w-lg px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #B11926; color: white;">BUSCAR</button>
            </form>
          </div>
        </section>
      </div>
    </div>

    <script>
      function validateInput(event) {
          // Obtener el valor actual del campo de entrada
          var inputValue = event.target.value;
          // Eliminar caracteres no alfabéticos al principio
          var alphanumericValue = inputValue.replace(/[^A-Za-z0-9ñÑ]/g, '');
          // Convertir las letras a mayúsculas
          var uppercaseValue = alphanumericValue.toUpperCase();
          // Separar las dos primeras letras y el resto de los números
          var firstTwoLetters = uppercaseValue.substring(0, 2);
          var remainingNumbers = uppercaseValue.substring(2);
          // Limitar la longitud total a 7 caracteres
          var truncatedValue = (firstTwoLetters + remainingNumbers).substring(0, 7);
          // Actualizar el valor del campo de entrada
          event.target.value = truncatedValue;
      }
    </script>

</body>
</html>

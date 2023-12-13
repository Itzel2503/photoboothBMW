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
    </style>
</head>
<body>
    <div class="fund z-1 h-full w-full items-center flex justify-center">
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
                <input name="name" class="text-center shadow appearance-none border rounded w-full p-2 text-grey-darker focus:ring-2 focus:ring-gray-900 uppercase mb-4" type="text" placeholder="ej. 111111">
                <button type="submit" class="my-10 w-full max-w-lg px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #B11926; color: white;">BUSCAR</button>
            </form>
          </div>
        </section>
      </div>
    </div>
</body>
</html>

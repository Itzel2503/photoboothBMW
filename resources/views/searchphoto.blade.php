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
    .fund {
        background: linear-gradient(to bottom, #67aa70, #368faf);
        height: 100vh;
        overflow-y: auto;
    }

    .content-container {
        display: flex;
        flex-direction: column;
    }
</style>
</head>
<body>
    <div class="fund relative">

        <a href="{{ url('/search') }}" class="text-white">
            <button class="top-4 left-4 absolute w-2/5 sm:w-1/5 sm:h-16 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #B11926; color: white;">REGRESAR</button>
        </a>
        
        <div class="pt-20 pb-5 sm:pb-10 mx-auto flex flex-col items-center content-container">
            <img class="w-3/4 sm:w-1/5 mb-10 sm:mb-8" src="/img/Imagen2.png">
            <img src="{{ asset('images/' . $name . '.jpeg') }}" class="sm:w-3/5" alt="Image" />
        </div>
        <div class="w-full mb-5 text-center">
            <!-- Download link -->
            <a href="{{ asset('images/' . $name . '.jpeg') }}" download="{{ $name }}.jpeg" class="text-white">
                <button class="w-2/5 sm:w-1/5 h-9 sm:h-16 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #B11926; color: white;">DESCARGAR</button>
            </a>
        </div>
    </div>
</body>
</html>
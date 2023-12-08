<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body class="relative">
    <div class="z-1 h-full w-full items-center flex justify-center" style="background-color: #b5ccd4;">

        <a href="{{ url('/search') }}" class="text-white">
            <button class="top-4 right-4 absolute w-40 py-2 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #29a9e1;">REGRESAR</button>
        </a>

        <!-- Download link -->
        <a href="{{ asset('images/' . $name . '.jpeg') }}" download="{{ $name }}.jpeg" class="text-white mt-5 absolute top-4 left-1/2 transform -translate-x-1/2">
            <button class="w-80 py-2 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #29a9e1;">DESCARGAR</button>
        </a>

        <div class="bg-white z-2 md:w-3/5 lg:w-full h-3/4 shadow-lg m-8 rounded-lg p-6 ease-out shadow-lg relative">
            <img src="{{ asset('images/' . $name . '.jpeg') }}" class="md:w-3/5 lg:w-full h-full object-cover pb-10" alt="Image" />
        </div>
    </div>
</body>



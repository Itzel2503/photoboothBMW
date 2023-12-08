<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body class="relative">
    <div class="z-1 h-full w-full items-center flex justify-center" style="background-color: #b5ccd4;">

        <a href="{{ url('/search') }}" class="text-white">
            <button class="top-4 right-4 absolute w-40 py-2 text-lg text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #29a9e1;">REGRESAR</button>
        </a>

        <div class="bg-white z-2 w-4/5 h-3/4 shadow-lg m-8 rounded-lg p-6 ease-out shadow-lg relative">
            <!-- section one -->
            <section class="">
                <div class="max-w-5xl px-4 mx-auto">
                    <div class="flex items-center justify-center text-bmwloyalty">
                        <div class="text-center align-middle">
                            <div class="flex text-center align-middle items-center justify-center w-full">
                                <img src="{{ asset('images/' . $name . '.jpeg') }}" class="w-full h-full object-cover pb-10" alt="Image" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Download link -->
            <section class="text-center mt-4">
                <a href="{{ asset('images/' . $name . '.jpeg') }}" download="{{ $name }}.jpeg" class="text-blue-500 hover:underline">Descargar Imagen</a>
            </section>
        </div>
    </div>
</body>


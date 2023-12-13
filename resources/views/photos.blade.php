<html>
<head>
    <style>
        @font-face {
            font-family: 'BMWTypeNext';
            src: url('/fonts/BMWTypeNext-Regular.otf') format('truetype');
        }

        body {
            font-family: 'BMWTypeNext';
        }

        .photobooth {
            background: rgb(255, 255, 255);
            margin: 0;
            width: 100%;
            height: 100%;
            display: flex;
            text-align: center;
            flex-direction: column;
            align-items: center; /* Centro verticalmente */
            justify-content: center; /* Centro horizontalmente */
        }

        .tittle {
            margin-bottom: 50px; /* Espacio entre el título y la imagen */
            width: 100%;
        }

        .tittle img {
            width: 14%;
        }

        .tittle p {
            margin-left: 72px;
            font-size: 60px;
            align-self: flex-end; /* Alineado en la parte inferior del contenedor */
            color: #9ca3af;
        }

        .strip {
            display: flex;
            align-items: center;
        }

        .strip .photo-container {
            display: inline-block;
            margin: 8px 0px 10px 35px;
            text-align: center;
            width: 30%;
        }

        .strip .photo-container img {
            width: 100%;
            box-shadow: 10px 5px 9px rgba(0, 0, 0, 0.2);
        }

        .strip .photo-container p {
            margin: 0;
            font-size: 60px;
            color: black;
        }

        .strip a:nth-child(5n + 1) img {
            transform: rotate(10deg);
        }

        .strip a:nth-child(5n + 2) img {
            transform: rotate(-2deg);
        }

        .strip a:nth-child(5n + 3) img {
            transform: rotate(8deg);
        }

        .strip a:nth-child(5n + 4) img {
            transform: rotate(-11deg);
        }

        .strip a:nth-child(5n + 5) img {
            transform: rotate(12deg);
        }

        .strip a:nth-child(5n + 1) p {
            transform: rotate(10deg);
        }

        .strip a:nth-child(5n + 2) p {
            transform: rotate(-2deg);
        }

        .strip a:nth-child(5n + 3) p {
            transform: rotate(8deg);
        }

        .strip a:nth-child(5n + 4) p {
            transform: rotate(-11deg);
        }

        .strip a:nth-child(5n + 5) p {
            transform: rotate(12deg);
        }
    </style>
    <title>Galería Día de la Familia</title>

    @livewireStyles
</head>
<body>
    <div id="welcomehome" class="h-full lg:h-screen w-full lg:w-1/2 2xl:w-7/12" style="background-image:url(/img/loyalty/fondoestrellas2.jpg);background-size: cover; background-position-x: center;">

    <div class="photobooth">
        <div class="tittle">
            <img class="icono" src="/img/Imagen2(gris).png">
        </div>
        <div class="strip">
            <livewire:see-photos />
        </div>
    </div>
    @livewireScripts
    <script>
        setInterval(function() {
            Livewire.emit('update');
        }, 5000);
    </script>
</body>
</html>

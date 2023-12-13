<title>Foto Día de la Familia</title>
<style>
    html {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    body {
        margin: 0;
        padding: 0;
    }

    .photobooth {
        background: rgb(255, 255, 255);
        max-width: 150rem;
        margin: 0;
    }

    /*clearfix*/
    .photobooth:after {
        content: "";
        display: block;
        clear: both;
    }

    .countdown {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        justify-content: center;
        align-items: center;
        color: white;
        background-color: #00000094;
        font-size: 180;
        display: none;
        z-index: 10;
    }

    .countdown:before {
        content: '321';
        font-family: monospace;
        display: inline-block;
        width: 1ch;
        overflow: hidden;
        animation: countdowns 3s steps(3) 1;
    }

    @keyframes countdowns {
        0% {
            text-indent: 0
        }

        100% {
            text-indent: -3ch;
        }
    }

    .video {
        width: 100%;
        float: left;
        height: calc(8.5/16 * 100vw); /* Calcula la altura en función del ancho */
        object-fit: cover; /* Mantiene la relación de aspecto y cubre el contenedor */
        transform: scaleX(-1); /* Invertir en el eje X */
    }


    .carousel-image {
        width: 100%;
        height: calc(8.5/16 * 100vw); /* Calcula la altura en función del ancho */
        float: left;
        position: absolute;
    }

    .canvas {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 200px;
        z-index: 9;
    }

    .div-take {
        display: flex;
        align-items: center;
        position: absolute;
        width: 100%;
        height: 100%;
        justify-content: center;
    }

    .button--takephoto {
        color: white;
        margin: 0;
        width: 460px;
        height: 160px;
        border: none;
        background: transparent;
        cursor: pointer;
        font-size: 70px;
    }

    .div-next {
        display: flex;
        align-items: center;
        position: absolute;
        width: 100%;
        height: 100%;
        justify-content: end;
    }

    .button--next {
        margin: 0;
        width: 83px;
        height: 289px;
        border: none;
        background: none;
        font-size: 50px;
    }
</style>

<body>
    <div class="photobooth">
        <div class="countdown"></div>
        <canvas id="canvas" class="canvas"></canvas>
        <video class="video"></video>

        <!-- ... other elements ... -->
        <img class="carousel-image" src="/img/Artboard 1.png" style="display: block;">
        <img class="carousel-image" src="/img/Artboard 4.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 5.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 6.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 7.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 9.png" style="display: none;">
        <img class="carousel-image" src="/img/frame-tugger.png" style="display: none;">
        <!-- ... other elements ... -->

        <div class="div-take">
            <button class="button--takephoto">Capturar Foto</button>
        </div>
        <div class="div-next">
            <button class="button--next"></button>
        </div>
    </div>
    
    <form id="photoForm" action="/save-photos" method="post">
    @csrf
        <input hidden class="name_photo" name="name_photo" id="name_photo">
    </form>


    <audio class="snap" src="/sound/snap.mp3" hidden></audio>
    <audio class="count" src="/sound/3secCountDown.mp3" hidden></audio>

<script>
    const overlayImages = document.querySelectorAll('.carousel-image');
    const video = document.querySelector(".video");
    const canvas = document.querySelector(".canvas");
    const ctx = canvas.getContext("2d");

    const strip = document.querySelector(".strip");
    const count = document.querySelector(".count");
    const snap = document.querySelector(".snap");

    const takePhotoBtn = document.querySelector(".button--takephoto");
    const turnoffBtn = document.querySelector(".button--turnoff");
    const nextButton = document.querySelector('.button--next');

    const srcPhoto = document.querySelector('.src_photo');
    const namePhoto = document.querySelector('.name_photo');

    // OBTENER VIDEO
        navigator.mediaDevices.getUserMedia({
        video: {
            width: { ideal: 1920 },
            height: { ideal: 1080 },
        },
        audio: false
    })
    .then(stream => {
        // Access granted, stream can be used
        const video = document.querySelector('.video');
        video.srcObject = stream;
        video.play();
    })
    .catch(error => {
        // Handle errors if any
        console.error('Error accessing webcam:', error);
    });

    // OBTENER VIDEOS
    function getVideo() {
        navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then((localMediaStream) => {
            mediastream = new MediaStream(localMediaStream);
            // console.log(mediastream);
            video.srcObject = mediastream;
            video.play();
        })
        .catch((err) => {
            console.error("Webcam Access Denied", err);
            alert("Webcam Access Denied");
        });
    }

    video.addEventListener('loadedmetadata', function() {
        console.log('Video Width:', video.videoWidth);
        console.log('Video Height:', video.videoHeight);
    });

    // OBTENER VIDEO
    /* let mediastream = null;
    
    navigator.mediaDevices
        .getUserMedia({ video: true, audio: false })
        .then((localMediaStream) => {
            mediastream = new MediaStream(localMediaStream);
            video.srcObject = mediastream;
            video.play();
        })
        .catch((err) => {
            console.error("Webcam Access Denied", err);
            alert("Webcam Access Denied");
        }); */

    let isCaptureInProgress = false; // Variable de control
    let captureTimeout;

    // Función para manejar la lógica de la captura de fotos
    function handleCapture() {
        if (!isCaptureInProgress) {
            // Marcar que la captura está en progreso
            isCaptureInProgress = true;

            // Reproducir el sonido de cuenta regresiva
            count.currentTime = 0;
            count.play();

            // Mostrar la cuenta regresiva antes de que comience el temporizador
            const countdownDiv = document.querySelector('.countdown');
            countdownDiv.style.display = 'flex';

            // Establecer un temporizador de 3 segundos para la captura de fotos
            captureTimeout = setTimeout(() => {
                // Ocultar la cuenta regresiva después del temporizador
                countdownDiv.style.display = 'none';
                takePhoto(); // Tomar la foto después de ocultar la cuenta regresiva
                isCaptureInProgress = false; // Restablecer el estado de la captura
            }, 3000);
        }
    }
    // Add an event listener for keydown events on the document
    document.addEventListener("keydown", function (event) {
        // Check if the pressed key is the B (key code 66)
        if (event.keyCode === 66) {
            // Prevent the default spacebar behavior (like scrolling the page)
            event.preventDefault();

            // Verificar si la captura está en progreso antes de llamar a handleCapture
            if (!isCaptureInProgress) {
                // Limpiar el temporizador de captura si está en progreso
                clearTimeout(captureTimeout);

                // Llamar a la función handleCapture cuando se presiona la tecla 'B'
                handleCapture();
            }
        }
        // Check if the pressed key is the spacebar (key code 32)
        if (event.keyCode === 65 && !isCaptureInProgress) {
            // Prevent the default spacebar behavior (like scrolling the page)
            event.preventDefault();
            // Call the showNextImage function when spacebar is pressed
            showNextImage();
        }
    });

    // CARRUSEL
    let currentImageIndex = 0;

    function showNextImage() {
        overlayImages.forEach(image => {
            image.style.display = 'none';
        });

        currentImageIndex = (currentImageIndex + 1) % overlayImages.length;
        overlayImages[currentImageIndex].style.display = 'block';
    }

    function takePhoto() {
        // play the sound
        snap.currentTime = 0;
        snap.play();

        // code name
        var fecha = new Date();
        var milisegundos = fecha.getMilliseconds();
        var random = Math.floor(Math.random() * 900) + 100;

        // Dimensiones
        const width = 1920;
        const height = 1080;
        canvas.width = width;
        canvas.height = height;

         // Guardar el estado actual del contexto
    ctx.save();

    // Invertir solo el video dibujando con escala negativa en el eje x
    ctx.scale(-1, 1);
    ctx.drawImage(video, -width, 0, width, height);
    ctx.scale(-1, 1); // Restaurar la escala para futuros dibujos

    // Dibujar la imagen superpuesta sin invertir
    ctx.drawImage(overlayImages[currentImageIndex], 0, 0, width, height);

    // Restaurar el estado del contexto
    ctx.restore();

        // pick a frame from canvas
        const data = canvas.toDataURL("image/jpeg");
        const link = document.createElement("a");
        link.href = data;
        link.setAttribute("download",  milisegundos + '' + random);
        link.click();
        link.textContent = "Download Image";        

        namePhoto.value = milisegundos + '' + random;
        document.getElementById('photoForm').submit();        
    }
</script>
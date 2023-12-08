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
        height: calc(9/16 * 100vw); /* Calcula la altura en función del ancho */
        object-fit: cover; /* Mantiene la relación de aspecto y cubre el contenedor */
    }

    .carousel-image {
        width: 100%;
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
        color: black;
        margin: 0;
        width: 83px;
        height: 289px;
        border: none;
        border-radius: 5px;
        background: repeating-radial-gradient(white, transparent 59px);
        cursor: pointer;
        font-size: 50px;
    }
</style>

<body>
    <div class="photobooth">
        <div class="countdown"></div>
        <canvas id="canvas" class="canvas"></canvas>
        <video class="video"></video>

        <!-- ... other elements ... -->
        <img class="carousel-image" src="/img/Artboard 1.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 3.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 4.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 5.png" style="display: none;">
        <img class="carousel-image" src="/img/Artboard 7.png" style="display: none;">
        <!-- ... other elements ... -->

        <div class="div-take">
            <button class="button--takephoto">Capturar Foto</button>
        </div>
        <div class="div-next">
            <button class="button--next">></button>
        </div>
    </div>
    
    <form id="photoForm" action="/save-photos" method="post">
    @csrf
        <input hidden class="name_photo" name="name_photo" id="name_photo">
    </form>


    <audio class="snap" src="/img/snap.mp3" hidden></audio>
    <audio class="count" src="/img/3secCountDown.mp3" hidden></audio>

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

    // CARRUSEL
    let currentImageIndex = 0;

    function showNextImage() {
        overlayImages.forEach(image => {
            image.style.display = 'none';
        });

        currentImageIndex = (currentImageIndex + 1) % overlayImages.length;
        overlayImages[currentImageIndex].style.display = 'block';
    }

    nextButton.addEventListener('click', showNextImage);

    // OBTENER VIDEO
    let mediastream = null;
    
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
        });

    // Add an event listener for keydown events on the document
    document.addEventListener("keydown", function (event) {
        // Check if the pressed key is the spacebar (key code 32)
        if (event.keyCode === 66) {
            // Prevent the default spacebar behavior (like scrolling the page)
            event.preventDefault();

            // Call the takePhoto function when spacebar is pressed
            count.currentTime = 0;
            count.play();

            // Show the countdown before the delay starts
            const countdownDiv = document.querySelector('.countdown');
            countdownDiv.style.display = 'flex';

            // Delay execution of hideCountdown and takePhoto functions by 3 seconds
            setTimeout(() => {
                // Hide the countdown after the delay
                const countdownDiv = document.querySelector('.countdown');
                countdownDiv.style.display = 'none';
                takePhoto(); // Take the photo after hiding the countdown
            }, 3000);
        }
    });

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

        // Draw the video frame onto the canvas
        ctx.drawImage(video, 0, 0, width, height);
        // Draw the image over the video at specified coordinates
        ctx.drawImage(overlayImages[currentImageIndex], 0, 0, width, height);

        // pick a frame from canvas
        const data = canvas.toDataURL("image/jpeg");
        const link = document.createElement("a");
        link.href = data;
        link.setAttribute("download",  milisegundos + '' + random);
        link.click();

        link.textContent = "Download Image";        
        link.innerHTML = `
                        <div class="photo-container">
                            <img src=${data} alt="PhotoBoothFrame"/>
                            <p>${milisegundos + ''  + random}</p>
                        </div>
                    `;

        namePhoto.value = milisegundos + '' + random;
        document.getElementById('photoForm').submit();

        // Check if there are already 10 photos in the strip
        const existingPhotos = document.querySelectorAll('.strip .photo-container');
        if (existingPhotos.length >= 10) {
            // Remove the oldest photo
            strip.removeChild(strip.lastChild);
        }
        strip.insertBefore(link, strip.firstChild);
        
    }
</script>
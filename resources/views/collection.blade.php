<!DOCTYPE html>
<html>
<head>
    <title>Muro Día de la familia</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }

        .img-fund {
            background-image: url("img/Imagen1(gris).png");
            background-size: 50%; /* Tamaño al 50% */
            background-repeat: no-repeat;
            background-position: center center; /* Centrar la imagen */
            height: 100vh; /* Ajustar al 100% de la altura de la ventana */
            position: fixed; /* Ajustar a fixed para que cubra toda la pantalla */
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            transition: opacity 2s ease-in-out;
            opacity: 1;
        }

        .fade-out {
            opacity: 0;
        }

        .fade-in {
            opacity: 1;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            width: 100vw;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            perspective: clamp(400px, 100vw, 1000px);
            position: relative;
        }

        .content::before,
        .content::after {
            content: "";
            position: fixed;
            z-index: 9;
            left: 0;
            right: 0;
            height: 30vh;
        }

        .content::before {
            top: 0;
            background: linear-gradient(5deg, rgba(0,0,0,0) 30%, #fff);
        }

        .content::after {
            bottom: 0;
            background: linear-gradient(-5deg, #fff, rgba(0,0,0,0) 70%);
        }
        
        .gallery {
            display: flex;
            gap: 1vw;
            max-width: 2080px;
            min-width: 720px;
            height: 100vh;
            /*transform: translate(15%, 0%) rotate(-6deg) rotateX(10deg) rotateY(20deg);*/
        }
        
        .gallery_line {
            display: flex;
            flex-direction: column;
            gap: 1vw;
            height: fit-content;
            animation: slide 60s linear infinite;
        }
        
        .gallery_line img {
            height: fit-content;
        }

        .slow {
            animation: slide 120s linear infinite;
        }

        .regular {
            animation: slide 80s linear infinite;
        }

        .fast {
            animation: slide 40s linear infinite;
        }

        .gallery_line img {
            flex: 1 1 auto;
            width: 100%;
            object-fit: cover;
            opacity: 1;
            transition: opacity 1s ease-in-out; /* Adjust the transition duration as needed */
        }

        .gallery_line img.hidden {
            opacity: 0;
            pointer-events: none;
        }

        /* Add animation styles for different gallery_line divs */
        @keyframes slide {
            0% { opacity: 0; transform: translateY(100%); }
            1% { opacity: 1; }
            99% { opacity: 1; }
            100% { opacity: 0; transform: translateY(-100%); }
        }

        /* Apply animations to each gallery_line with different durations or delays */
        .gallery_line:nth-child(1) {
            animation: slide 80s linear infinite;
        }
        
        .gallery_line:nth-child(2) {
            animation: slide 100s linear infinite;
            animation-direction: reverse;
        }
        
        .gallery_line:nth-child(3) {
            animation: slide 60s linear infinite;
        }
        
        .gallery_line:nth-child(4) {
            animation: slide 120s linear infinite;
            animation-direction: reverse;
        }
        
        .gallery_line:nth-child(5) {
            animation: slide 90s linear infinite;
        }
        
        .gallery_line:nth-child(6) {
            animation: slide 70s linear infinite;
            animation-direction: reverse;
        }
        .gallery_line:nth-child(7) {
            animation: slide 110s linear infinite;
        }
    </style>
</head>

<body>

    <div class="img-fund"></div>
    <div class="content">  
        <div class="gallery">
        <!-- Dynamically added gallery lines will go here -->
        </div>
    </div>

    <script>
        // Agregar la clase fade-in después de 500 ms (0.5 segundos)
        setTimeout(function () {
            document.querySelector('.img-fund').classList.add('fade-out');
        }, 2000);

        function recargarPagina() {
            // Agregar la clase para desvanecer la imagen
            document.querySelector('.img-fund').classList.remove('fade-out');
            // Esperar 0.5 segundos (500 milisegundos) antes de recargar la página
            setTimeout(function () {
                // Recargar la página
                location.reload();
            }, 2000);
        }
        // Llamamos a la función de recarga después de 5 minutos
        setTimeout(recargarPagina, 30500); // 56500 = 60000 (1 minuto) - 500 (0.5 segundos)
        
        // Acceder a la colección y al atributo 'name' en JavaScript
        var photosCollection = @json($photos);

        // Function to fetch image file names from the root folder
        function fetchImageNames() {
            const result = [];
            let currentBatch = [];

            photosCollection.forEach(function (photo, index) {
                const imageName = 'images/' + photo.name + '.jpeg';
                currentBatch.push(imageName);

                // Si el tamaño de images es un múltiplo de 5 o si estamos en el último elemento
                if ((index + 1) % 5 === 0 || index === photosCollection.length - 1) {
                    // Rellenar con elementos vacíos si no hay suficientes para alcanzar 5
                    currentBatch = currentBatch.concat(Array(5 - currentBatch.length).fill('img/Imagen1(gris).png'));

                    result.push(currentBatch);
                    // Limpiar el array para el siguiente lote
                    currentBatch = [];
                }
            });
            return result;
        }
        console.log(fetchImageNames());

        // Function to add images to the gallery lines
        function addImagesToGallery() {
            const gallery = document.querySelector(".gallery");
            const allImageArrays = fetchImageNames();

            allImageArrays.forEach((imageArray) => {
                const galleryLine = document.createElement("div");
                galleryLine.classList.add("gallery_line");

                imageArray.forEach((imageName) => {
                    const img = document.createElement("img");
                    img.src = imageName;
                    galleryLine.appendChild(img);
                });

                gallery.appendChild(galleryLine);
            });
        }
        addImagesToGallery();
    </script>
</body>
</html>
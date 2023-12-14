<!DOCTYPE html>
<html lang="">

<head>
    <title>Muro Día de la familia</title>
    <style>
        @font-face {
            font-family: 'BMWTypeNext';
            src: url('/fonts/BMWTypeNext-Regular.otf') format('truetype');
        }

        body {
            font-family: 'BMWTypeNext';
        }

        .img-fund {
            background-image: url("img/Imagen1(gris).png");
            background-size: 50%;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            position: fixed;
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

        .content {
            height: 100%;
            width: 100%;
            overflow: hidden;
            border-radius: 20px;
            display: inline-block;
        }

        .content .images {
            display: flex;
        }

        .content .images img {
            scroll-snap-align: start;
            flex-shrink: 0;
            width: 30%;
            height: 30%;
            margin-right: 50px;
            border-radius: 10px;
            background: #eee;
            transform-origin: center center;
            transform: scale(1);
            transition: opacity 0.5s ease-in-out;
            position: relative;
            object-fit: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 100px;

            /*flex: 0 0 14.28%;
            height: 100%;
            width: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;*/
        }

        .content .images img.active {
            opacity: 1;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="img-fund"></div>
    <div class="photobooth">
        <div class="content">
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
        // setTimeout(recargarPagina, 30500); // 56500 = 60000 (1 minuto) - 500 (0.5 segundos)
        
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
            const gallery = document.querySelector(".content");
            const allImageArrays = fetchImageNames();

            allImageArrays.forEach((imageArray, lineIndex) => {
                const galleryLine = document.createElement("div");
                galleryLine.classList.add("images");
                galleryLine.setAttribute("id", `gallery_line-${lineIndex}`);

                imageArray.forEach((imageName, imageIndex) => {
                    const img = document.createElement("img");
                    img.src = imageName;
                    // Agregar la clase "active" a la primera imagen de cada gallery_line
                    if (imageIndex === 0) {
                        img.classList.add("active");
                    }
                    galleryLine.appendChild(img);
                });

                gallery.appendChild(galleryLine);
            });
            // Iniciar el slideshow después de agregar las imágenes a la galería
            slideShow(allImageArrays.length);
        }

        addImagesToGallery();

        var indexValue = 0;

        function slideShow(totalLines) {
            let indexValues = Array(totalLines).fill(0);
            console.log(indexValues);
            
            function showNextImage(lineIndex) {
                const img = document.querySelectorAll(`#gallery_line-${lineIndex} img`);
                img.forEach((image) => {
                    image.classList.remove("active");
                });

                indexValues[lineIndex]++;
                if (indexValues[lineIndex] >= img.length) {
                    indexValues[lineIndex] = 0;
                }

                img[indexValues[lineIndex]].classList.add("active");
                document.querySelector(`#gallery_line-${lineIndex}`).style.transform = 'translateX(' + (-indexValues[lineIndex] * 14.28) + '%)';
            }

            function updateSlideShow() {
                for (let i = 0; i < totalLines; i++) {
                    showNextImage(i);
                }
                setTimeout(updateSlideShow, 8000);
            }

            // Iniciar el slideshow
            updateSlideShow();
        }
    </script>
</body>

</html>
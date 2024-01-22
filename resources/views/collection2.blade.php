{{-- <!DOCTYPE html>
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

</html> --}}



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muro Día de la familia</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            overflow: hidden;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            grid-template-rows: repeat(4, 1fr);
            gap: 20px; /* Espacio entre las cajas */
            max-width: 100%; /* Ancho máximo de cada caja */
            max-height: 100%; /* Alto máximo de cada caja */
            width: 96vw;
            height: 92vh;
        }

        .grid-item {
            /*background-color: #3498db3d; */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
        }

        .content {
            height: 195px;
            width: 350px;
            overflow: hidden;
        }

        .images {
            height: 100%;
            width: 700%;
            display: flex;
            transition: transform 0.5s ease-in-out;
            z-index: 100;
        }

        .images img {
            flex: 0 0 14.28%;
            height: 100%;
            width: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .images img.active {
            opacity: 1;
            border-radius: 10px;
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
            height: 100%;
            color: #55ABDC;
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

<body class="gradientX">
    {{-- <div class="img-fund"></div> --}}

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

    <div class="grid-container">        
    </div>
</body>

    <script>
        function generarNumeroAleatorio() {
            let start = 8000;
            let end = 40000;
            return Math.floor(Math.random() * (end - start) + start);
        }

        function recargarPagina() {
            // Agregar la clase para desvanecer la imagen
            //document.querySelector('.img-fund').classList.remove('fade-out');
            // Esperar 0.5 segundos (500 milisegundos) antes de recargar la página
            setTimeout(function () {
                // Recargar la página
                console.log('reloading');
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
                const imageName = 'images/' + photo.name + '.jpg';
                currentBatch.push(imageName);

                // Si el tamaño de images es un múltiplo de 3 o si estamos en el último elemento
                if ((index + 1) % 3 === 0 || index === photosCollection.length - 1) {
                    // Rellenar con elementos vacíos si no hay suficientes para alcanzar 5
                    currentBatch = currentBatch.concat(Array(3 - currentBatch.length).fill('img/canva.jpg'));

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
            const gallery = document.querySelector(".grid-container");
            const allImageArrays = fetchImageNames();

            allImageArrays.forEach((imageArray, lineIndex) => {
                const gridItem = document.createElement("div");
                gridItem.classList.add("grid-item");
                const contentItem = document.createElement("div");
                contentItem.classList.add("content");

                const galleryLine = document.createElement("div");
                galleryLine.classList.add("images");
                galleryLine.setAttribute("id", `content${lineIndex}`);

                imageArray.forEach((imageName, imageIndex) => {
                    const img = document.createElement("img");
                    img.src = imageName;
                    // Agregar la clase "active" a la primera imagen de cada gallery_line
                    if (imageIndex === 0) {
                        img.classList.add("active");
                    }
                    galleryLine.appendChild(img);
                });

                contentItem.appendChild(galleryLine);
                gridItem.appendChild(contentItem);
                gallery.appendChild(gridItem);
            });
            // Iniciar el slideshow después de agregar las imágenes a la galería
            //slideShow(allImageArrays.length);
        }

        addImagesToGallery();



        var indexValue0 = 0;
        function slideShow0() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow0, rand);
            const img = document.querySelectorAll("#content0 img");

            img[indexValue0].classList.remove("active");

            indexValue0++;
            if (indexValue0 >= img.length) {
                indexValue0 = 0;
            }

            img[indexValue0].classList.add("active");
            document.querySelector('#content0').style.transform = 'translateX(' + (-indexValue0 * 14.28) + '%)';
        }

        let contentAux0 = document.querySelectorAll("#content0 img");
        console.log(contentAux0.length);

        if(contentAux0.length > 0) {
            slideShow0();
            console.log("contentAux0");
        }


        var indexValue1 = 0;
        function slideShow1() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow1, rand);
            const img = document.querySelectorAll("#content1 img");

            img[indexValue1].classList.remove("active");

            indexValue1++;
            if (indexValue1 >= img.length) {
                indexValue1 = 0;
            }

            img[indexValue1].classList.add("active");
            document.querySelector('#content1').style.transform = 'translateX(' + (-indexValue1 * 14.28) + '%)';
        }

        let contentAux1 = document.querySelectorAll("#content1 img");
        if(contentAux1.length > 0) {
            slideShow1();
            console.log("contentAux1");
        }


        var indexValue2 = 0;
        function slideShow2() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow2, rand);
            const img = document.querySelectorAll("#content2 img");

            img[indexValue2].classList.remove("active");

            indexValue2++;
            if (indexValue2 >= img.length) {
                indexValue2 = 0;
            }

            img[indexValue2].classList.add("active");
            document.querySelector('#content2').style.transform = 'translateX(' + (-indexValue2 * 14.28) + '%)';
        }

        let contentAux2 = document.querySelectorAll("#content2 img");

        if(contentAux2.length > 0) {
            slideShow2();
            console.log("contentAux2");
        }


        var indexValue3 = 0;
        function slideShow3() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow3, rand);
            const img = document.querySelectorAll("#content3 img");

            img[indexValue3].classList.remove("active");

            indexValue3++;
            if (indexValue3 >= img.length) {
                indexValue3 = 0;
            }

            img[indexValue3].classList.add("active");
            document.querySelector('#content3').style.transform = 'translateX(' + (-indexValue3 * 14.28) + '%)';
        }

        let contentAux3 = document.querySelectorAll("#content3 img");

        if(contentAux3.length > 0) {
            slideShow3();
            console.log("contentAux3");
        }

        var indexValue4 = 0;
        function slideShow4() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow4, rand);
            const img = document.querySelectorAll("#content4 img");

            img[indexValue4].classList.remove("active");

            indexValue4++;
            if (indexValue4 >= img.length) {
                indexValue4 = 0;
            }

            img[indexValue4].classList.add("active");
            document.querySelector('#content4').style.transform = 'translateX(' + (-indexValue4 * 14.28) + '%)';
        }
        let contentAux4 = document.querySelectorAll("#content4 img");
        if(contentAux4.length > 0) {
            slideShow4();
            console.log("contentAux4");
        }

        var indexValue5 = 0;
        function slideShow5() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow5, rand);
            const img = document.querySelectorAll("#content5 img");

            img[indexValue5].classList.remove("active");

            indexValue5++;
            if (indexValue5 >= img.length) {
                indexValue5 = 0;
            }

            img[indexValue5].classList.add("active");
            document.querySelector('#content5').style.transform = 'translateX(' + (-indexValue5 * 14.28) + '%)';
        }
        let contentAux5 = document.querySelectorAll("#content5 img");
        if(contentAux5.length > 0) {
            slideShow5();
            console.log("contentAux5");
        }

        var indexValue6 = 0;
        function slideShow6() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow6, rand);
            const img = document.querySelectorAll("#content6 img");

            img[indexValue6].classList.remove("active");

            indexValue6++;
            if (indexValue6 >= img.length) {
                indexValue6 = 0;
            }

            img[indexValue6].classList.add("active");
            document.querySelector('#content6').style.transform = 'translateX(' + (-indexValue6 * 14.28) + '%)';
        }
        let contentAux6 = document.querySelectorAll("#content6 img");
        if(contentAux6.length > 0) {
            slideShow6();
            console.log("contentAux6");
        }

        var indexValue7 = 0;
        function slideShow7() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow7, rand);
            const img = document.querySelectorAll("#content7 img");

            img[indexValue7].classList.remove("active");

            indexValue7++;
            if (indexValue7 >= img.length) {
                indexValue7 = 0;
            }

            img[indexValue7].classList.add("active");
            document.querySelector('#content7').style.transform = 'translateX(' + (-indexValue7 * 14.28) + '%)';
        }
        let contentAux7 = document.querySelectorAll("#content7 img");
        if(contentAux7.length > 0) {
            slideShow7();
            console.log("contentAux7");
        }

        var indexValue8 = 0;
        function slideShow8() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow8, rand);
            const img = document.querySelectorAll("#content8 img");

            img[indexValue8].classList.remove("active");

            indexValue8++;
            if (indexValue8 >= img.length) {
                indexValue8 = 0;
            }

            img[indexValue8].classList.add("active");
            document.querySelector('#content8').style.transform = 'translateX(' + (-indexValue8 * 14.28) + '%)';
        }
        let contentAux8 = document.querySelectorAll("#content8 img");
        if(contentAux8.length > 0) {
            slideShow8();
            console.log("contentAux8");
        }

        var indexValue9 = 0;
        function slideShow9() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow9, rand);
            const img = document.querySelectorAll("#content9 img");

            img[indexValue9].classList.remove("active");

            indexValue9++;
            if (indexValue9 >= img.length) {
                indexValue9 = 0;
            }

            img[indexValue9].classList.add("active");
            document.querySelector('#content9').style.transform = 'translateX(' + (-indexValue9 * 14.28) + '%)';
        }
        let contentAux9 = document.querySelectorAll("#content9 img");
        if(contentAux9.length > 0) {
            slideShow9();
            console.log("contentAux9");
        }

        var indexValue10 = 0;
        function slideShow10() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow10, rand);
            const img = document.querySelectorAll("#content10 img");

            img[indexValue10].classList.remove("active");

            indexValue10++;
            if (indexValue10 >= img.length) {
                indexValue10 = 0;
            }

            img[indexValue10].classList.add("active");
            document.querySelector('#content10').style.transform = 'translateX(' + (-indexValue10 * 14.28) + '%)';
        }
        let contentAux10 = document.querySelectorAll("#content10 img");
        if(contentAux10.length > 0) {
            slideShow10();
            console.log("contentAux10");
        }

        var indexValue11 = 0;
        function slideShow11() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow11, rand);
            const img = document.querySelectorAll("#content11 img");

            img[indexValue11].classList.remove("active");

            indexValue11++;
            if (indexValue11 >= img.length) {
                indexValue11 = 0;
            }

            img[indexValue11].classList.add("active");
            document.querySelector('#content11').style.transform = 'translateX(' + (-indexValue11 * 14.28) + '%)';
        }
        let contentAux11 = document.querySelectorAll("#content11 img");
        if(contentAux11.length > 0) {
            slideShow11();
            console.log("contentAux11");
        }

        var indexValue12 = 0;
        function slideShow12() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow12, rand);
            const img = document.querySelectorAll("#content12 img");

            img[indexValue12].classList.remove("active");

            indexValue12++;
            if (indexValue12 >= img.length) {
                indexValue12 = 0;
            }

            img[indexValue12].classList.add("active");
            document.querySelector('#content12').style.transform = 'translateX(' + (-indexValue12 * 14.28) + '%)';
        }
        let contentAux12 = document.querySelectorAll("#content12 img");
        if(contentAux12.length > 0) {
            slideShow12();
            console.log("contentAux12");
        }

        var indexValue13 = 0;
        function slideShow13() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow13, rand);
            const img = document.querySelectorAll("#content13 img");

            img[indexValue13].classList.remove("active");

            indexValue13++;
            if (indexValue13 >= img.length) {
                indexValue13 = 0;
            }

            img[indexValue13].classList.add("active");
            document.querySelector('#content13').style.transform = 'translateX(' + (-indexValue13 * 14.28) + '%)';
        }
        let contentAux13 = document.querySelectorAll("#content13 img");
        if(contentAux13.length > 0) {
            slideShow13();
            console.log("contentAux13");
        }

        var indexValue14 = 0;
        function slideShow14() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow14, rand);
            const img = document.querySelectorAll("#content14 img");

            img[indexValue14].classList.remove("active");

            indexValue14++;
            if (indexValue14 >= img.length) {
                indexValue14 = 0;
            }

            img[indexValue14].classList.add("active");
            document.querySelector('#content14').style.transform = 'translateX(' + (-indexValue14 * 14.28) + '%)';
        }
        let contentAux14 = document.querySelectorAll("#content14 img");
        if(contentAux14.length > 0) {
            slideShow14();
            console.log("contentAux14");
        }

        var indexValue15 = 0;
        function slideShow15() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow15, rand);
            const img = document.querySelectorAll("#content15 img");

            img[indexValue15].classList.remove("active");

            indexValue15++;
            if (indexValue15 >= img.length) {
                indexValue15 = 0;
            }

            img[indexValue15].classList.add("active");
            document.querySelector('#content15').style.transform = 'translateX(' + (-indexValue15 * 14.28) + '%)';
        }
        let contentAux15 = document.querySelectorAll("#content15 img");
        if(contentAux15.length > 0) {
            slideShow15();
            console.log("contentAux15");
        }

        var indexValue16 = 0;
        function slideShow16() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow16, rand);
            const img = document.querySelectorAll("#content16 img");

            img[indexValue16].classList.remove("active");

            indexValue16++;
            if (indexValue16 >= img.length) {
                indexValue16 = 0;
            }

            img[indexValue16].classList.add("active");
            document.querySelector('#content16').style.transform = 'translateX(' + (-indexValue16 * 14.28) + '%)';
        }
        let contentAux16 = document.querySelectorAll("#content16 img");
        if(contentAux16.length > 0) {
            slideShow16();
            console.log("contentAux16");
        }

        var indexValue17 = 0;
        function slideShow17() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow17, rand);
            const img = document.querySelectorAll("#content17 img");

            img[indexValue17].classList.remove("active");

            indexValue17++;
            if (indexValue17 >= img.length) {
                indexValue17 = 0;
            }

            img[indexValue17].classList.add("active");
            document.querySelector('#content17').style.transform = 'translateX(' + (-indexValue17 * 14.28) + '%)';
        }
        let contentAux17 = document.querySelectorAll("#content17 img");
        if(contentAux17.length > 0) {
            slideShow17();
            console.log("contentAux17");
        }

        var indexValue18 = 0;
        function slideShow18() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow18, rand);
            const img = document.querySelectorAll("#content18 img");

            img[indexValue18].classList.remove("active");

            indexValue18++;
            if (indexValue18 >= img.length) {
                indexValue18 = 0;
            }

            img[indexValue18].classList.add("active");
            document.querySelector('#content18').style.transform = 'translateX(' + (-indexValue18 * 14.28) + '%)';
        }
        let contentAux18 = document.querySelectorAll("#content18 img");
        if(contentAux18.length > 0) {
            slideShow18();
            console.log("contentAux18");
        }

        var indexValue19 = 0;
        function slideShow19() {
            let rand = generarNumeroAleatorio();
            setTimeout(slideShow19, rand);
            const img = document.querySelectorAll("#content19 img");

            img[indexValue19].classList.remove("active");

            indexValue19++;
            if (indexValue19 >= img.length) {
                indexValue19 = 0;
            }

            img[indexValue19].classList.add("active");
            document.querySelector('#content19').style.transform = 'translateX(' + (-indexValue19 * 14.28) + '%)';
        }
        let contentAux19 = document.querySelectorAll("#content19 img");
        if(contentAux19.length > 0) {
            slideShow19();
            console.log("contentAux19");
        }



    </script>

</html>

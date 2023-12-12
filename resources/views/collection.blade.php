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
            z-index: -1; /* Un índice de apilamiento más bajo que 0 */
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
            z-index: 1;
        }

        .content::before,
        .content::after {
            content: "";
            position: fixed;
            z-index: 10;
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
            transform: translate(15%, 0%) rotate(-6deg) rotateX(10deg) rotateY(20deg);
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

        function recargarPagina() {
            location.reload();
        }
        // Llamamos a la función de recarga después de 5 minutos
        setTimeout(recargarPagina, 60000);


        // Acceder a la colección y al atributo 'name' en JavaScript
        var photosCollection = @json($photos);


        // Function to fetch image file names from the root folder
        function fetchImageNames() {
            const images = [];
            photosCollection.forEach(function(photo) {
                images.push('images/' + photo.name + '.jpeg');
            });
            return images;
        }


        // Function to generate image elements
        function generateImages(imageNames) {
            const images = [];
            imageNames.forEach((imageName) => {
                const img = document.createElement("img");
                img.src = imageName;
                images.push(img);
            });
            return images;
        }

        // Function to add images to the gallery lines
        function addImagesToGallery(numLines, imagesPerLine) {
            const gallery = document.querySelector(".gallery");
            const allImageNames = fetchImageNames();
            const totalImages = allImageNames.length;
            const imagesPerGalleryLine = Math.ceil(totalImages / numLines);

            for (let i = 0; i < numLines; i++) {
                const galleryLine = document.createElement("div");
                galleryLine.classList.add("gallery_line");

                const startIndex = i * imagesPerGalleryLine;
                const endIndex = Math.min((i + 1) * imagesPerGalleryLine, totalImages);
                const imagesSlice = allImageNames.slice(startIndex, endIndex);
                const images = generateImages(imagesSlice);
                images.forEach((img) => {
                    galleryLine.appendChild(img);
                });

                gallery.appendChild(galleryLine);
            }

            // Function to change all images randomly
            function changeAllImagesRandomlyWithTransition() {
            const allImages = document.querySelectorAll("img");
            const allImageNames = fetchImageNames();

            allImages.forEach(img => {
                const randomIndex = Math.floor(Math.random() * allImageNames.length);
                const newRandomIndex = (randomIndex + 1) % allImageNames.length; // Change the image source index
                img.classList.add('hidden'); // Apply 'hidden' class to initiate the fade-out transition
                setTimeout(() => {
                    img.src = allImageNames[newRandomIndex];
                    img.classList.remove('hidden'); // Remove 'hidden' class to initiate the fade-in transition
                }, 2000); // Adjust this timeout to match the transition duration
            });
        }

            // Change all images randomly with a smooth transition every 40sec seconds
            setInterval(changeAllImagesRandomlyWithTransition, 40000); // Change time interval (milliseconds)
        }

        // Call the function to add lines and images
        addImagesToGallery(6, 20); // Adjust numbers for lines and images per line
    </script>
</body>
</html>
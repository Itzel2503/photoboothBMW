<html>
<head>
    <style>
        .photobooth {
            background: rgb(255, 255, 255);
            margin: 0;
            width: 100%;
            height: 100%;
            display: flex;
            text-align: center;
        }

        .strip {
            display:flex;
        }

        .strip .photo-container {
            display: inline-block;
            margin: 8px 0px 10px 35px;
            text-align: center;
            width: 20%;
        }

        .strip .photo-container img {
            width: 100%;
            height: 50%;
            box-shadow: 10px 5px 9px rgba(0, 0, 0, 0.2);
        }

        .strip .photo-container p {
            margin: 0;
            font-size: 90px;
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
    @livewireStyles
</head>
<body>
    <div class="photobooth">
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

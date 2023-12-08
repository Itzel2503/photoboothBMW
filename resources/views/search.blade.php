<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>
  <div class="z-1 h-full w-full items-center flex justify-center" style="background-color: #b5ccd4;">

    <div class="bg-white z-2 w-10/12 lg:w-2/4 shadow-lg lg:m-auto m-8 rounded-lg p-6 animate animate-slidetopdown ease-out shadow-lg">
      <!-- section one -->
      <section class="">
        <div class="max-w-5xl px-4 mx-auto">
          <div class="flex items-center justify-center text-bmwloyalty">
            <div class="text-center align-middle">
              <div class="flex text-center align-middle items-center justify-center w-full">
                <img src="/img/expo-compliance-week/Compliance_Logo_ES.png" class="w-full" fill="none" />
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Register Qnumber -->
      <section class="w-auto px-3 transform rounded-lg flex flex-col items-center">
          <p class="text-center my-5 text-xl font-bold text-gray-600 text-2xl">Ingresa el número de tu imagen</p>
          <form method="POST" action="search">
              @csrf
              <input name="name" class="text-center shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker focus:ring-2 focus:ring-gray-900 uppercase mb-4" type="text" placeholder="ej. 111111">
              <button type="submit" class="mt-10 w-full max-w-lg px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform rounded-full cursor-pointer" style="background-color: #29a9e1;">BUSCAR</button>
          </form>
      </section>
    </div>
</div>
</body>
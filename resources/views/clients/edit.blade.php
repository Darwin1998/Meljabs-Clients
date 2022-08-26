@extends('layouts.app')

@section('content')
<div class="flex justify-center">

<div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
    <div class="block
    w-full
    px-3
    py-1.5
    text-xl
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    text-center
    rounded
    transition
    ease-in-out
    mb-2
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        <h3>Update Client Details</h3>
    </div>
    @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action=" {{ route('client.update', $client->id) }} " method="POST">
        @csrf
        @method('PATCH')
      <div class="grid grid-cols-2 gap-4">
        <div class="form-group mb-6">
            <label for="first_name" class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding

            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">First Name</label>

            <input value="{{$client->first_name}}" name="first_name"type="text" class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="first_name"
            aria-describedby="emailHelp123" placeholder="First name">
        </div>
        <div class="form-group mb-6">
            <label for="last_name" class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding

            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">Last Name</label>

          <input value="{{$client->last_name}}"name="last_name" type="text" class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="last_name"
            aria-describedby="emailHelp124" placeholder="Last name">
        </div>
      </div>
      <div class="form-group mb-6">
        <label for="installation_date" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding

        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">Installation Date</label>
        <input  name="installation_date" type="date" class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput125"
          >
      </div>
      <div class="form-group mb-6">
        <label for="address" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding

        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">Address</label>
            <select name="address" class="form-control
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            text-gray-700
            bg-white bg-clip-padding
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                <option selected>Choose Barangay</option>
                <option value="Alegria, Bato">Alegria, Bato</option>
                <option value="Alejos, Bato">Alejos, Bato</option>
                <option value="Amagos, Bato">Amagos, Bato</option>
                <option value="Anahawan, Bato">Anahawan, Bato</option>
                <option value="Bago, Bato">Bago, Bato</option>
                <option value="Bagong Bayan District (Poblacion), Bato">Bagong Bayan District (Poblacion), Bato</option>
                <option value="Buli, Bato">Buli, Bato</option>
                <option value="Cebuana, Bato">Cebuana, Bato</option>
                <option value="Daan Lungsod, Bato">Daan Lungsod, Bato</option>
                <option value="Dawahon, Bato">Dawahon, Bato</option>
                <option value="Himamaa, Bato">Himamaa, Bato</option>
                <option value="Dolho, Bato">Dolho, Bato</option>
                <option value="Domagocdoc, Bato">Domagocdoc, Bato</option>
                <option value="Guerrero District (Poblacion), Bato">Guerrero District (Poblacion), Bato</option>
                <option value="Imelda, Bato">Imelda, Bato</option>
                <option value="Iniguihan District (Poblacion), Bato">Iniguihan District (Poblacion), Bato</option>
                <option value="Kalanggaman District (Poblacion), Bato">Kalanggaman District (Poblacion), Bato</option>
                <option value="Katipunan, Bato">Katipunan, Bato</option>
                <option value="Liberty, Bato">Liberty, Bato</option>
                <option value="Mabini, Bato">Mabini, Bato</option>
                <option value="Marcelo, Bato">Marcelo, Bato</option>
                <option value="Naga, Bato">Naga, Bato</option>
                <option value="Osmeña, Bato">Osmeña, Bato</option>
                <option value="Plaridel, Bato">Plaridel, Bato</option>
                <option value="Ponong, Bato">Ponong, Bato</option>
                <option value="Revilla, Bato">Revilla, Bato</option>
                <option value="San Agustin, Bato">San Agustin, Bato</option>
                <option value="Santo Niño, Bato">Santo Niño, Bato</option>
                <option value="Tabunok, Bato">Tabunok, Bato</option>
                <option value="Tagaytay, Bato">Tagaytay, Bato</option>
                <option value="Tinago District (Poblacion), Bato">Tinago District (Poblacion), Bato</option>
                <option value="Tugas, Bato">Tugas, Bato</option>
                <option value="Agutayan, Hilongos">Agutayan, Hilongos</option>
                <option value="Atabay, Hilongos">Atabay, Hilongos</option>
                <option value="Baas, Hilongos">Baas, Hilongos</option>
                <option value="Bagong Lipunan (BLISS), Hilongos">Bagong Lipunan (BLISS), Hilongos</option>
                <option value="Bagumbayan, Hilongos">Bagumbayan, Hilongos</option>
                <option value="Baliw, Hilongos">Baliw, Hilongos</option>
                <option value="Bantigue, Hilongos">Bantigue, Hilongos</option>
                <option value="Bon-ot, Hilongos">Bon-ot, Hilongos</option>
                <option value="Bung-aw, Hilongos">Bung-aw, Hilongos</option>
                <option value="Cacao, Hilongos">Cacao, Hilongos</option>
                <option value="Campina, Hilongos">Campina, Hilongos</option>
                <option value="Cantandog 1, Hilongos">Cantandog 1, Hilongos</option>
                <option value="Cantandog 2, Hilongos">Cantandog 2, Hilongos</option>
                <option value="Concepcion (Makinhas), Hilongos">Concepcion (Makinhas), Hilongos</option>
                <option value="Hampangan, Hilongos">Hampangan, Hilongos</option>
                <option value="Himo-aw, Hilongos">Himo-aw, Hilongos</option>
                <option value="Hitudpan, Hilongos">Hitudpan, Hilongos</option>
                <option value="Imelda Marcos (Pong-on), Hilongos">Imelda Marcos (Pong-on), Hilongos</option>
                <option value="Kang-iras, Hilongos">Kang-iras, Hilongos</option>
                <option value="Kanghaas, Hilongos">Kanghaas, Hilongos</option>
                <option value="Lamak, Hilongos">Lamak, Hilongos</option>
                <option value="Libertad, Hilongos">Libertad, Hilongos</option>
                <option value="Liberty, Hilongos">Liberty, Hilongos</option>
                <option value="Lunang, Hilongos">Lunang, Hilongos</option>
                <option value="Magnangoy, Hilongos">Magnangoy, Hilongos</option>
                <option value="Manaul, Hilongos">Manaul, Hilongos</option>
                <option value="Marangog, Hilongos">Marangog, Hilongos</option>
                <option value="Matapay, Hilongos">Matapay, Hilongos</option>
                <option value="Naval, Hilongos">Naval, Hilongos</option>
                <option value="Owak, Hilongos">Owak, Hilongos</option>
                <option value="Pa-a, Hilongos">Pa-a, Hilongos</option>
                <option value="Central Poblacion (Town Proper), Hilongos">Central Poblacion (Town Proper), Hilongos</option>
                <option value="Eastern Poblacion (Town Proper), Hilongos">Eastern Poblacion (Town Proper), Hilongos</option>
                <option value="Western Poblacion (Town Proper), Hilongos">Western Poblacion (Town Proper), Hilongos</option>
                <option value="Pontod, Hilongos">Pontod, Hilongos</option>
                <option value="Proteccion, Hilongos">Proteccion, Hilongos</option>
                <option value="San Agustin, Hilongos">San Agustin, Hilongos</option>
                <option value="San Antonio, Hilongos">San Antonio, Hilongos</option>
                <option value="San Isidro, Hilongos">San Isidro, Hilongos</option>
                <option value="San Juan, Hilongos">San Juan, Hilongos</option>
                <option value="San Roque (Taganas), Hilongos">San Roque (Taganas), Hilongos</option>
                <option value="Santa Cruz, Hilongos">Santa Cruz, Hilongos</option>
                <option value="Santa Margarita, Hilongos">Santa Margarita, Hilongos</option>
                <option value="Santo Niño, Hilongos">Santo Niño, Hilongos</option>
                <option value="Tabunok, Hilongos">Tabunok, Hilongos</option>
                <option value="Tagnate, Hilongos">Tagnate, Hilongos</option>
                <option value="Talisay, Hilongos">Talisay, Hilongos</option>
                <option value="Tambis, Hilongos">Tambis, Hilongos</option>
                <option value="Tejero, Hilongos">Tejero, Hilongos</option>
                <option value="Tuguipa, Hilongos">Tuguipa, Hilongos</option>
                <option value="Utanan, Hilongos">Utanan, Hilongos</option>
            </select>
      </div>
      <div class="form-group mb-6">
        <label for="amount" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding

        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">Amount</label>
        <input value="{{$client->amount}}" name="amount" type="number" class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput126"
          >
      </div>
      <div class="form-group mb-6">
        <label for="payment_method" class="form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding

        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">Payment Method</label>
        <input value="{{$client->payment_method}}" name="payment_method" type="text" class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput126"
          >
      </div>

      <button type="submit" class="
        w-full
        px-6
        py-2.5
        bg-blue-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-blue-700 hover:shadow-lg
        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-blue-800 active:shadow-lg
        transition
        duration-150
        ease-in-out">Submit</button>
    </form>
  </div>

</div>
@endsection



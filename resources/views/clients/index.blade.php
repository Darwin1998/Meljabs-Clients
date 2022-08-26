@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    {{ session()->get('message')}}
</div>
@endif

@if ($clients->isEmpty())
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
               <p>No Clients </p>
            </div>
            @endif
<div class="flex items-center px-1">
    <a href="{{ route('client.create') }}" class= "flex flex-row item-center justify-center w-[10rem] mr-2 mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
    bg-blue-500 hover:-translate-y-1 hover:scale-110
    hover:bg-indigo-500 duration-300 p-2" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM3 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
      </svg>

     <p>Add New</p>
</a>
<a href="{{ route('client.deleted') }}" class= "flex flex-row item-center justify-center w-[14rem] mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
    bg-red-500 p-2" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
    </svg>


     <p>Deleted Clients</p>
</a>


<form class="flex flex-row items-center" action="{{ route("client.search") }}"   method="GET">
    @csrf
    <label for="simple-search" class="sr-only">Search </label>
    <div class="relative w-full">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input type="text"
               name="search"
               id="simple-search"
               class="bg-gray-50 border border-gray-300
                      text-gray-900 text-sm
                      rounded-lg focus:ring-blue-500
                      focus:border-blue-500 block
                      w-80 pl-10 p-2.5 ml-2 mr-2
                      dark:bg-gray-700 dark:border-gray-600
                      dark:placeholder-gray-400 dark:text-white
                      dark:focus:ring-blue-500 dark:focus:border-blue-500"
               placeholder="Search Client Name" required="" wire:model.debounce.350ms = "search">
    </div>
    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        <span class="sr-only">Search</span>
    </button>
</form>

</div>


<div class="overflow-x-auto relative">
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Id
                </th>
                <th scope="col" class="py-3 px-6">
                    First Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Last Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Address
                </th>
                <th scope="col" class="py-3 px-6">
                    Payment Method
                </th>
                <th scope="col" class="py-3 px-6">
                    Installation Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Amount
                </th>
                <th scope="col" class="py-3 px-10">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($clients as $client)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-3 px-5">
                    {{$client->id}}
                </td>
                <td class="py-3 px-5">
                    {{$client->first_name}}
                </td>
                <td class="py-3 px-5">
                    {{$client->last_name}}
                </td>
                <td class="py-3 px-5">
                    {{$client->address}}
                </td>
                <td class="py-3 px-5">
                    {{$client->payment_method}}
                </td>
                <td class="py-3 px-5">
                    {{date( 'F j, Y' , strtotime($client->installation_date))}}
                </td>
                <td class="py-3 px-5">
                    {{$client->amount}}
                </td>
                <td class="py-3 px-5">

                    <div class="flex items-center px-2">
                        <a href="{{ route('client.show', $client->id) }}" class= "flex flex-row item-center justify-center w-[5rem] px-2 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
                        bg-green-500 hover:-translate-y-1 hover:scale-110
                        hover:bg-indigo-500 duration-300 p-2" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                          <p>View</p>
                        </a>

                    </div>


                </td>


            </tr>
            @endforeach


        </tbody>


    </table>

    <div class="mt-5">
        {{ $clients->links() }}
    </div>
</div>

@endsection


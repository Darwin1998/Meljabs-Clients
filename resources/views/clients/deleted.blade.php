@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    {{ session()->get('message')}}
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

            @if ($clients->isEmpty())
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <h1>No clients deleted</h1>
            </div>
            @else
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
                            <a href="{{ route('client.restore', $client->id) }}" class= "flex flex-row item-center justify-center w-[5rem] px-2 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
                            bg-green-500 hover:-translate-y-1 hover:scale-110
                            hover:bg-indigo-500 duration-300 p-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p>Restore</p>
                            </a>

                        </div>


                    </td>


                </tr>
                @endforeach
            @endif



        </tbody>


    </table>

    <div class="mt-5">
        {{ $clients->links() }}
    </div>
</div>

@endsection


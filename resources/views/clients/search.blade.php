@extends('layouts.app')

@section('content')


@if(session()->has('message'))
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    {{ session()->get('message')}}
</div>
@endif


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
            @foreach ($client as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-3 px-5">
                    {{$item->id}}
                </td>
                <td class="py-3 px-5">
                    {{$item->first_name}}
                </td>
                <td class="py-3 px-5">
                    {{$item->last_name}}
                </td>
                <td class="py-3 px-5">
                    {{$item->address}}
                </td>
                <td class="py-3 px-5">
                    {{$item->payment_method}}
                </td>
                <td class="py-3 px-5">
                    {{date( 'F j, Y' , strtotime($item->installation_date))}}
                </td>
                <td class="py-3 px-5">
                    {{$item->amount}}
                </td>
                <td class="py-3 px-5">

                    <div class="flex items-center px-2">
                        <a href="{{ route('client.show', $item->id) }}" class= "flex flex-row item-center justify-center w-[5rem] px-2 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
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


</div>
@endsection


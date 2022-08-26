@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    {{ session()->get('message')}}
</div>
@endif

<h1 class="text-center">Client Details</h1>

<div class="overflow-x-auto relative">
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-5">
                    Id
                </th>
                <th scope="col" class="py-3 px-5">
                    First Name
                </th>
                <th scope="col" class="py-3 px-5">
                    Last Name
                </th>
                <th scope="col" class="py-3 px-5">
                    Address
                </th>
                <th scope="col" class="py-3 px-5">
                    Payment Method
                </th>
                <th scope="col" class="py-3 px-5">
                    Installation Date
                </th>
                <th scope="col" class="py-3 px-5">
                    Amount
                </th>
                <th scope="col" class="py-3 px-16">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>

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

                        <a href="{{ route('client.edit', $client->id) }}" class= "flex flex-row item-center justify-center w-[3rem] mr-2 px-2 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
                            bg-yellow-500 hover:-translate-y-1 hover:scale-110
                            hover:bg-indigo-500 duration-300 p-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                        <form action="{{ route('client.destroy', $client->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="flex flex-row item-center justify-center w-[3rem] px-2 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
                            bg-red-500 hover:-translate-y-1 hover:scale-110
                            hover:bg-indigo-500 duration-300 p-2" onclick=" return confirm('Are you sure you want to delete this record?') ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>

                            </button>
                        </form>
                    </div>


                </td>


            </tr>



        </tbody>


    </table>


</div>

<h1 class="text-center mt-5">Payment Details</h1>
<div class="overflow-x-auto relative ">
    <table class="w-full text-lg text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Amount
                </th>
                <th scope="col" class="py-3 px-6">
                    Received By
                </th>
                <th scope="col" class="py-3 px-6">
                    Payment Method
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>

                <th scope="col" class="py-3 px-12">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($payments->isEmpty())
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                No payments made
            </div>
            @else
                @foreach ($payments as $payment)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-3 px-5">
                        {{$payment->id}}
                    </td>
                    <td class="py-3 px-5">
                        {{date( 'F j, Y' , strtotime($payment->date))}}
                    </td>
                    <td class="py-3 px-5">
                        {{$payment->amount}}
                    </td>
                    <td class="py-3 px-5">
                        {{$payment->received_by}}
                    </td>
                    <td class="py-3 px-5">
                        {{$payment->payment_mode}}
                    </td>
                    <td class="py-3 px-5">
                        {{$payment->status}}
                    </td>

                    <td class="py-3 px-5">

                        <div class="flex items-center px-1">

                            <a href="{{ route('payment.edit', $payment->id) }}" class= "flex flex-row item-center justify-center w-[10rem] px-3 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
                                bg-yellow-500 hover:-translate-y-1 hover:scale-110
                                hover:bg-indigo-500 duration-300 p-2" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                <p>Update</p>
                            </a>

                        </div>


                    </td>


                </tr>
                @endforeach
            @endif



        </tbody>


    </table>


</div>
@endsection


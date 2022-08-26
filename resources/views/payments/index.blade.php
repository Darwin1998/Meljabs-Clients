@extends('layouts.app')

@section('content')


<h1 class="text-center">Payments</h1>
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
                            <a href="{{ route('payment.create', $client->id) }}" class= "flex flex-row item-center justify-center w-[10rem] px-2 text-black mb-2 rounded-lg space-x-2 transition ease-in-out delay-150
                            bg-green-500 hover:-translate-y-1 hover:scale-110
                            hover:bg-indigo-500 duration-300 p-2" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>

                            <p>Payment</p>
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

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
     @if ($clients->isEmpty())
                toastr.info("No clients found")

     @endif

    @if(Session::has('success'))

        toastr.success("{{ Session::get('success')}}")
    @endif

    @if(Session::has('error'))

        toastr.info("{{ Session::get('error')}}")
    @endif
</script>

@endsection


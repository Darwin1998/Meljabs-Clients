<?php

namespace App\Http\Controllers;


use App\Models\Payment;
use App\Models\Client;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('clients')
        ->where('deleted_at',null)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('payments.index', compact('clients'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        return view('payments.create', [
            'client' => $client
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $data = $request->validate([

            'date' => 'required',
            'amount' => 'numeric|required',
            'status' => 'required',
            'received_by' => 'required',
            'payment_mode' => 'required'
        ]);


        $client->payments()->create($data);

        return redirect()->route('payment.index')->with('message', $client->first_name.' paid successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);

        return view('payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentsRequest  $request
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(Payment $payment)
    {
        $data = request()->validate([
            'date' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
            'payment_mode' => 'required',
            'received_by' => 'required'

        ]);


        $payment->update($data);
        return redirect()->route('client.show', $payment->client_id)->with('message','Payment Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payments)
    {
        //
    }
}

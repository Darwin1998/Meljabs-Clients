<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ClientController extends Controller
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
        return view('clients.index', compact('clients'));
    }

    public function deleted_index()
    {


        return view('clients.deleted',[
            'clients' => Client::onlyTrashed()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function edit($clientId)
    {
        return view('clients.edit', [
            'client' => Client::findOrFail($clientId)
        ]);
    }

    public function search_client(Request $request)
    {


        $client = null;
        $q = $request->search;


        if($request->filled('search'))
        {
            if(Client::where('address', '=', $q)->where('first_name', '=', $q)->where('last_name', '=', $q)->where('status', '=', $q)->exists())
            {


                $client = Client::where('address','LIKE','%'.$q.'%')
                                ->where('first_name','LIKE','%'.$q.'%')
                                ->where('last_name','LIKE','%'.$q.'%')
                                ->where('status','LIKE','%'.$q.'%')
                                ->get();


                return view('clients.search',['client'=> $client]);
            }

            // else if(Client::where('first_name', '=', $q)->exists())
            // {
            //     $client = Client::where('first_name','LIKE','%'.$q.'%')->get();
            //     return view('clients.search',['client'=> $client]);

            // }
            else
            {
                return redirect()->route('client.index')->with('message', 'Clients not found');

            }


        }




    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(Request $request)
    {


        $client = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'installation_date' => 'required',
            'payment_method' => 'required',
            'address' => 'required',
            'amount' => 'required|numeric',

        ]);


        Client::create($client);
        return redirect()->route('client.index')
                         ->with('message','Client Added!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($clientId)
    {
      $client = Client::findOrFail($clientId);

      $payments = $client->payments()
                         ->where('client_id', $clientId)
                         ->orderBy('created_at','desc')
                         ->paginate(10);



     return view('clients.show', compact('client','payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {



        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'installation_date' => 'required',
            'payment_method' => 'required',
            'address' => 'required',
            'amount' => 'required|numeric',

        ]);


        $client->update($data);
        return redirect()->route('client.show', $client->id)->with('message','Client Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('message', 'Client Deleted!');
    }

    public function restore($clientId)
    {
        Client::withTrashed()->find($clientId)->restore();

        return redirect()->route('client.index')->with('message', 'Client Restored');
    }
}

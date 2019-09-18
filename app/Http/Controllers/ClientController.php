<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'asc')
        ->paginate(10);

        return view('clients.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');

    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $allClients = DB::table('clients')->get();
            $clients = DB::table('clients')
                ->where('first_name','LIKE','%'.$request->search."%")
                ->where('last_name','LIKE','%'.$request->search."%")
                ->get();

            if($clients) {
                foreach ($clients as $key => $client) {
                    $output.='<tr>'.
                    '<td>' . $client->id .'</td>'.
                    '<td>' . $client->first_name . ' ' . $client->last_name .'</td>'.
                    '<td><a href="mailto:' . $client->email . '">' . $client->email .'</a></td>'.
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="clients/'. $client->id .'">Show</a>
                                <a class="dropdown-item" href="clients/edit/'. $client->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            } else {
                foreach ($allClients as $client) {
                    $output .= '<tr>' .
                    '<td>' . $client->id . '</td>' .
                    '<td>' . $client->first_name . ' ' . $client->last_name . '</td>' .
                    '<td><a href="mailto:' . $client->email . '">' . $client->email . '</a></td>' .
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="clients/'. $client->id .'">Show</a>
                                <a class="dropdown-item" href="clients/edit/'. $client->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            }

            return Response($output);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @param  \App\Client  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $request, Client $model)
    {
        $validated = $request->validated();

        $client = new Client;
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->company_name = $request->input('company_name');
        $client->email = $request->input('email');
        $client->street = $request->input('street');
        $client->number = $request->input('number');
        $client->box = $request->input('box');
        $client->postal_code = $request->input('postal_code');
        $client->city = $request->input('city');
        $client->phone = $request->input('phone');
        $client->mobile = $request->input('mobile');
        $client->type = $request->input('type');
        $client->save();

        return redirect()->route('clients.index')->withStatus(__('De klant werd succesvol aangemaakt.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);

        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);

        return view('clients.edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->company_name = $request->input('company_name');
        $client->email = $request->input('email');
        $client->street = $request->input('street');
        $client->number = $request->input('number');
        $client->box = $request->input('box');
        $client->postal_code = $request->input('postal_code');
        $client->city = $request->input('city');
        $client->phone = $request->input('phone');
        $client->mobile = $request->input('mobile');
        $client->type = $request->input('type');
        $client->save();

        return redirect()->route('clients.index')->withStatus(__('De klant werd succesvol aangepast.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('clients.index')->withStatus(__('De klant werd verwijderd.'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use Illuminate\Http\Request;
use App\Client;
use App\Offer;
use Carbon\Carbon;
use DB;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::orderBy('id', 'asc')
            ->paginate(10);

        return view('offers.index')->with('offers', $offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();

        return view('offers.create')->with('clients', $clients);
    }

    public function search(Request $request)
    {
        if($request->ajax()) {
            $output = "";
            $allOffers = DB::table('offers')->get();
            $offers = DB::table('offers')
                ->leftJoin('clients', 'offers.client_id', '=', 'clients.id')
                ->select('')
                ->where('first_name','LIKE','%'.$request->search."%")
                ->where('last_name','LIKE','%'.$request->search."%")
                ->where('number','LIKE','%'.$request->search."%")
                ->get();
            dump($offers);die;

            if($offers) {
                foreach ($offers as $key => $offer) {
                    $output.='<tr>'.
                    '<td>' . $offer->number .'</td>'.
                    '<td>' . $offer->date .'</td>'.
                    '<td>' . $offer->client->first_name . ' ' . $offer->client->last_name .'</td>'.
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="offers/'. $offer->id .'">Show</a>
                                <a class="dropdown-item" href="offers/edit/'. $offer->id .'">Edit</a>
                            </div>
                        </div>
                    </td>' .
                    '</tr>';
                }
            } else {
                foreach ($allOffers as $offer) {
                    $output .= '<tr>' .
                    '<td>' . $offer->number . '</td>' .
                    '<td>' . $offer->date . '</td>' .
                    '<td>' . $offer->client->first_name . ' ' . $offer->client->last_name . '</td>' .
                    '<td class="text-right">
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="offer/'. $offer->id .'">Show</a>
                                <a class="dropdown-item" href="offer/edit/'. $offer->id .'">Edit</a>
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request, Offer $model)
    {
        $validated = $request->validated();

        $offer = new Offer;
        $offer->client_id = $request->input('client_id');
        $offer->date = $request->input('date');
        $offer->remarks = (!empty($request->input('remarks'))) ? $request->input('remarks') : '';
        $offer->status = \Config::get('constants.offer_statuses.Nieuw');
        $this->getNumberValue($offer);
        $offer->save();

        return redirect()->route('offers.index')->withStatus(__('De offerte werd succesvol aangemaakt.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = Offer::find($id);

        return view('offers.show')->with('offer', $offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::find($id);
        $clients = Client::all();
        view()->share('clients', $clients);

        return view('offers.edit')->with('offer', $offer);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getNumberValue($offer)
    {
        $maxNumberValue = Offer::max('number');
        if ($maxNumberValue == null) {
            $offer->number_value = 1;
            $offer->number = sprintf('%0d%04d', Carbon::now()->format('y'), $offer->number_value);
        } else {
            $offer->number_value = $maxNumberValue + 1;
            $offer->number = sprintf('%0d%04d', Carbon::now()->format('y'), $offer->number_value);
        }
    }
}

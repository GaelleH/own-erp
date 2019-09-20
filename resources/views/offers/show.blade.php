@extends('layouts.app', ['page' => 'Offertes', 'pageSlug' => 'offers'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ 'Offerte gegevens' }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('offers.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ 'Offerte #' }}{{ $offer->number }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-date">{{ 'Datum' }}</label>
                                        <div>{{ $offer->date }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-client">{{ 'Klant' }}</label>
                                        <div>{{ $offer->client->first_name }} {{ $offer->client->last_name }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-remarks">{{ 'Opmerkingen' }}</label>
                                <div>{{ $offer->remarks }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

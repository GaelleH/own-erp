@extends('layouts.app', ['page' => 'Klanten', 'pageSlug' => 'clients'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ 'Klant gegevens' }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ 'Klant' }} {{ $client->first_name }} {{ $client->last_name }}</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first_name">{{ 'Voornaam' }}</label>
                                        <div>{{ $client->first_name }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">{{ 'Naam' }}</label>
                                        <div>{{ $client->last_name }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">{{ 'Bedrijfsnaam' }}</label>
                                <div>{{ $client->company_name }}</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ 'Email' }}</label>
                                <div>{{ $client->email }}</div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-street">{{ 'Straat' }}</label>
                                        <div>{{ $client->street }}</div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-number">{{ 'Nummer' }}</label>
                                        <div>{{ $client->number }}</div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-box">{{ 'Bus' }}</label>
                                        <div>{{ $client->box }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-postal_code">{{ 'Postcode' }}</label>
                                        <div>{{ $client->postal_code }}</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-city">{{ 'Gemeente' }}</label>
                                        <div>{{ $client->city }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-phone">{{ 'Telefoonnummer' }}</label>
                                        <div>{{ $client->phone }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-mobile">{{ 'Gsmnummer' }}</label>
                                        <div>{{ $client->mobile }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

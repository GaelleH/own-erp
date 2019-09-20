@extends('layouts.app', ['page' => 'Offertes', 'pageSlug' => 'offers'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ 'Offertes' }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('offers.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('offers.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ 'offerte' }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-date">{{ 'Datum' }}</label>
                                            <input type="date" name="date" id="input-date" class="form-control form-control-alternative{{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="{{ 'Datum' }}" value="{{ old('date') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'date'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('client_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-client-id">{{ 'Klant' }}</label>
                                            <select name="client_id" id="client_id" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ 'Naam' }}" value="{{ old('last_name') }}" autofocus>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'client_id'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-remarks">{{ 'Opmerkingen' }}</label>
                                    <textarea name="remarks" id="input-remarks" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ 'Opmerkingen' }}" value="{{ old('remarks') }}" autofocus></textarea>
                                    @include('alerts.feedback', ['field' => 'remarks'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ 'Opslaan' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

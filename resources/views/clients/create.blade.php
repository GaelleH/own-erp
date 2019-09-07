@extends('layouts.app', ['page' => 'Klanten', 'pageSlug' => 'clients'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ 'Klanten' }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('clients.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ 'Klant' }}</h6>
                            <div class="pl-lg-4">
                                @foreach(Config::get('constants.client_types') as $key => $clientType)
                                    <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                        <input class="form-check-input" type="radio" name="type" id="type" value="{{ $key }}" checked>
                                        <label class="form-check-label" for="type">{{ $clientType }}</label>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ 'Voornaam' }}</label>
                                            <input type="text" name="first_name" id="input-first-name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ 'Voornaam' }}" value="{{ old('first_name') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'first_name'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ 'Naam' }}</label>
                                            <input type="text" name="last_name" id="input-last-name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ 'Naam' }}" value="{{ old('last_name') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'last_name'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ 'Bedrijfsnaam' }}</label>
                                    <input type="text" name="company_name" id="input-company-name" class="form-control form-control-alternative{{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ 'Bedrijfsnaam' }}" value="{{ old('company_name') }}" autofocus>
                                    @include('alerts.feedback', ['field' => 'company_name'])
                                </div>
                                
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ 'Email' }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ 'Email' }}" value="{{ old('email') }}" required>
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-street">{{ 'Straat' }}</label>
                                            <input type="text" name="street" id="input-street" class="form-control form-control-alternative{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ 'Straat' }}" value="{{ old('street') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'street'])
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-number">{{ 'Nummer' }}</label>
                                            <input type="text" name="number" id="input-number" class="form-control form-control-alternative{{ $errors->has('number') ? ' is-invalid' : '' }}" placeholder="{{ 'Nummer' }}" value="{{ old('number') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'number'])
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('box') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-box">{{ 'Bus' }}</label>
                                            <input type="text" name="box" id="input-box" class="form-control form-control-alternative{{ $errors->has('box') ? ' is-invalid' : '' }}" placeholder="{{ 'Bus' }}" value="{{ old('box') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'box'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-postal_code">{{ 'Postcode' }}</label>
                                            <input type="text" name="postal_code" id="input-postal_code" class="form-control form-control-alternative{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="{{ 'Postcode' }}" value="{{ old('postal_code') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'postal_code'])
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-city">{{ 'Gemeente' }}</label>
                                            <input type="text" name="city" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ 'Gemeente' }}" value="{{ old('city') }}" required autofocus>
                                            @include('alerts.feedback', ['field' => 'city'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-phone">{{ 'Telefoonnummer' }}</label>
                                            <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ 'Telefoonnummer' }}" value="{{ old('phone') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'phone'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-mobile">{{ 'Gsmnummer' }}</label>
                                            <input type="text" name="mobile" id="input-mobile" class="form-control form-control-alternative{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="{{ 'Gsmnummer' }}" value="{{ old('mobile') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'mobile'])
                                        </div>
                                    </div>
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

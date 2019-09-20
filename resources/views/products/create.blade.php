@extends('layouts.app', ['page' => 'Producten', 'pageSlug' => 'products'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ 'Producten' }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ 'Product' }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ 'Naam' }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ 'Naam' }}" value="{{ old('name') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('sale_price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-sale-price">{{ 'Verkoopprijs' }}</label>
                                            <input type="number" name="sale_price" id="input-sale-price" class="form-control form-control-alternative{{ $errors->has('sale_price') ? ' is-invalid' : '' }}" placeholder="{{ 'Verkoopprijs' }}" value="{{ old('sale_price') }}" autofocus>
                                            @include('alerts.feedback', ['field' => 'sale_price'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-description">{{ 'Omschrijving' }}</label>
                                            <textarea name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ 'Omschrijving' }}" value="{{ old('description') }}" autofocus></textarea>
                                            @include('alerts.feedback', ['field' => 'description'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-remarks">{{ 'Opmerkingen' }}</label>
                                            <textarea name="remarks" id="input-remarks" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ 'Opmerkingen' }}" value="{{ old('remarks') }}" autofocus></textarea>
                                            @include('alerts.feedback', ['field' => 'remarks'])
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

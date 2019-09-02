@extends('layouts.app', ['page' => 'User Management', 'pageSlug' => 'users'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ 'User Management' }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ 'User informatie' }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">{{ 'Naam' }}</label>
                                <div>{{ $user->name }}</div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ 'Email' }}</label>
                                <div>{{ $user->email }}</div>
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

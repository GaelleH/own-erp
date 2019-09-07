@extends('layouts.app', ['page' => __('Klanten'), 'pageSlug' => 'clients'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ 'Klanten' }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('clients.create') }}" class="btn btn-sm btn-primary">{{ 'Voeg een klant toe' }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                <div class="form-group">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search"></input>
                </div>

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">{{ 'ID' }}</th>
                            <th scope="col">{{ 'Naam' }}</th>
                            <th scope="col">{{ 'Type' }}</th>
                            <th scope="col">{{ 'Email' }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->id }}</td>
                                    <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                                    <td>{{ Config::get('constants.client_types.' . $client->type) }}</td>
                                    <td>
                                        <a href="mailto:{{ $client->email }}">{{ $client->email }}</a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('clients.show', $client) }}">{{ 'Show' }}</a>
                                                <a class="dropdown-item" href="{{ route('clients.edit', $client) }}">{{ 'Edit' }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">
                    {{ $clients->links() }}
                </nav>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection

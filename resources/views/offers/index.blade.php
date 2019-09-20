@extends('layouts.app', ['page' => __('Offertes'), 'pageSlug' => 'offers'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{ 'Offertes' }}</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('offers.create') }}" class="btn btn-sm btn-primary">{{ 'Voeg een offerte toe' }}</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('alerts.success')

                {{-- <div class="form-group">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search"></input>
                </div> --}}

                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <th scope="col">{{ 'Nummer' }}</th>
                            <th scope="col">{{ 'Datum' }}</th>
                            <th scope="col">{{ 'Naam' }}</th>
                            <th scope="col">{{ 'Status' }}</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td>{{ '#' . $offer->number }}</td>
                                    <td>{{ $offer->date }}</td>
                                    <td>{{ $offer->client->first_name }} {{ $offer->client->last_name }}</td>
                                    <td>{{ Config::get('constants.offer_status_values.' . $offer->status) }}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('offers.show', $offer) }}">{{ 'Show' }}</a>
                                                <a class="dropdown-item" href="{{ route('offers.edit', $offer) }}">{{ 'Edit' }}</a>
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
                    {{ $offers->links() }}
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
            url : '{{URL::to('search-offer')}}',
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

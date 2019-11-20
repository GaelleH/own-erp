@extends('layouts.app', ['page' => 'Offertes', 'pageSlug' => 'offers'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <form method="post" action="{{ route('offers.update', $offer) }}" autocomplete="off">
                        @csrf
                        @method('put')
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ 'Offerte #' . $offer->number }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">{{ 'Terug' }}</a>
                                </div>
                            </div>
                            <br>
                            <div class="row align-items-center">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#information" role="tab" data-toggle="tab">Informatie</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#profile" role="tab" data-toggle="tab">Producten</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#messages" role="tab" data-toggle="tab">Messages</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="information">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="heading-small text-muted mb-4">{{ 'details' }}</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-date">{{ 'Datum' }}</label>
                                                    <input type="date" name="date" id="input-date" class="form-control form-control-alternative{{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="{{ 'Datum' }}" value="{{ old('date', $offer->date) }}" autofocus>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                                    <label class="form-control-label" for="input-remarks">{{ 'Opmerkingen' }}</label>
                                                    <textarea name="remarks" id="input-remarks" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ 'Opmerkingen' }}" value="{{ old('remarks', $offer->remarks) }}" autofocus></textarea>
                                                    @include('alerts.feedback', ['field' => 'date'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="heading-small text-muted mb-4">{{ 'Producten' }}</h6>
                                    <div class="pl-lg-4">
                                        <div class="table-responsive">  
                                            <table class="table" id="dynamic_field">  
                                                <?php $count = 0; ?>
                                                <thead>
                                                    <th class="col-4">{{ 'Product' }}</th>
                                                    <th class="col-1">{{ 'Hoeveelheid' }}</th>
                                                    <th class="col-4">{{ 'Opmerkingen' }}</th>
                                                    <th class="col-1"></th>
                                                </thead>
                                                <tbody>
                                                    <tr class="products-<?= $count ?>">  
                                                        <td>
                                                            <select name="product_id" id="rows[<?= $count ?>][product_id]" class="product form-control date_list">
                                                                @foreach($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }} - €{{ $product->sale_price }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>  
                                                        <td><input type="number" name="rows[<?= $count ?>][amount]" class="form-control date_list" placeholder="0"/></td>  
                                                        <td><input type="text" name="rows[<?= $count ?>][remarks]" class="form-control date_list"/></td>  
                                                        <td><button type="button" name="add" id="add" class="btn btn-primary"><i class="tim-icons icon-simple-add"></i></button></td>  
                                                    </tr>  
                                                    <?php $count++; ?>
                                                </tbody>
                                            </table>  
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Opslaan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">3</div>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-success">{{ 'Opslaan' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <?php dump($count)?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript">
        var count = <?= $count ?>;

        $(function () {
            $('#myTab li:first-child a').tab('show')
        });

        $('.product').on('click',function(){
            $value = $(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('get-product')}}',
                data:{'product':$value},
                success:function(data){
                    console.log(data);

                    // document.getElementById("row[" + count + "][sale_price]").value = data;
                    // $('tr.products-' + count + ' .row[' + count + '][sale_price]"]').val(data);
                    // $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection

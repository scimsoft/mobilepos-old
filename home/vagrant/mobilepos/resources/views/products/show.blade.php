@extends('products.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->NAME }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                @if(isset($product->IMAGE))
                    <img width="96px" height="96px" src="{{ 'data:image/png;base64,' . base64_encode($product->IMAGE) }}" />
                @else

                @endif
                <br>
                <strong>Price</strong>
                {{ number_format($product->PRICESELL *1.1,2)}}

            </div>
        </div>
    </div>
@endsection
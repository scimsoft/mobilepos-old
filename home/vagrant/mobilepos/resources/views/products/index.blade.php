@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="/products" method="GET" >
    <select class="form-control" id='categoryid' name ="categoryid" onchange="this.form.submit()">

        <option value="0">Please Select Category</option>
        @foreach($categories as $category)
            <option value="{{$category->ID}}">{{$category->NAME}}</option>
        @endforeach
    </select>
    </form>
    <table class="table table-bordered">
        <tr>
            <th>No</th>

            <th>Name</th>
            <th>price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    @if(isset($product->IMAGE))
                        <img  height="96px" src="{{ 'data:image/png;base64,' . base64_encode($product->IMAGE) }}" />
                    @else

                    @endif

                </td>

                <td>{{ $product->NAME }}</td>
                <td>{{ number_format($product->PRICESELL *1.1,2)}} €</td>

                <td>
                    <form action="{{ route('products.destroy',$product->ID) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show',$product->ID) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('products.edit',$product->ID) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
    <script >

            document.getElementById("categoryid").value = '{{$categoryid}}';

    </script>

@endsection
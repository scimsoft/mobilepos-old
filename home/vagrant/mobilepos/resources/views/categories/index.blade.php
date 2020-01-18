@extends('categories.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New $category</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>

            <th>Name</th>
            <th>Texttip</th>
            <th>price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>
                    @if(isset($category->IMAGE))
                        <img width="96px" height="96px" src="{{ 'data:image/png;base64,' . base64_encode($category->IMAGE) }}" />
                    @else

                    @endif

                </td>

                <td>{{ $category->NAME }}</td>
                <td>{{ $category->TEXTTIP }}</td>
                <td>{{ number_format($category->PRICESELL *1.1,2)}} €</td>

                <td>
                    <form action="{{ route('categories.destroy',$category->ID) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('categories.show',$category->ID) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('categories.edit',$category->ID) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $categories->links() !!}

@endsection
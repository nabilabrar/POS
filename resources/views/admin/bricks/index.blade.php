@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Brick Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">brick</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Brick Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('brick.create') }}"> Create New Info</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-header">
                    <h3 class="card-title">
                        Brick LISTS
                    </h3>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Serial</th>
                        <th>Mil Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Pay</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($bricks as $brick)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $brick->milpartyName->name }}</td>
                            <td>{{ $brick->date }}</td>
                            <td>{{ $brick->brick_amount }}</td>
                            <td>{{ $brick->payable }}</td>
                            <td>
                                <form action="{{ route('brick.destroy', $brick) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('brick.edit', $brick) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    {!! $bricks->links() !!}

@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid col-xs-7 col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Rows</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rows as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->date->format('Y-m-d')}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $rows->links() }}
            </div>
        </div>
    </div>
@endsection

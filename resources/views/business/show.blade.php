@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                @if (count($business) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Current Tasks
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Business</th>
                                <th>New Position</th>
                                </thead>
                                <tbody>
                                @foreach ($business as $businesses)
                                    <tr>
                                        <td class="table-text"><div>{{ $businesses->businessName }}</div></td>
                                        <td class="table-text"><div><a class="button" href="{{ url('positions/create/'.$businesses->id) }}">New</a></div></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
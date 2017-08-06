@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                @if (count($business) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Employers
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Employer Name</th>
                                </thead>
                                <tbody>
                                @foreach ($business as $businesses)
                                    <tr>
                                        <td class="table-text"><div><a class="button" href="{{ url('business/show/'.$businesses->id) }}">{{ $businesses->businessName }}</a></div></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
            <a href="/business/create">Add Employer</a>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                @if (count($positions) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Current Tasks
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Credible?</th>
                                <th>Business</th>
                                <th>Position</th>
                                <th>Screening</th>
                                </thead>
                                <tbody>
                                @foreach ($positions as $position)
                                    @if (auth::guest)
                                        <tr>
                                            <td class="table-text">
                                                <div>
                                                    <form action="{{ url('positions/vote/' .$position->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button id="vote" type="submit" class="btn btn-default" title="Login to vote" disabled>
                                                            <i class="fa fa-btn fa-thumbs-o-up"></i>
                                                        </button>
                                                    </form>
                                                    {{ $position->rating }}
                                                </div>
                                            </td>
                                            <td class="table-text"><div>{{ $position->businessName }}</div></td>
                                            <td class="table-text"><div>{{ $position->positionName }}</div></td>
                                            @if ($position->screening == 1)
                                                <td class="table-text"><div>Yes</div></td>
                                            @else <td class="table-text"><div>No</div></td>
                                            @endif
                                        </tr>
                                    @else
                                    <tr>
                                        <td class="table-text">
                                            <div>
                                                <form action="{{ url('positions/vote/' .$position->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fa fa-btn fa-thumbs-o-up"></i>
                                                    </button>
                                                </form>
                                                {{ $position->rating }}
                                            </div>
                                        </td>
                                        <td class="table-text"><div>{{ $position->businessName }}</div></td>
                                        <td class="table-text"><div>{{ $position->positionName }}</div></td>
                                        @if ($position->screening == 1)
                                        <td class="table-text"><div>Yes</div></td>
                                        @else <td class="table-text"><div>No</div></td>
                                        @endif
                                    </tr>
                                    @endif
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
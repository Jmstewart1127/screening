@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                @if (count($business) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @foreach($business as $businesses)
                                <h3>{{ $businesses->businessName }}</h3>
                        </div>

                        <div class="panel-body">
                            <table class="table table-striped task-table">
                                <thead>
                                <th>Rating</th>
                                <th>Position</th>
                                <th>Screening?</th>
                                </thead>
                                <tbody>
                                @foreach ($positions as $position)
                                        <tr>
                                            <td><form action="{{ url('positions/vote/' .$position->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fa fa-btn fa-thumbs-o-up"></i>
                                                </button>
                                            </form>{{ $position->rating }}</div></td>
                                            <td class="table-text"><div>{{ $position->positionName }}</div></td>
                                            @if ($position->screening == 0)
                                                <td class="table-text"><div>No</div></td>
                                            @else
                                                <td class="table-text"><div>Yes</div></td>
                                            @endif
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <form action="{{ url('positions/create/'.$businesses->id) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="task-name" class="col-sm-6 control-label">Position Name</label>

                    <div class="col-sm-6">
                        <input type="text" name="positionName" id="task-name" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="task-name" class="col-sm-6 control-label">Screening Required?</label>
                </div>

                <div class="radio form-group">
                    <label for="task-name" class="col-sm-8 control-label"><input type="radio" name="screening" id="task-name" class="form-control" value="true">Yes</label>
                </div>

                <div class="radio form-group">
                    <label for="task-name" class="col-sm-8 control-label"><input type="radio" name="screening" id="task-name" class="form-control" value="false" checked>No</label>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-6 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>Add
                        </button>
                    </div>
                </div>

            </form>
            @endforeach
            @endif
        </div>
    </div>
@endsection


{{--<label for="task-name" class="col-sm-6 control-label">--}}
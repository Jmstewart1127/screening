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
                                <th>Position</th>
                                <th>Screening?</th>
                                </thead>
                                <tbody>
                                @foreach ($positions as $position)
                                        <tr>
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
                    <label for="task-name" class="col-sm-3 control-label">Position</label>

                    <div class="col-sm-6">
                        <input type="text" name="positionName" id="task-name" class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Screening Required?</label>
                </div>

                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Yes</label>

                    <div class="col-sm-6">
                        <input type="radio" name="screening" id="task-name" class="form-control" value="true">
                    </div>
                </div>

                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">No</label>

                    <div class="col-sm-6">
                        <input type="radio" name="screening" id="task-name" class="form-control" value="false" checked>
                    </div>
                </div>

                <!-- Add Task Button -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
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
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                    <form action="/positions/create/" method="POST" class="form-horizontal">
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
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->

        </div>
    </div>
@endsection
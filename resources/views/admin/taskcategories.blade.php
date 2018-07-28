@extends('admin.master')
@section('content')
    @include('admin.scripts.addtaskcategory')

<div class="row">
    <div class="col-sm-4">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    {{ _('New Task Category group') }}
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/taskcategories/addtaskcategorygroup') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="groupname">Group Name</label>
                        <input id="groupname" type="text" class="form-control{{ $errors->has('groupname') ? ' is-invalid' : '' }}" name="groupname"
                            value="{{ old('groupname') }}" required/> @if ($errors->has('groupname'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('groupname') }}</strong>
                        </span> @endif
                    </div>

                    <div class="form-group">
                        <label for="groupdescription">Group Description</label>
                        <input id="groupdescription" type="text" class="form-control{{ $errors->has('groupdescription') ? ' is-invalid' : '' }}"
                            name="groupdescription" value="{{ old('groupdescription') }}" required/>                        @if ($errors->has('groupdescription'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('groupdescription') }}</strong>
                        </span> @endif
                    </div>

                    <div class="form-group">
                        <label for="groupimage">Group Image</label>
                        <input id="groupimage" type="file" class="form-control{{ $errors->has('groupimage') ? ' is-invalid' : '' }}" name="groupimage"
                            value="{{ old('groupimage') }}" required/> @if ($errors->has('groupimage'))
                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('groupimage') }}</strong>
                                            </span> @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="addtaskcategory">
                            {{ __('Add Task Category Group') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card ">
            <div class="card-header ">

                <h4 class="card-title">
                    {{ _('New Task Category') }}
                </h4>

            </div>
            <div class="card-body ">

                <form action="{{ url('/admin/taskcategories/addtaskcategory') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- <input type="hidden" name="token" id="token" value="{{ csrf_token() }}"> --}}

                    <div class="form-group">
                        <select name="task_category_group_id" id="task_category_group_id" class="form-control{{ $errors->has('task_category_group_id') ? ' is-invalid' : '' }}">
                            <option value="0">Please Select a Grouping</option>

                            @foreach ($taskcategorygroups as $taskcategorygroup)
                            <option value="{{ $taskcategorygroup->id }}">{{ $taskcategorygroup->groupname }}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('task_category_group_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('task_category_group_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="taskname">Task Name</label>
                        <input id="taskname" type="text" class="form-control{{ $errors->has('taskname') ? ' is-invalid' : '' }}" name="taskname"
                            value="{{ old('taskname') }}" required/> @if ($errors->has('taskname'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('taskname') }}</strong>
                                </span> @endif
                    </div>

                    <div class="form-group">
                        <label for="taskdescription">Task Description</label>
                        <textarea id="taskdescription" type="text" class="form-control{{ $errors->has('taskdescription') ? ' is-invalid' : '' }}"
                            name="taskdescription" required value="{{ old('taskdescription') }}"></textarea>                        @if ($errors->has('taskdescription'))
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('taskdescription') }}</strong>
                                </span> @endif
                    </div>

                    <div class="form-group">
                        <label for="taskimage">Group Name</label>
                        <input id="taskimage" type="file" class="form-control{{ $errors->has('taskimage') ? ' is-invalid' : '' }}" name="taskimage"
                            value="{{ old('taskimage') }}" /> @if ($errors->has('taskimage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('taskimage') }}</strong>
                        </span> @endif
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="addtaskcategory">
                                {{ __('Add Task Category') }}
                            </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <!--- Listing of all the task categories available so far --->
    <div class="col-sm-8">
        <div class="card ">
            <div class="card-header ">

                <h4 class="card-title">
                    {{ _('Available Categories') }}
                </h4>

            </div>
            <div class="card-body table-full-width table-responsive" id="availablecategories">



            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
        $(document).ready(function(){

                var auto_refresh = setInterval(
                function(){
                    $("#availablecategories").load('<?php echo url('/admin/taskcategories/availablecategories'); ?>').fadeIn("slow");
                }, 1000);


            });

    </script>
@stop

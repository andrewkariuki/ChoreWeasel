@extends('layouts.app')
@section('content')
<div class="container" class="">
        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon" style="padding: 5px; background:darkgray; ">
                            {{-- <span class="glyphicon glyphicon-calendar"> --}}
                                <i class="fa fa-calendar"></i>
                            {{-- </span> --}}
                        </span>
                    </div>
                </div>
            </div>

        </div>
</div>


<table id="table_id" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Email</th>
            <th>Verified</th>
            <th>Banned</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->secondname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->verified }}</td>
            <td>{{ $user->banned }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
@section('scripts')
<script type="text/javascript" >
    $(document).ready( function () {
        $('#table_id').DataTable({
            "scrollY": 200,
            "scrollX": true,
            dom: 'Bfrtip',
            buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
            ]
        });
    } );

    $(function () {
        $(function () {
            $('#datetimepicker1').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                minDate: new Date()
            });
        });

    });
</script>

@stop

@extends('admin.master')
@section('styles')

@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h4 class="card-title">Tasks Database</h4>
                    <p class="card-category">Listing of All Tasks</p>
                </div>

            </div>


            <div class="card-body table-full-width table-responsive">

                <table id="taskstable" class="table table-hover">
                    <thead>
                        <th>Task Name</th>
                        <th class="hidden-xs">Date & Time</th>
                        <th class="hidden-xs">Assigned By</th>
                        <th class="hidden-xs">Assigned To</th>
                        <th>Location</th>
                        <th>Rates</th>
                        <th class="hidden-xs">Completed</th>
                        <th>Completed At</th>
                        <th>Hours Worked</th>
                        <th>Total Payable</th>
                        <th>Total Paid</th>
                    </thead>
                    <tbody>
                        @foreach ($alltasks as $alltask)
                        <tr>
                            <td>{{ $alltask->taskcategory->taskname }}</td>
                            <td>{{ $alltask->task_date_time }}</td>
                            <td>{{ $alltask->assigner->firstname }} {{ $alltask->assigner->secondname }}</td>
                            <td>{{ $alltask->assignee->firstname }} {{ $alltask->assignee->firstname }}</td>
                            <td>{{ $alltask->city_town  }}, {{ $alltask->locality_street  }}</td>
                            <td>{{ $alltask->rates  }}</td>
                            <td>
                                @if ($alltask->completed == false)
                                    N/A
                                @else
                                <div class="badge badge-green text-uppercase p-1">
                                    Completed
                                </div>
                                @endif
                            </td>
                            <td>
                                @if ($alltask->completed_at == null)
                                    N/A
                                @else
                                    {{ $alltask->completed_at }}
                                @endif

                            </td>
                            <td>
                                @if ($alltask->hours_worked == null)
                                    N/A
                                @else
                                    {{ $alltask->hours_worked }}
                                @endif

                            </td>
                            <td>
                                @if ($alltask->total_payable == null)
                                    N/A
                                @else
                                    {{ $alltask->total_payable }}
                                @endif
                            </td>
                            <td>
                                @if ($alltask->paid == false)
                                    N/A
                                @else
                                <div class="badge badge-green text-uppercase p-1">
                                    Paid
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#taskstable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
@stop

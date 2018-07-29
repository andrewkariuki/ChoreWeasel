@extends('admin.master')
@section('styles')

@stop

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-inline-block">
                        <h4 class="card-title">Disputes Database</h4>
                        <p class="card-category">Listing of All Disputes</p>
                    </div>

                </div>


                <div class="card-body table-full-width table-responsive">

                    <table id="disputestable" class="table table-hover">
                        <thead>
                            <th>Date</th>
                            <th>Diputed Task</th>
                            <th>Diputer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($disputes as $dispute)
                            <tr>
                                <td>{{ $dispute->created_at }}</td>
                                <td>{{ $dispute->assigned_task_id }}</td>
                                <td>{{ $dispute->disputer->firstname }} {{ $dispute->disputer->secondname }}</td>
                                <td>
                                    @if ($dispute->solved == false)
                                    <div class="badge badge-danger text-uppercase p-1">
                                        Unsolved
                                    </div>
                                    @else
                                    <div class="badge badge-success text-uppercase p-1">
                                        Solved
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('admin/dispute/'.$dispute->id) }}" data-toggle="tooltip" title="Show">
                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                        <span class="hidden-xs hidden-sm" style="display: inline-block">View</span>
                                    </a>
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
        $('#disputestable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
@stop

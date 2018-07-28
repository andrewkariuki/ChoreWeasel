@extends('admin.master')
@section('styles')
<link href="{{ asset('css/userlisting.css') }}" rel="stylesheet">
@stop


@section('scripts')
<script>
    $(document).ready(function() {
        $('#taskerstable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
@stop


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-inline-block">
                    <h4 class="card-title">Taskers Database</h4>
                    <p class="card-category">Listing of alltaskers</p>
                </div>

            </div>


            <div class="card-body table-full-width table-responsive">

                <table id="taskerstable" class="table table-hover">
                    <thead>
                        <th class="hidden-xs">Full Name</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs">National Id</th>
                        <th>Postal Address</th>
                        <th class="hidden-xs">Location</th>
                        <th>Status</th>
                        <th></th>
                        <th>Registration Dates</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($taskers as $user)
                        <tr>
                            <td>{{ $user -> firstname }} {{ $user -> secondname }}</td>
                            <td class="hidden-xs"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{ $user->profile->nationalid }}</td>
                            <td>{{ $user->profile->postaladdress }}, {{ $user->profile->postalcode }}</td>
                            <td>{{ $user->profile->city }}, {{ $user->profile->locality }}</td>
                            <td>
                                @if ($user->verified==0)
                                <div class="badge badge-danger text-uppercase p-1">
                                    not verified
                                </div>
                                @else
                                <div class="badge badge-success text-uppercase p-1">
                                    Verified
                                </div>
                                @endif

                            </td>
                            <td>
                                @if ($user->banned==0)
                                <div class="badge badge-success text-uppercase p-1">
                                    active
                                </div>
                                @else
                                <div class="badge badge-danger text-uppercase p-1">
                                    banned
                                </div>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('Y/m/d') }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('admin/tasker/'.$user->name) }}" data-toggle="tooltip" title="Show">
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
</div>
@endsection


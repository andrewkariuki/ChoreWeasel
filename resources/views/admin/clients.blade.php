@extends('admin.master')


@section('scripts')
<script>
    $(document).ready(function() {
        $('#clientstable').DataTable( {
            "scrollY": 200,
            "scrollX": true
        } );
    } );
</script>
@stop


@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Clients Database</h4>
                    <p class="card-category">Listing of all clients</p>
                </div>

                {{--  class="table table-hover table-striped"  --}}

                <div class="card-body table-full-width table-responsive">
                    <table id="clientstable"  class="table table-hover">
                        <thead>
                            <th>First Name</th>
                            <th>second Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th></th>
                            <th>Location</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $user)
                                <tr>
                                    <td>{{ $user -> firstname }}</td>
                                    <td>{{ $user -> secondname }}</td>
                                    <td>
                                        <a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a>
                                    </td>
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
                                    <td>{{ $user->profile->city }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ url('admin/client/'.$user->name) }}" data-toggle="tooltip" title="Show">
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

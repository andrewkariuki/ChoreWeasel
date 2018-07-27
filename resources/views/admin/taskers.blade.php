@extends('admin.master')
@section('styles')
<link href="{{ asset('css/userlisting.css') }}" rel="stylesheet">
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
                <div class="table-action">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="export-excel">
                                <form action="">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Export to Excel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="search">
                                <div class="input-group">
                                    <input name="search" id="search" type="text" class="form-control" placeholder="search...">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <table id="taskerstable " class="table table-hover">
                    <thead>
                        <th>Username</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs">First Name</th>
                        <th class="hidden-xs">Last Name</th>
                        <th>Status</th>
                        <th></th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($taskers as $user)
                        <tr>
                            <td>{{ $user -> name }}</td>
                            <td class="hidden-xs"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{ $user -> firstname }}</td>
                            <td>{{ $user -> secondname }}</td>
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

@section('scripts')
<script>
    $(document).ready(function() {
        $('taskerstable').DataTable( {
            "scrollY": 200,
            "scrollX": true
        } );
    } );

</script>



































































@stop

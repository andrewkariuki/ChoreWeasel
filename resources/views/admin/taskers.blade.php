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
                <table id="taskerstable " class="table table-striped table-hover table-condensed data-table" style="width:100% ">
                    <thead>
                        <th>Username</th>
                        <th class="hidden-xs">Email</th>
                        <th class="hidden-xs">First Name</th>
                        <th class="hidden-xs">Last Name</th>
                        <th>Verified</th>
                        <th>Banned</th>
                        <th>Actions</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($taskers as $user)
                        <tr>
                            <td>{{ $user -> name }}</td>
                            <td class="hidden-xs"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{ $user -> firstname }}</td>
                            <td>{{ $user -> secondname }}</td>
                            <td class="text-center">
                                <span class="verified indicator align-self-center"></span>
                            </td>
                            <td class="text-center">
                                <span class="banned indicator align-self-center"></span>
                            </td>
                            <td>
                                <form action="">
                                    <button class="btn btn-success btn-sm">
                                        Verify
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="">
                                    <button class="btn btn-success btn-sm">
                                        Ban
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('admin/tasker/'.$user->name) }}" data-toggle="tooltip" title="Show">
                                    <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm" class="display: inline-block">Show</span><span class="hidden-xs hidden-sm hidden-md"> User</span>
                                </a>
                            </td>
                            <td>
                                <form action="">
                                    <button class="btn btn-success btn-sm">
                                        Delete
                                    </button>
                                </form>
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

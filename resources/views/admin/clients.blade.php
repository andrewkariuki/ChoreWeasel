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
                    <table id="clientstable"  class="display" style="width:100%">
                        <thead>
                            <th>First Name</th>
                            <th>second Name</th>
                            <th>Email</th>
                            <th>Verified</th>
                            <th>Status</th>
                            <th>Task Category</th>
                            <th>Rates</th>
                            <th>Location</th>
                        </thead>
                        <tbody>
                            @foreach ($clients as $user)
                                <tr>
                                    <td>{{ $user -> firstname }}</td>
                                    <td>{{ $user -> secondname }}</td>
                                    <td>{{ $user -> email }}</td>
                                    <td>
                                        @if ($user -> verified==0)
                                            not verified
                                        @else
                                            verified
                                        @endif

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $user->profile->city }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

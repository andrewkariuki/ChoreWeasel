@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Admins Database</h4>
                    <p class="card-category">Listing of all admins</p>
                </div>

                <div class="card-body table-full-width table-responsive">
                    <table id="adminstable" class="table table-hover table-striped" style="width:100%">
                        <thead>
                            <th>First Name</th>
                            <th>second Name</th>
                            <th>Email</th>
                            <th>Verified</th>
                        </thead>
                        <tbody>
                            @foreach ($admins as $user)
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
            $('#adminstable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
@stop

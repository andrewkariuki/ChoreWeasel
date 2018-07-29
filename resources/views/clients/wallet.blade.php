@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/wallet.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/light-bootstrap-dashboard.css?v=2.0.1') }}" rel="stylesheet">
<link href="{{ asset('dashboard/css/demo.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jqc-1.12.4/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.css"/>
@stop
@section('content')

<div class="cw-container">
    <div class="cw-container_content">
        <div class="row">

            <div class="col-sm-9 m-auto transactions">
                <div class="transactions_container">
                    <div class="trasactions_header">
                        <div class="transactions_header-main">
                            Transactions
                        </div>

                    </div>
                </div>

                <div class="transactions_body">
                    @if($transactions != null)
                    <div class="transactions">
                        <table class="table table-hover" id="transactionstable">
                            <thead>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction )
                                <tr>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>Paid - {{ $transaction->paidto->firstname }} {{ $transaction->paidto->secondname }} on task </td>
                                    <td>${{ $transaction->amount_paid }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="empty-transactions">
                        <h3>Looks like you have no transactions</h3>
                        <p>You will be able to find your transactions here.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jqc-1.12.4/jszip-2.5.0/dt-1.10.18/af-2.3.0/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#transactionstable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            { extend:'copy', attr: { id: 'allan' } }, 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
@stop

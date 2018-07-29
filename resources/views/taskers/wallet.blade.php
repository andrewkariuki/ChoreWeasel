@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/wallet.css') }}" rel="stylesheet">
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
                                <th>Balance</th>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction )
                                <tr>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>${{ $transaction->amount_paid }}</td>
                                    <td></td>
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

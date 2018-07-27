@extends('layouts.usermaster')
@section('styles')
<link href="{{ asset('css/wallet.css') }}" rel="stylesheet">
@stop
@section('content')

<div class="cw-container">
    <div class="cw-container_content">
        <div class="row">
            <div class="col-sm-4 payments">
                <div class="wallet-cta">
                    <div class="wallet-cta-top">

                        <div class="deposit">
                            <h4>Deposit</h4>
                            <div class="grey-text text-thin">
                                funds to Wallet
                            </div>

                            <div class="deposit-button">
                                <!-- Button to trigger deposit funds modal -->
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#depositFunds">Deposit funds</button>
                            </div>
                        </div>

                        <div class="withdraw">
                            <h4>Withdraw</h4>
                            <div class="grey-text text-thin">
                                funds from Wallet
                            </div>

                            <div class="withrawal-form">
                                <form action="">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-sm-7">
                                                <input id="withdrawal-amount" type="text" class="form-control" placeholder="Amount">
                                            </div>
                                            <div class="col-sm-5">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block withdraw">Withdraw</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <!-- Button trigger give a review modal -->
                            <!--
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#giveAReview">
                                Launch demo modal
                                </button> -->


                        </div>

                    </div>

                    <h3>Payment methods</h3>

                    <div class="add-payment">
                        <div class="payment-methods text-center">
                            <p>You have no payment method yet.</p>

                            <div class="add-payment-button">
                                <!-- Button to trigger add payment method modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPaymentMethod">Add payment method</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- start of add payments method Modal -->
            <div class="modal fade" id="depositFunds" tabindex="-1" role="dialog" aria-labelledby="depositFundsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="depositFundsTitle">
                                Deposit funds
                                <span>to wallet</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-group">
                                    <input id="deposit-amount" type="text" class="form-control" placeholder="Deposit Amount">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="depositfunds" id="depositfunds" class="btn btn-primary btn-lg btn-block">Deposit Funds</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end of add payments method modal -->



            <!-- start of add payments method Modal -->
            <div class="modal fade" id="addPaymentMethod" tabindex="-1" role="dialog" aria-labelledby="addPaymentMethodTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPaymentMethodTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-group">
                                    <input id="withdrawal-amount" type="text" class="form-control" placeholder="Amount">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end of add payments method modal -->













            <!-- start of give a review Modal -->
            <div class="modal fade" id="giveAReview" tabindex="-1" role="dialog" aria-labelledby="giveAReviewTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="giveAReviewTitle">
                                Review this task and Tasker
                                <span>to wallet</span>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>
                        <div class="modal-body">
                            <div class="give-a-review-cta">
                                By giving a review you better a tasker changes of getting a job.
                            </div>
                            <form action="">
                                <div class="form-group">
                                    <label class="label" for="ratings">Give a rating</label>
                                    <select name="ratings" id="ratings" class="form-control">
                                                <option value="0">Ratings</option>
                                                <option value="1">1 star rating</option>
                                                <option value="1">2 star rating</option>
                                                <option value="1">3 star rating</option>
                                                <option value="1">4 star rating</option>
                                                <option value="1">5 star rating</option>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <textarea id="deposit-amount" type="text" class="form-control" placeholder="Give Your review" cols="20" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="depositfunds" id="depositfunds" class="btn btn-primary btn-lg btn-block">Deposit Funds</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end of give a review modal -->




            <div class="col-sm-8 transactions">
                <div class="transactions_container">
                    <div class="trasactions_header">
                        <div class="transactions_header-main">
                            Transactions
                        </div>

                    </div>
                </div>

                <div class="transactions_body">
                    @if($clienttransactions != null)
                    <div class="transactions">
                        <table class="table table-hover">
                            <thead>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Balance</th>
                            </thead>
                            <tbody>
                                @foreach ($clienttransactions as $clienttransaction )
                                <tr>
                                    <td>{{ $clienttransaction->created_at }}</td>
                                    <td></td>
                                    <td></td>
                                    <td>${{ $clienttransaction->amount_paid }}</td>
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

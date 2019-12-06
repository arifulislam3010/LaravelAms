@extends('layouts.main')

@section('title', 'Payment Made')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Payment Made</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Made Number</th>
                                        <th>Vendor Name</th>
                                        <th>Bill#</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <th>Unused Amount</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment Made Number</th>
                                        <th>Vendor Name</th>
                                        <th>Bill#</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <th>Unused Amount</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach($payment_mades as $payment_made)
                                        <tr>
                                            <td>{{ $payment_made->payment_date }}</td>
                                            <td>PM-{{ $payment_made->pm_number }}</td>
                                            <td>{{ $payment_made->customer->first_name }} {{ $payment_made->customer->last_name }}</td>
                                            <td>
                                                @foreach($payment_made->paymentMadeEntries as $payment_made_entry)
                                                    {{ $payment_made_entry->bill->bill_number }}
                                                    <br>
                                                @endforeach

                                            </td>
                                            <td>{{ $payment_made->paymentMode->mode_name }}</td>
                                            <td>BDT {{ $payment_made->amount }}</td>
                                            <td>BDT {{ $payment_made->excess_amount }}</td>
                                            <td class="uk-text-center">
                                                <a href="{{ route('payment_made_show', ['id' => $payment_made->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i></a>
                                                <a href="{{ route('payment_made_edit', ['id' => $payment_made->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="payment_made_id" value="{{ $payment_made->id }}">
                                                <a href="{!! route('payment_made_send_view',$payment_made->id) !!}"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('payment_made_create') }}" class="md-fab md-fab-accent branch-create">
                                    <i class="material-icons">&#xE145;</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_btn').click(function () {
            var id = $(this).next('.payment_made_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this! If you delete this invoice all record will be deleted related to this invoice",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/payment-made/delete/"+id;
            })
        })
    </script>
@endsection

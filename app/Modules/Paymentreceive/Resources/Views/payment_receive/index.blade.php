@extends('layouts.main')

@section('title', 'Payment Received')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Payment Received</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment</th>
                                        <th>Type</th>
                                        <th>Reference</th>
                                        <th>Customer</th>
                                        <th>Invoice#</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <th>Unused Amount</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Payment</th>
                                        <th>Type</th>
                                        <th>Reference</th>
                                        <th>Customer</th>
                                        <th>Invoice#</th>
                                        <th>Mode</th>
                                        <th>Amount</th>
                                        <th>Unused Amount</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @foreach($paymentreceives as $data)
                                        <tr>
                                            <td>{{$data->updated_at->format('d-m-Y')}}</td>
                                            <td>PR-{{$data->pr_number}}</td>
                                            <td>Invoice Payment</td>
                                            <td>{{$data->reference}}</td>
                                            <td>{{$data->paymentContact->display_name}}</td>
                                            <td>
                                            @foreach($data->PaymentReceiveEntryData as $PREData)
                                                @foreach($invoice as $invoiceData)
                                                @if($PREData->invoice_id == $invoiceData->id)
                                               {{ str_pad($invoiceData->invoice_number, 6, '0', STR_PAD_LEFT) }}</br>
                                                @endif
                                                @endforeach
                                            @endforeach

                                            </td>
                                            <td>
                                            {{$data->PaymentMode->mode_name}}    
                                            </td>
                                            <td>BDT {{$data->amount}}</td>
                                            <td>
                                                @if(isset($data->excess_payment))
                                                <?php $amount = $data->excess_payment;?>
                                                BDT <?php echo number_format((float)$amount, 2, '.', '');?>
                                                @else
                                                BDT 00.00
                                                @endif
                                            </td>
                                            <td class="uk-text-center">
                                                <a href="{{ route('payment_received_show', ['id' => $data->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i></a>
                                                <a href="{{ route('payment_received_edit', ['id' => $data->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="delete_btn" href="{{ route('payment_received_delete', ['id' => $data->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <a href="{!! route('payment_receive_send_view',$data->id) !!}"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('payment_received_create',['id'=>0]) }}" class="md-fab md-fab-accent branch-create">
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

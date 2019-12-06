@extends('layouts.invoice')

@section('title', 'Payment Received')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-2-10 hidden-print uk-visible-large">
                <div class="md-list-outside-wrapper">
                    <ul class="md-list md-list-outside">

                        <li class="heading_list">Recent Payments</li>
                        @foreach($paymentreceives as $data)
                        @if($data->id == $paymentreceive->id)
                        <?php $active_class = 'md-list-item-active'?>
                        @else
                         <?php $active_class = ''?>
                        @endif
                        <li class="{{$active_class}}">
                            <a href="{{ route('payment_received_show', ['id' => $data->id]) }}" class="md-list-content" type="button">
                            <span class="md-list-heading uk-text-truncate">{{$data->paymentContact->display_name}}</br>
                            <span class="uk-text-small uk-text-muted">{{$data->updated_at->format('d-m-Y')}}</span>
                            </span>
                            <span class="uk-text-small uk-text-muted">
                                @foreach($data->PaymentReceiveEntryData as $PREData)
                                    @foreach($invoice as $invoiceData)
                                    @if($PREData->invoice_id == $invoiceData->id)
                                    {{$invoiceData->invoice_number}} 
                                    @endif
                                    @endforeach
                                @endforeach
                            </span>
                            </a>
                        </li>


                        @endforeach
                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="{{route('payment_received')}}">See All</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="uk-width-large-8-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            <li>
                                                <a href="{{ route('payment_received_edit', ['id' => $paymentreceive->id]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a href="#">Email</a>
                                            </li>
                                            <li>
                                                <a href="#">Attach File</a>
                                            </li>
                                            <li>
                                                <a href="#">Use Credits</a>
                                            </li>
                                            <li>
                                                <a class="uk-text-danger" href="{{ route('payment_received_delete', ['id' => $paymentreceive->id]) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 301px;">
                            <div class="uk-grid" data-uk-grid-margin style="text-align: center;">
                                <h1 style="width: 100%; text-align: center;"><img style="text-align: center;" class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/> {{ $OrganizationProfile->company_name }}</h1>
                            </div>
                            <div class="" style="text-align: center;">
                               
                                <p>{{ $OrganizationProfile->street }},{{ $OrganizationProfile->city }},{{ $OrganizationProfile->state }},{{ $OrganizationProfile->country }}</p>
                               
                                <p style="margin-top: -17px;">{{ $OrganizationProfile->email }},{{ $OrganizationProfile->contact_number }}</p>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                
                                <div class="uk-width-5-5" style="font-size: 12px;">
                                    <div class="uk-grid">
                                        <h2 style="text-align: center; width: 90%;" class="">PAYMENT RECEIPT</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># PR-{{ str_pad($paymentreceive->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Bill To:</span>
                                        <address>
                                            <p><strong>{{ $paymentreceive->paymentContact->display_name }}</strong></p>
                                            <p>{{ $paymentreceive->paymentContact->company_name }},{{ $paymentreceive->paymentContact->phone_number_1 }}</p>
                                            <p>Billing Address-{{ $paymentreceive->paymentContact->billing_street }},{{ $paymentreceive->paymentContact->billing_city }},{{ $paymentreceive->paymentContact->billing_state }},{{ $paymentreceive->paymentContact->billing_zip_code }},{{ $paymentreceive->paymentContact->billing_country }}</p>
                                            <p>Shipping address-{{ $paymentreceive->paymentContact->shipping_street }},{{ $paymentreceive->paymentContact->shipping_city }},{{ $paymentreceive->paymentContact->shipping_state }},{{ $paymentreceive->paymentContact->shipping_zip_code }},{{ $paymentreceive->paymentContact->shipping_country }}</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-grid uk-margin-top uk-margin-medium-bottom">
                                        <p style="text-align: right; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove">Amount Received</p>
                                        <h2 style="text-align: right; width: 90%;" class="">
                                            <?php $amount = $paymentreceive->amount;?>
                                                BDT <?php echo number_format((float)$amount, 2, '.', '');?>
                                        </h2>
                                    </div>
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Payment Date :</td>
                                            <td class="uk-text-right no-border-bottom">{{$paymentreceive->updated_at->format('d-m-Y')}}</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Reference Number :</td>
                                            <td class="uk-text-right no-border-bottom">{{$paymentreceive->reference}}</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Payment Mode :</td>
                                            <td class="uk-text-right no-border-bottom">{{$paymentreceive->PaymentMode->mode_name}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Over payment:</span>
                                        <address>
                                            <p><strong>{{$paymentreceive->excess_payment}}</strong></p>
                                        </address>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-grid uk-margin-large-bottom" style="font-size: 12px;">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Invoice Number</th>
                                            <th>Invoice Date</th>
                                            <th>Invoice Amount </th>
                                            <th>Payment Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($paymentreceive->PaymentReceiveEntryData as $PREData)
                                        @foreach($invoice as $invoiceData)
                                        @if($PREData->invoice_id == $invoiceData->id)
                                        <tr class="uk-table-middle">
                                            <td> INV-{{ str_pad($invoiceData->invoice_number, 6, '0', STR_PAD_LEFT) }}</td>
                                            <td>{{$invoiceData->updated_at->format('d-m-Y')}}</td>
                                            <td>{{$invoiceData->total_amount}}</td>
                                            <td>{{$PREData->amount}}</td>
                                        </tr>

                                        @endif
                                        @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2" style="text-align: left">
                                    <p class="uk-text-small uk-margin-bottom">Customer Signature</p>
                                </div>
                                <div class="uk-width-1-2" style="text-align: right">
                                    <p class="uk-text-small uk-margin-bottom">Company Representative</p>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">
                                    <p class="uk-text-small uk-margin-bottom">Looking forward for your business.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden-print">
                    <div class="uk-margin-large-top">
                        <h2 class="heading_b">More Information</h2>
                    </div>

                    @if($paymentreceive->file_url)
                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"><a href="{{route('payment_received_download', ['id' => $paymentreceive->id])}}">Attachment(s) added</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Deposit To :</td>
                                            <td class="uk-text-right no-border-bottom">{{$paymentreceive->account->account_name}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-margin-top">
                        <h2 class="heading_b">Payment History</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Date</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="uk-table-middle">
                                            <td>{{$paymentreceive->updated_at->format('d-m-Y')}}</td>
                                            <td>Payment of amount <?php $amount = $paymentreceive->amount;?>
                                                BDT <?php echo number_format((float)$amount, 2, '.', '');?> received and applied for 
                                                @foreach($paymentreceive->PaymentReceiveEntryData as $PREData)
                                                @foreach($invoice as $invoiceData)
                                                @if($PREData->invoice_id == $invoiceData->id)
                                                {{$invoiceData->invoice_number}} 
                                                @endif
                                                @endforeach
                                                @endforeach
                                                 by {{$paymentreceive->updatedBy->name}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

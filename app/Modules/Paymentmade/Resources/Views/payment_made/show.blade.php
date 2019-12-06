@extends('layouts.invoice')

@section('title', 'Payment Made')

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

                        <li class="heading_list">Recent Payment Made</li>
                        @foreach($payment_mades as $payment_made_data)
                        <li class="">
                            <a href="" class="md-list-content" type="button">
                            <span class="md-list-heading uk-text-truncate">{{ $payment_made_data->customer->display_name }}</br>
                            <span class="uk-text-small uk-text-muted">{{ $payment_made_data->payment_date }}</span>
                            </span>
                            </a>
                        </li>
                        @endforeach
                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="{{ route('payment_made') }}">See All</a>
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
                                                <a href="{{ route('payment_made_edit', ['id' => $payment_made->id]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="uk-text-danger" href="{{ route('payment_made_delete', ['id' => $payment_made->id]) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">#PR-0001</h3>
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
                                        <h2 style="text-align: center; width: 90%;" class="">PAYMENT MADE</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># PM-{{ str_pad($payment_made->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                
                            </div>
                           
                           
                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Bill To:</span>
                                        <address>
                                            <p><strong>{{ $payment_made->customer->display_name }}</strong></p>
                                            <p>{{ $payment_made->customer->company_name }},{{ $payment_made->customer->phone_number_1 }}</p>
                                            <p>Billing Address-{{ $payment_made->customer->billing_street }},{{ $payment_made->customer->billing_city }},{{ $payment_made->customer->billing_state }},{{ $payment_made->customer->billing_zip_code }},{{ $payment_made->customer->billing_country }}</p>
                                            <p>Shipping address-{{ $payment_made->customer->shipping_street }},{{ $payment_made->customer->shipping_city }},{{ $payment_made->customer->shipping_state }},{{ $payment_made->customer->shipping_zip_code }},{{ $payment_made->customer->shipping_country }}</p>
                                        </address>
                                    </div>
                                </div>
                                 <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-grid uk-margin-top uk-margin-medium-bottom">
                                        <p style="text-align: right; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove">Amount Received</p>
                                        <h2 style="text-align: right; width: 90%;" class="">
                                                BDT {{ $payment_made->amount }}
                                        </h2>
                                    </div>
                                     <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Payment Date :</td>
                                            <td class="uk-text-right no-border-bottom">{{ $payment_made->payment_date }}</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Reference Number :</td>
                                            <td class="uk-text-right no-border-bottom">{{ $payment_made->reference }}</td>
                                        </tr>

                                        @if($payment_made->account_id == 4)
                                            @if($payment_made->invoice_show == "on")
                                                <tr class="uk-table-middle">
                                                    <td class="no-border-bottom">Paid Through :</td>
                                                    <td class="uk-text-right no-border-bottom">Check({{ $payment_made->bank_info }})</td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom">Paid Through :</td>
                                                <td class="uk-text-right no-border-bottom">{{ $payment_made->account->account_name }}</td>
                                            </tr>
                                        @endif

                                    </table>
                                </div>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Over payment:</span>
                                        <address>
                                            <p><strong>{{ $payment_made->excess_amount }}</strong></p>
                                        </address>
                                    </div>
                                </div>
                            </div>

                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>Bill Number</th>
                                            <th>Bill Date</th>
                                            <th>Bill Amount </th>
                                            <th>Payment Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payment_made_entries as $payment_made_entry)
                                            <tr class="uk-table-middle">
                                                <td>{{ $payment_made_entry->bill->bill_number }}</td>
                                                <td>{{ $payment_made_entry->bill->bill_date }}</td>
                                                <td>{{ $payment_made_entry->bill->amount }}</td>
                                                <td>{{ $payment_made_entry->amount }}</td>
                                            </tr>
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

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"><a href="">Attachment(s) added</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Deposit To :</td>
                                            <td class="uk-text-right no-border-bottom">Account Name</td>
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
                                            <td>12-june 2017</td>
                                            <td>Payment of amount</td>
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

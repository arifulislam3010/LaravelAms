@extends('layouts.invoice')

@section('title', 'Credit Notes')

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

                        <li class="heading_list">Recent Invoices</li>

                        @foreach($credit_notes as $credit_note_data)
                        <li>
                            <a href="{{ route('credit_note_show', ['id' => $credit_note_data->id]) }}" class="md-list-content">
                                <span class="md-list-heading uk-text-truncate">
                                    {{ $credit_note_data->credit_note_number }} 
                                    <span class="uk-text-small uk-text-muted">({{ $credit_note_data->created_at->format('d M') }})</span>
                                </span>
                            </a>
                        </li>
                        @endforeach

                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="{{ route('credit_note') }}">See All</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="uk-width-large-6-10">
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
                                                <a href="#">Edit</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('credit_note_refund_create', ['id' => $credit_note->id]) }}">Refund</a>
                                            </li>
                                            <li>
                                                <a class="uk-text-danger" href="#">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">#CN-{{ $credit_note->credit_note_number }}</h3>
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
                                        <h2 style="text-align: center; width: 90%;" class="">CREDIT NOTE</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># CN-{{ str_pad($credit_note->credit_note_number, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    
                                    <div class="uk-margin-bottom">
                                        <span class="uk-text-muted uk-text-small uk-text-italic">Bill To:</span>
                                        <address>
                                            <p><strong>{{ $credit_note->customer->display_name }}</strong></p>
                                            <p>{{ $credit_note->customer->company_name }},{{ $credit_note->customer->phone_number_1 }}</p>
                                            <p>Billing Address-{{ $credit_note->customer->billing_street }},{{ $credit_note->customer->billing_city }},{{ $credit_note->customer->billing_state }},{{ $credit_note->customer->billing_zip_code }},{{ $credit_note->customer->billing_country }}</p>
                                            <p>Shipping address-{{ $credit_note->customer->shipping_street }},{{ $credit_note->customer->shipping_city }},{{ $credit_note->customer->shipping_state }},{{ $credit_note->customer->shipping_zip_code }},{{ $credit_note->customer->shipping_country }}</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-2">
                                    <table class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom">Credit Date :</td>
                                            <td class="uk-text-right no-border-bottom">{{ $credit_note->created_at->format('d M, Y') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Item</th>
                                            <th class="uk-text-right">Qty</th>
                                            <th class="uk-text-right">Rate</th>
                                            <th class="uk-text-right">Discount(%)</th>
                                            <th class="uk-text-right">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($credit_note_entries as $credit_note_entry)
                                            <tr class="uk-table-middle">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $credit_note_entry->item->item_name }}</td>
                                                <td class="uk-text-right">{{ $credit_note_entry->quantity }}</td>
                                                <td class="uk-text-right">{{ $credit_note_entry->rate }}</td>
                                                <td class="uk-text-right">{{ $credit_note_entry->discount }}%</td>
                                                <td class="uk-text-right">{{ $credit_note_entry->amount }}</td>
                                            </tr>
                                        @endforeach
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Sub Total</td>
                                            <td class="uk-text-right no-border-bottom">{{ $sub_total }}</td>
                                        </tr>

                                        @if($credit_note->tax_total>0)
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="uk-text-right no-border-bottom">Tax</td>
                                                <td class="uk-text-right no-border-bottom">{{ $credit_note->tax_total }}</td>
                                            </tr>
                                        @endif

                                        @if($credit_note->shiping_charge>0)
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="uk-text-right no-border-bottom">Shipping Charge</td>
                                                <td class="uk-text-right no-border-bottom">{{ $credit_note->shiping_charge }}</td>
                                            </tr>
                                        @endif

                                        @if($credit_note->adjustment > 0 || $credit_note->adjustment < 0)
                                            <tr class="uk-table-middle">
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="no-border-bottom"></td>
                                                <td class="uk-text-right no-border-bottom">Adjustment</td>
                                                <td class="uk-text-right no-border-bottom">{{ $credit_note->adjustment }}</td>
                                            </tr>
                                        @endif

                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom">Total</td>
                                            <td class="uk-text-right no-border-bottom">{{ $credit_note->total_credit_note }}</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="no-border-bottom"></td>
                                            <td class="uk-text-right no-border-bottom" style="background: #efefef">Balance Due</td>
                                            <td class="uk-text-right no-border-bottom" style="background: #efefef">BDT  {{ $credit_note->available_credit }}</td>
                                        </tr>
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
                        <h2 class="heading_b">Refund History</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Payment Mode</th>
                                            <th class="uk-text-right">Amount Refunded</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1;?>
                                        @foreach($credit_note->creditNoteRefunds as $refund)
                                        <tr class="uk-table-middle">
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $refund->created_at->format('d M Y') }}</td>
                                            <td>{{ $refund->paymentMode->mode_name }}</td>
                                            <td class="uk-text-right">BDT {{ $refund->amount }}</td>
                                            <td class="uk-text-center">
                                                <a href="{{ route('credit_note_refund_edit', ['id' => $refund->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="refund_delete_btn">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i>
                                                </a>
                                                <input type="hidden" value="{{ $refund->id }}" class="refund_id">
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="uk-margin-top">
                        <h2 class="heading_b">Invoice Created</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Invoice#</th>
                                            <th class="uk-text-right">Amount Credited</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 1;?>
                                        @foreach($credit_note->creditNotePayments as $payment)
                                            <tr class="uk-table-middle">
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $payment->created_at->format('d M Y') }}</td>
                                                <td>{{ $payment->invoice->invoice_number }}</td>
                                                <td class="uk-text-right">BDT {{ $payment->amount }}</td>
                                                <td class="uk-text-center">
                                                    <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
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
            </div>
            <div class="uk-width-large-2-10 hidden-print uk-visible-large">
                <div class="md-list-outside-wrapper">
                    <ul class="md-list md-list-outside invoices_list">

                        <li class="heading_list">Comments
                            <strong>
                                <button class="uk-button uk-margin-small-top" data-uk-modal="{target:'#comment_modal'}">+ add comment</button>
                            </strong>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="10">
                                <span class="md-list-heading uk-text-truncate">Estimate emailed to aliazam3006@gmail.com <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>


                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="11">
                                <span class="md-list-heading uk-text-truncate">Estimate converted to Invoice INV-000001 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="md-list-content" data-invoice-id="9">
                                <span class="md-list-heading uk-text-truncate">Estimate created for BDT224.00 <br><span class="uk-text-small uk-text-muted">(10 Jan 2017 11:29 AM)</span></span>
                                <span class="uk-text-small uk-text-muted">by <strong>aliazam3006</strong></span>
                            </a>
                        </li>

                    </ul>
                    <div class="uk-modal" id="comment_modal">
                        <div class="uk-modal-dialog">
                            <a class="uk-modal-close uk-close"></a>
                            <div class="uk-modal-header">
                                <h3>Add Comment</h3>
                            </div>
                            <textarea class="md-input" placeholder="Write description here..." rows="5"></textarea>
                            <div class="uk-modal-footer">
                                <div class="uk-grid uk-ma" data-uk-grid-margin>
                                    <div class="uk-width-1-1 uk-float-left">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                    </div>
                                </div>
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
        $('.refund_delete_btn').click(function () {
            var id = $(this).next('.refund_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/credit-note/refund/delete/"+id;
            })
        });

        $('.payment_delete_btn').click(function () {
            var id = $(this).next('.payment_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/credit-note/delete/"+id;
            })
        })
    </script>
@endsection
@extends('layouts.invoice')

@section('title', 'Invoice')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('scripts')
    <script src="{{url('app/moneyin/invoice/invoice.module.js')}}"></script>
    <script src="{{url('app/moneyin/invoice/invoice.useCredit.js')}}"></script>
    <script src="{{url('app/moneyin/invoice/invoice.excessPayment.js')}}"></script>
@endsection
@section('styles')
    <style>



        #table_center th,td{
            border-bottom-color: black !important;
        }
        table#info{
            font-size: 12px !important;
            line-height: 2px;
            border: 1px solid black !important;
            min-width: 200px;
            float:right;
        }
        table#info tr td{
            border: 1px solid black !important;
        }
        table#info tr{
            padding: 0px;
            border: 1px solid black !important;
        }

    </style>
@endsection
@section('content')

    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-2-10 hidden-print uk-visible-large">
                <div class="md-list-outside-wrapper">
                    <ul class="md-list md-list-outside">

                        <li class="heading_list">Recent Invoices</li>

                        @foreach($invoices as $invoice_data)
                        <li>
                            <a href="{{ url('/invoice/show'.'/'.$invoice_data->id) }}" class="md-list-content">
                                <span class="md-list-heading uk-text-truncate">{{ $invoice_data->customer->display_name }} <span class="uk-text-small uk-text-muted">({{ $invoice_data->created_at->format('d M Y') }})</span></span>
                                <span class="uk-text-small uk-text-muted">INV-{{ str_pad($invoice_data->invoice_number, 6, '0', STR_PAD_LEFT) }}</span>
                            </a>
                        </li>
                        @endforeach

                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="{{ url('/invoice') }}">See All</a>
                        </li>

                    </ul>
                </div>
            </div>

            <?php
            $helper = new \App\Lib\Helpers;
            ?>

            <div class="uk-width-large-6-10">
                <div class="md-card md-card-single main-print">
                    <div id="invoice_preview">
                        <div class="md-card-toolbar" style="border-bottom: 0px solid rgba(0,0,0,.12);">
                            <div class="md-card-toolbar-actions hidden-print">
                                @if($invoice->save==1)
                                  <a  href="{!! route('invoice_update_save',$invoice->id) !!}" id="popup" style="float: left;margin-right: 15px" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">Mark as Open</a>
                                @endif
                                @if($invoice->save==1)

                                <p style="margin: 0;padding: 0;padding-top: 7px;float: left;margin-right: 10px;text-transform: uppercase">Draft</p>

                                @endif

                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            @if($invoice->save==1)
                                            <li>
                                                <a href="{{ url('/invoice/show'.'/'.$invoice->id) }}">Invoice</a>
                                            </li>

                                            <li>
                                                <a href="{{ url('/invoice/edit'.'/'.$invoice->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="uk-nav-header">Use Credits</a>
                                            </li>
                                            <li>
                                                <a class="uk-nav-header">Use Excess Payment</a>
                                            </li>
                                            <li>
                                                <a class="uk-nav-header">Create Credit Note</a>
                                            </li>
                                            <li>
                                                <a class="uk-nav-header">Challan</a>
                                            </li>

                                                @else
                                                <li>
                                                    <a href="{{ url('/invoice/show'.'/'.$invoice->id) }}">Invoice</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/invoice/edit'.'/'.$invoice->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <a data-uk-modal="{target:'#modal_header_footer'}" href="#">Use Credits</a>
                                                </li>
                                                <li>
                                                    <a data-uk-modal="{target:'#modal_header_footer1'}" href="#">Use Excess Payment</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/invoice'.'/'.$invoice->id.'/create-credit') }}">Create Credit Note</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('invoice/challan'.'/'.$invoice->id) }}">Challan</a>
                                                </li>

                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="margin-top: 0px;">
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
                                        <h2 style="text-align: center; width: 90%;" class="">INVOICE</h2>
                                        <p style="text-align: center; width: 90%;" class="uk-text-small uk-text-muted uk-margin-top-remove"># INV-{{ str_pad($invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                </div>
                                
                            </div>
                            <input type="hidden" ng-init="invoice_id='asdfg'" value="{{$invoice->id}}" name="invoice_id" ng-model="invoice_id">

                            <div class="uk-grid" style="font-size: 12px;">
                                <div class="uk-width-small-1-2 uk-row-first">
                                    <div class="uk-margin-bottom">
                                        <span ><b> Bill To:</b></span>
                                        <address>
                                            <p><strong>{{ $invoice->customer->display_name }}</strong></p>
                                            <p> {{ $invoice->customer->company_name }},{{ $invoice->customer->phone_number_1 }}</p>
                                            <p><b>Billing Address- </b> {{ $invoice->customer->billing_street }},{{ $invoice->customer->billing_city }},{{ $invoice->customer->billing_state }},{{ $invoice->customer->billing_zip_code }},{{ $invoice->customer->billing_country }}</p>
                                            <p> <b>Shipping address- </b>{{ $invoice->customer->shipping_street }},{{ $invoice->customer->shipping_city }},{{ $invoice->customer->shipping_state }},{{ $invoice->customer->shipping_zip_code }},{{ $invoice->customer->shipping_country }}</p>
                                        </address>
                                    </div>
                                </div>
                                <div class="uk-width-small-1-2">
                                    <div class="uk-width-small-1-1">
                                        <p style="text-align: right; width: 99%; margin: 0; padding: 0;" class="uk-text-small uk-margin-right-remove">Balance Due</p>
                                        <h2 style="text-align: right; width: 99%;" class="uk-margin-top-remove">BDT {{ $helper->getDueBalance($invoice->id) }}</h2>
                                    </div>
                                    <table id="info" class="uk-table inv_top_right_table">
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">ETIN No. </td>
                                            <td class="uk-text-center ">41245245454</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">VAT Reg.</td>
                                            <td class="uk-text-center ">41245245454</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">VAT Challan No. </td>
                                            <td class="uk-text-center "></td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Invoice Date </td>
                                            <td class="uk-text-center ">{{ date('d-m-Y',strtotime($invoice->invoice_date)) }}</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class="uk-text-left ">Due Date </td>
                                            <td class="uk-text-center ">{{ date('d-m-Y',strtotime($invoice->payment_date)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="uk-grid uk-margin-large-bottom" style="font-size: 12px;">
                                <div class="uk-width-1-1">
                                    <table id="table_center" border="1" class="uk-table"  >
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th cla="uk-text-center">Item</th>
                                            <th class="uk-text-center">Qty</th>
                                            <th class="uk-text-center">Rate</th>
                                            <th class="uk-text-center">Discount(%)</th>
                                            <th  class="uk-text-center">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($invoice_entries as $invoice_entry)
                                        <tr class="uk-table-middle">
                                            <td>{{ $i++ }}</td>
                                            <td class="uk-text-center">{{ $invoice_entry->item->item_name }}</td>
                                            <td class="uk-text-center">{{ $invoice_entry->quantity }}</td>
                                            <td class="uk-text-center">{{ $invoice_entry->rate }}</td>
                                            <td class="uk-text-center" >{{ $invoice_entry->discount }}%</td>
                                            <td class="uk-text-center">{{ $invoice_entry->amount }}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="uk-table-middle">
                                            <td ></td>
                                            <td ></td>
                                            <td></td>
                                            <td></td>
                                            <td class="uk-text-center">Sub Total</td>
                                            <td class="uk-text-center">{{ $sub_total }}</td>
                                        </tr>

                                        @if($invoice->tax_total>0)
                                        <tr class="uk-table-middle">
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td ></td>
                                            <td class="uk-text-center ">Tax</td>
                                            <td class="uk-text-center ">{{ $invoice->tax_total }}</td>
                                        </tr>
                                        @endif

                                        @if($invoice->shipping_charge>0)
                                            <tr class="uk-table-middle">
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class="uk-text-center ">Shipping Charge</td>
                                                <td class="uk-text-center ">{{ $invoice->shipping_charge }}</td>
                                            </tr>
                                        @endif

                                        @if($invoice->adjustment > 0 || $invoice->adjustment < 0)
                                            <tr class="uk-table-middle">
                                                <td class="">

                                                </td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class=""></td>
                                                <td class="uk-text-center ">Adjustment</td>
                                                <td class="uk-text-center ">{{ $invoice->adjustment }}</td>
                                            </tr>
                                        @endif

                                        <tr class="uk-table-middle">
                                            <td class="">

                                            </td>
                                            <td class="uk-text-center ">{{ucfirst($numberTransformer->toWords($invoice->total_amount))}} BDT Only</td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class="uk-text-center ">Total</td>
                                            <td class="uk-text-center ">{{ $invoice->total_amount }}</td>
                                        </tr>
                                        <tr class="uk-table-middle">
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class="uk-text-center " style="background: #efefef">Balance Due</td>
                                            <td class="uk-text-center " style="background: #efefef">BDT {{ $helper->getDueBalance($invoice->id) }}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <?php $i = 1; $total_due = 0;?>
                                    @foreach($invoices as $invoice_data)
                                    @if($invoice_data->id !=$invoice->id && $invoice_data->customer_id ==$invoice->customer_id )

                                    <?php $total_due = $total_due+$helper->getDueBalance($invoice_data->id); ?>




                                    </tr>
                                    @endif
                                    @endforeach
                                    <div style="height: 35px; width: 35%;  padding: 10px; border: 1px solid black"><b>Total Outstanding :  BDT {{ $total_due }} </b></div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-2">

                                    <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
                                    <p class="uk-text-small uk-margin-bottom">{{$invoice->customer_note}}</p>
                                    @if($invoice->file_name)
                                    <a href="{{ url('invoice/invoice-download'.'/'.$invoice->file_name) }}"><p class="uk-text-medium uk-margin-bottom">Download Attachment</p></a>
                                    @endif


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
                                    @if($invoice->file_name)
                                    <a href="{{ url('invoice/invoice-download'.'/'.$invoice->file_name) }}"><p class="uk-text-medium uk-margin-bottom">Download Attachment</p></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden-print">
                    <div class="uk-margin-large-top">
                        <h2 class="heading_b">Payments Received</h2>
                    </div>

                    <div class="ük-grid uk-margin-top" data-uk-grid-margin>
                        <div class="md-card md-card-single main-print">
                            <div class="uk-grid uk-margin-large-bottom">
                                <div class="uk-width-1-1">
                                    <table class="uk-table report_table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th>#</th>
                                            <th>Date</th>
                                            <th class="uk-text-right">Payment#</th>
                                            <th class="uk-text-right">Reference#</th>
                                            <th class="uk-text-right">Payment Mode</th>
                                            <th class="uk-text-right">Amount</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        @foreach($payment_receive_entries as $payment_receive_entry)
                                        <tr class="uk-table-middle">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $payment_receive_entry->paymentReceive->payment_date }}</td>
                                            <td class="uk-text-right">{{ $payment_receive_entry->payment_receives_id }}</td>
                                            <td class="uk-text-right">{{ $payment_receive_entry->paymentReceive->reference }}</td>
                                            <td class="uk-text-right">{{ $payment_receive_entry->paymentReceive->paymentMode->mode_name }}</td>
                                            <td class="uk-text-right">BDT {{ $payment_receive_entry->amount }}</td>
                                            <td class="uk-text-center">
                                                <a href="{{ url('/payment-received/edit'.'/'.$payment_receive_entry->payment_receives_id) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a class="payment_receive_delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="payment_receive_entry_id" value="{{ $payment_receive_entry->id }}">
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
                        <h2 class="heading_b">Credits Applied</h2>
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
                                            <th>Credit Note</th>
                                            <th class="uk-text-right">Credits Applied</th>
                                            <th class="uk-text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 1;?>
                                        @foreach($credit_receive_entries as $credit_receive_entry)
                                        <tr class="uk-table-middle">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $credit_receive_entry->creditNote->credit_note_date }}</td>
                                            <td>{{ $credit_receive_entry->credit_note_id }}</td>
                                            <td class="uk-text-right">BDT {{ $credit_receive_entry->amount }}</td>
                                            <td class="uk-text-center">
                                                {{--<a href="{{ url('/invoice/delete-credit'.'/'.$credit_receive_entry->id) }}" class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>--}}
                                                <a class="credit_receive_entry_delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="credit_receive_entry_id" value="{{ $credit_receive_entry->id }}">
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

        {{--model--}}
        @include('invoice::invoice.use_credit')
        @include('invoice::invoice.use_excess_payments')

    <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 50px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Stock Unavailable</h4>
                    </div>
                    <form action="{!! route('adding_stock',$invoice->id) !!}" method="post">
                        {!! csrf_field() !!}
                    <div class="modal-body">
                        <h3 style="list-style: none;color: green;margin-top: 10px;text-decoration: underline">Item</h3>
                        <table class="table table-bordered">
                            <thead style="margin-top: 30px;background-color: #5CB85C;color: white;text-transform: uppercase;">
                            <tr>
                                <th>Pen</th>
                                <th>Available</th>
                                <th>Your Quantity</th>
                            </tr>
                            </thead>
                            <tbody id="stockEntry">

                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Stock & Create</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- show Item Modal -->
        <div class="modal fade" id="message-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 50px">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Stock available</h4>
                    </div>
                    <form action="{!! route('adding_stock',$invoice->id) !!}" method="post">
                        {!! csrf_field() !!}
                        <div class="modal-body">
                            <h3 style="list-style: none;color: green;margin-top: 10px;">Journal Entry Added Succesfully</h3>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('sweet_alert')

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
            <script>
                $('.payment_receive_delete_btn').click(function () {
                    var id = $(this).next('.payment_receive_entry_id').val();
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this! If you delete this",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function () {
                        window.location.href = "/payment-received/delete-payment-receive-entry/"+id;
                    })
                })

                $('.credit_receive_entry_delete_btn').click(function () {
                    var id = $(this).next('.credit_receive_entry_id').val();
                    swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this! If you delete this",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function () {
                        window.location.href = "/invoice/delete-credit/"+id;
                    })
                })



                    $("#popup").click(function(e){
                        e.preventDefault()
                        axios.post(this.href)
                            .then(function (response) {
                                var row=document.getElementById('stockEntry');
                                row.innerHTML=response.data;
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                        axios.get(this.href)
                            .then(function (response) {

                              if(response.data.status){
                                  $("#message-item").modal("show") ;



                              }else{
                                  $("#create-item").modal("show") ;
                              }


                            })
                            .catch(function (error) {
                                console.log(error);
                            });


                    });

            </script>
@endsection

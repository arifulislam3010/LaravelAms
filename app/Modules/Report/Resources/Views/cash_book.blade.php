@extends('layouts.admin')

@section('title', 'Report')

@section('header')
    @include('inc.header')
@endsection

@section('styels')
    <style>
        @media print {
            .md-card-toolbar{
                display: none;
            }
        }
    </style>
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection
@section('content_header')
    <div id="top_bar" class="hidden-print">
        <div class="md-top-bar">
            <ul id="menu_top" class="uk-clearfix">
                <li data-uk-dropdown class="uk-hidden-small">
                    <a href="#"><i class="material-icons">&#xE02E;</i><span>Reports</span></a>
                    <div class="uk-dropdown">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li>Business Overview</li>
                            <li><a href="{{route('report_account_profit_loss')}}">Profit and Loss</a></li>
                            <li><a href="{{route('report_account_cash_flow_statement')}}">Cash Flow Statement</a></li>
                            <li><a href="{{route('report_account_balance_sheet')}}">Balance Sheet</a></li>
                            <li>Accountant</li>
                            <li><a href="{{route('report_account_transactions')}}">Account Transactions</a></li>
                            <li><a href="{{route('report_account_general_ledger_search')}}">General Ledger</a></li>
                            <li><a href="{{route('report_account_journal_search')}}">Journal Report</a></li>
                            <li><a href="{{route('report_account_trial_balance_search')}}">Trial Balance</a></li>
                            <li>Sales</li>
                            <li><a href="{{route('report_account_customer')}}">Sales by Customer</a></li>
                            <li><a href="">Sales by Item</a></li>
                            <li><a href="{{route('report_account_item')}}">Product Report</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
<div class="uk-width-medium-10-10 uk-container-center reset-print" >
    <div class="uk-grid uk-grid-collapse" >
        <div class="uk-width-large-10-10" >
            <div class="md-card md-card-single main-print">
                <div id="invoice_preview hidden-print">
                    <div class="md-card-toolbar hidden-print">
                        <div class="md-card-toolbar-actions hidden-print">
                            <i class="md-icon material-icons" id="invoice_print"></i>

                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#"><i class="material-icons">&#xE916;</i><span>Accountant</span></a>
                                <div class="uk-dropdown" aria-hidden="true">
                                    <li>
                                        <a href="{{route('report_account_transactions')}}">All Account</a>
                                    </li>
                                    <ul class="uk-nav">
                                    @foreach($accounts as $accountsData)
                                        <li>
                                            <a href="{{route('report_account_transactions_account_search',[$accountsData->id])}}">{{$accountsData->account_name}}</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                           
                            <!--end  -->
                            <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="true"> <a href="#" data-uk-modal="{target:'#coustom_setting_modal'}"><i class="material-icons">&#xE8B8;</i><span>Coustom Setting</span></a>
                                
                            </div>
                            <!--coustorm setting modal start -->
                            <div class="uk-modal" id="coustom_setting_modal">
                                <div class="uk-modal-dialog">
                                {!! Form::open(['url' => 'report/cashbook', 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'user_profile']) !!}
                                    <div class="uk-modal-header">
                                        <h3 class="uk-modal-title">Select Date Range and Transaction Type <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip">&#xE8FD;</i></h3>
                                    </div>

                                    <div class="uk-width-large-2-2 uk-width-2-2">
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">Form</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="from_date" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                            </div>
                                        </div>
                                        <div class="uk-width-large-2-2 uk-width-2-2">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                                <label for="uk_dp_1">To</label>
                                                <input class="md-input" type="text" id="uk_dp_1" name="to_date" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-modal-footer uk-text-right">
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        <button type="submit" name="submit" class="md-btn md-btn-flat md-btn-flat-primary">Search</button>
                                    </div>
                                {!! Form::close() !!}
                                </div>
                            </div>
                            <!--end  -->
                        </div>

                        <h3 class="md-card-toolbar-heading-text large" id="invoice_name"></h3>
                    </div>
                    <div class="md-card-content invoice_content print_bg" style="height: 100%;">
                        
                        <div class="uk-grid" data-uk-grid-margin="">
                            
                            <div class="uk-width-small-5-5 uk-text-center">
                                <img style="margin-bottom: -20px;" class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/>
                                <p style="line-height: 5px; margin-top: 35px;" class="uk-text-large">{{ $OrganizationProfile->company_name }}</p>
                                <p style="line-height: 5px;" class="heading_b uk-text-success">Cash Book</p>
                                <p style="line-height: 5px;" class="uk-text-small">From {{$start}}  To {{$end}}</p>
                            </div>
                        </div>
                        <div class="uk-grid uk-margin-large-bottom">
                                 <div class="uk-width-1-2">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">Opening Balance</td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">
                                            @if($total_cash_inhand == 0)
                                            00
                                            @elseif($total_cash_inhand > 0)
                                            {{$total_cash_inhand}}
                                            @elseif($total_cash_inhand < 0)
                                            ({{abs($total_cash_inhand)}})
                                            @endif
                                            </td>
                                            <td class="uk-text-center"></td>
                                        </tr>
                                        <tr>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">Debit</td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">{{$total_cash_inhand_debit}}</td>
                                            <td class="uk-text-center"></td>
                                        </tr>
                                        <tr>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">Credit</td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">
                                            @if($total_cash_inhand_credit == 0)
                                            00
                                            @elseif($total_cash_inhand_credit > 0)
                                            {{$total_cash_inhand_credit}}
                                            @elseif($total_cash_inhand_credit < 0)
                                            ({{abs($total_cash_inhand_credit)}})
                                            @endif
                                            </td>
                                            <td class="uk-text-center"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="uk-width-1-2">
                                    <table class="uk-table">
                                        <thead>
                                        <tr class="uk-text-upper">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">Cash In Hand</td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center"></td>
                                            <td class="uk-text-center" style="font-size: 12px">
                                            <?php $ccih = $current_cash_in_hand+$total_cash_inhand; ?>
                                            @if($ccih == 0)
                                            00
                                            @elseif($ccih > 0)
                                            {{$ccih}}
                                            @elseif($ccih < 0)
                                            ({{abs($ccih)}})
                                            @endif
                                            </td>
                                            <td class="uk-text-center"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <div class="uk-width-1-2" style="font-size: 11px">
                                
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th style="font-size: 11px">DATE</th>
                                        <th style="font-size: 11px">ACCOUNT</th>
                                        <th style="font-size: 11px">TRANSACTION#</th>
                                        <th style="font-size: 11px">TRANSACTION DETAILS</th>
                                        <th style="font-size: 11px">TYPE</th>
                                        <th style="font-size: 11px" class="uk-text-center">DEBIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $debit = 0;
                                    $credit = 0;
                                    ?>
                                    @foreach($JournalEntrys as $JournalEntry)

                                    @foreach($JournalEntry as $JournalEntryData)

                                    @if($JournalEntryData->debit_credit == 1)
                                        <tr class="uk-table-middle">
                                            <td>{{$JournalEntryData->created_at->format('d-m-Y')}}</td>
                                            <td>{{$JournalEntryData->account->account_name}}</td>
                                            
                                            <td>
                                            @if($JournalEntryData->jurnal_type == 'payment_receive1')
                                            INV-{{ str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}
                                            @elseif($JournalEntryData->jurnal_type == 'payment_receive2')
                                            PR-{{str_pad($JournalEntryData->paymentReceive->id, 6, '0', STR_PAD_LEFT)}}
                                            @elseif($JournalEntryData->jurnal_type == 'payment_receive1')
                                            INV-{{ str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}
                                            @elseif($JournalEntryData->jurnal_type == 11)
                                                CN-{{str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)}}
                                            @elseif($JournalEntryData->jurnal_type == 12)
                                                CN-{{str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)}}
                                            @elseif($JournalEntryData->jurnal_type == 'invoice')
                                             INV-{{ str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}
                                             @elseif($JournalEntryData->jurnal_type == 'journal')
                                                MJ - {{str_pad($JournalEntryData->journal->id, 6, '0', STR_PAD_LEFT)}}
                                            @elseif($JournalEntryData->jurnal_type == 'bill')
                                                BILL - {{str_pad($JournalEntryData->bill->bill_number, 6, '0', STR_PAD_LEFT)}}
                                            @elseif($JournalEntryData->jurnal_type == 'bank')
                                                BANK - {{str_pad($JournalEntryData->bank->bank_id, 6, '0', STR_PAD_LEFT)}}
                                            @endif
                                            </td>
                                            <td>

                                                @if($JournalEntryData->agent_id )
                                                    {{ $JournalEntryData->Agent->display_name }}
                                                @elseif($JournalEntryData->contact_id)

                                                    {{ $JournalEntryData->contact->display_name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($JournalEntryData->jurnal_type == 'payment_receive1')
                                                    Invoice
                                                @elseif($JournalEntryData->jurnal_type == 'payment_receive2')
                                                    Customer Payment
                                                @elseif($JournalEntryData->jurnal_type == 'payment_receive1')
                                                    Invoice
                                                @elseif($JournalEntryData->jurnal_type == 11)
                                                    Credit Note
                                                @elseif($JournalEntryData->jurnal_type == 12)
                                                    Credit Note
                                                @elseif($JournalEntryData->jurnal_type == 'invoice')
                                                    Invoice
                                                @elseif($JournalEntryData->jurnal_type == 'bill')
                                                    Bill
                                                @elseif($JournalEntryData->jurnal_type == 'journal')
                                                    Manual Journal
                                                @elseif($JournalEntryData->jurnal_type == 'bank')
                                                    Bank
                                                @endif
                                            </td>
                                            <td class="uk-text-center">
                                            @if($JournalEntryData->debit_credit == 1)
                                            	{{$JournalEntryData->amount}}
                                                <?php 
                                                    $debit = $debit+$JournalEntryData->amount;;
                                                ?>
                                            @else
                                            00
                                            @endif
                                            </td>  
                                        </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                   
                                    </tbody>
                                </table>
                            </div>
                            <div class="uk-width-1-2" style="font-size: 11px">
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th style="font-size: 11px">DATE</th>
                                        <th style="font-size: 11px">ACCOUNT</th>
                                        <th style="font-size: 11px">TRANSACTION#</th>
                                        <th style="font-size: 11px">TRANSACTION DETAILS</th>
                                        <th style="font-size: 11px">TYPE</th>
                                        <th style="font-size: 11px" class="uk-text-center">CREDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($JournalEntrys as $JournalEntry)
                                    @foreach($JournalEntry as $JournalEntryData)
                                    @if($JournalEntryData->debit_credit == 0)
                                    <tr class="uk-table-middle">
                                        <td>{{$JournalEntryData->created_at->format('d-m-Y')}}</td>
                                        <td>{{$JournalEntryData->account->account_name}}</td>
                                        
                                        <td>
                                        @if($JournalEntryData->jurnal_type == 'payment_receive1')
                                        INV-{{ str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}
                                        @elseif($JournalEntryData->jurnal_type == 'payment_receive2')
                                        PR-{{str_pad($JournalEntryData->paymentReceive->id, 6, '0', STR_PAD_LEFT)}}
                                        @elseif($JournalEntryData->jurnal_type == 'payment_receive1')
                                        INV-{{ str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}
                                        @elseif($JournalEntryData->jurnal_type == 11)
                                            CN-{{str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)}}
                                        @elseif($JournalEntryData->jurnal_type == 12)
                                            CN-{{str_pad($JournalEntryData->creditNote->credit_note_number, 6, '0', STR_PAD_LEFT)}}
                                        @elseif($JournalEntryData->jurnal_type == 'invoice')
                                         INV-{{ str_pad($JournalEntryData->invoice->invoice_number, 6, '0', STR_PAD_LEFT) }}
                                         @elseif($JournalEntryData->jurnal_type == 'journal')
                                            MJ - {{str_pad($JournalEntryData->journal->id, 6, '0', STR_PAD_LEFT)}}
                                        @elseif($JournalEntryData->jurnal_type == 'bill')
                                            BILL - {{str_pad($JournalEntryData->bill->bill_number, 6, '0', STR_PAD_LEFT)}}
                                        @elseif($JournalEntryData->jurnal_type == 'bank')
                                            BANK - {{str_pad($JournalEntryData->bank->bank_id, 6, '0', STR_PAD_LEFT)}}
                                        @endif
                                        </td>
                                        <td>
                                            @if($JournalEntryData->agent_id)

                                                {{ $JournalEntryData->Agent->display_name }}
                                            @elseif($JournalEntryData->contact_id)

                                                {{ $JournalEntryData->contact->display_name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($JournalEntryData->jurnal_type == 'payment_receive1')
                                                Invoice
                                            @elseif($JournalEntryData->jurnal_type == 'payment_receive2')
                                                Customer Payment
                                            @elseif($JournalEntryData->jurnal_type == 'payment_receive1')
                                                Invoice
                                            @elseif($JournalEntryData->jurnal_type == 11)
                                                Credit Note
                                            @elseif($JournalEntryData->jurnal_type == 12)
                                                Credit Note
                                            @elseif($JournalEntryData->jurnal_type == 'invoice')
                                                Invoice
                                            @elseif($JournalEntryData->jurnal_type == 'bill')
                                                Bill
                                            @elseif($JournalEntryData->jurnal_type == 'journal')
                                                Manual Journal
                                            @elseif($JournalEntryData->jurnal_type == 'bank')
                                                Bank
                                            @endif
                                        </td>

                                        <td class="uk-text-center">
                                            @if($JournalEntryData->debit_credit == 0)
                                            {{$JournalEntryData->amount}}
                                            <?php  
                                                $credit = $credit+$JournalEntryData->amount;
                                            ?>
                                            @else
                                            00
                                            @endif
                                        </td>
                                    </tr>
                                        @endif


                                    @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="uk-width-1-1">
                                <table class="uk-table">
                                    <thead>
                                    <tr class="uk-text-upper">
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center" style="font-size: 12px">Total</td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center" style="font-size: 12px">{{$debit}}</td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center"></td>
                                        <td class="uk-text-center" style="font-size: 12px">Total</td>
                                        <td class="uk-text-center" style="font-size: 12px">{{$credit}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <span class="uk-text-muted uk-text-small uk-text-italic">Notes:</span>
                                <p class="uk-text-small"></p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="uk-grid">
                            <div class="uk-width-1-2" style="text-align: left">
                                <p class="uk-text-small uk-margin-bottom">Accounts Signature</p>
                            </div>
                            <div class="uk-width-1-2" style="text-align: right">
                                <p class="uk-text-small uk-margin-bottom">Authorized Signature</p>
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
    <!-- handlebars.js -->
<script src="{{ url('admin/bower_components/handlebars/handlebars.min.js')}}"></script>
<script src="{{ url('admin/assets/js/custom/handlebars_helpers.min.js')}}"></script>

<!--  invoices functions -->
<script src="{{ url('admin/assets/js/pages/page_invoices.min.js')}}"></script>
<script type="text/javascript">
    $('#sidebar_reports').addClass('current_section');
</script>
@endsection

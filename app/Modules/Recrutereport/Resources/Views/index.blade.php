@extends('layouts.admin')

@section('title', 'Report')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

{{--@section('content_header')
    <div id="top_bar">
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
                            <li><a href="{{route('report_account_product')}}">Product Report</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection--}}

@section('content')
    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
                <div class="uk-width-large-1-3 uk-width-medium-1-2">

                    <h3 class="heading_a"><i class="material-icons">&#xE0AF;</i> Business Overview</h3>
                    <ul class="md-list">

                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('recrutereport_vendor')}}"><i class="material-icons">&#xE315;</i>Total Ticket Under Vendors</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('recrutereport_company')}}"><i class="material-icons">&#xE315;</i>Total Okala Under Company</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('recrutereport_visa')}}"><i class="material-icons">&#xE315;</i>Total Visa Type Under Company</a></span>
                            </div>
                        </li>
                    </ul>
                </div>
                {{--<div class="uk-width-large-1-3 uk-width-medium-1-2">
                    <h3 class="heading_a"><i class="material-icons">&#xE8D3;</i> Accountant</h3>

                    <ul class="md-list">
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('report_account_transactions')}}"><i class="material-icons">&#xE315;</i>Account Transactions</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('report_account_general_ledger_search')}}"><i class="material-icons">&#xE315;</i>General Ledger</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('report_account_journal_search')}}"><i class="material-icons">&#xE315;</i>Journal Report</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('report_account_trial_balance_search')}}"><i class="material-icons">&#xE315;</i>Trial Balance</a></span>
                            </div>
                        </li>
                    </ul>
                </div>--}}
                {{--<div class="uk-width-large-1-3 uk-width-medium-1-2">
                    <h3 class="heading_a"><i class="material-icons">&#xE8CC;</i> Sales</h3>

                    <ul class="md-list">
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('report_account_customer')}}"><i class="material-icons">&#xE315;</i>Sales by Customer</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="report_sales_by_item.html"><i class="material-icons">&#xE315;</i>Sales by Item</a></span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content reports_list">
                                <span class="md-list-heading"><a href="{{route('report_account_product')}}"><i class="material-icons">&#xE315;</i>Product Report</a></span>
                            </div>
                        </li>
                    </ul>
                </div>--}}
            </div>
        </div>

        @endsection
        @section('scripts')
            <script type="text/javascript">
                $('#sidebar_reports').addClass('current_section');
            </script>
@endsection
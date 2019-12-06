@extends('layouts.main')

@section('title', 'Stock Details Report')

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

                        </div>
                        <div>
                            <div class="uk-grid" data-uk-grid-margin style="margin-top: 20px;">

                                <div class="uk-width-small-5-5 uk-text-center">
                                    <img style="margin-bottom: -20px;" class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/>
                                    <p style="line-height: 5px; margin-top: 35px;" class="uk-text-large">{{ $OrganizationProfile->company_name }}</p>
                                    <p style="line-height: 5px;" class="heading_b uk-text-success">Stock Report</p>
                                    <p style="line-height: 5px;" class="uk-text-small">From {{$start}}  To {{$end}}</p>
                                </div>
                            </div>

                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>Stock In</th>
                                        <th>Stock Out</th>

                                        <th>Stock In Hand</th>

                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Transaction</th>
                                        <th>Stock In</th>
                                        <th>Stock Out</th>

                                        <th>Stock In Hand</th>


                                    </tr>
                                    </tfoot>

                                    <tbody>
                                   @php
                                       $stocktotal = 0;
                                   @endphp
                                    @foreach($stock->stocks as $value)
                                        @php

                                       $stocktotal =$stocktotal+$value->total;
                                        @endphp
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                @if( $value->bill)
                                                BILL-{{ $value->bill->bill_number }}
                                                 @elseif($value->creditNote)
                                                    CRT-{{ $value->creditNote->credit_note_number }}
                                                @endif
                                            </td>
                                            <td>{{ $value->total }}</td>
                                            <td></td>
                                            <td> {{ $stocktotal }}</td>



                                        </tr>
                                    @endforeach
                                    @foreach($stock->invoiceEntries as $value)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                            <td>
                                                @if( $value->invoice_id)
                                                    INV-{{ $value->invoice->invoice_number }}

                                                @endif
                                            </td>
                                            <td></td>
                                            <td>{{ $value->quantity }}</td>

                                            <td>{{ $stocktotal-$value->quantity }}</td>


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('#sidebar_reports').addClass('current_section');
    </script>

@endsection
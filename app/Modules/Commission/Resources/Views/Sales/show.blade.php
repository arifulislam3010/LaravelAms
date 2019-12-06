@extends('layouts.invoice')

@section('title', 'Sales Commission')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('scripts')
@endsection

@section('content')
    <div class="uk-width-medium-10-10 uk-container-center reset-print">
        <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
            <div class="uk-width-large-2-10 hidden-print uk-visible-large">
                <div class="md-list-outside-wrapper">
                    <ul class="md-list md-list-outside">

                        <li class="heading_list">Recent Sales Commission</li>

                        @foreach($recent as $value)
                            <li>
                                <a href="{{ route('sales_commission_show', ['id' => $value->id]) }}" class="md-list-content">
                                    <span class="md-list-heading uk-text-truncate">{{ $value->Agents->display_name }}</span>
                                    <span class="uk-text-small uk-text-muted">{{ $value->date }}</span>
                                </a>
                            </li>
                        @endforeach

                        <li class="uk-text-center">
                            <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light uk-margin-top" href="{{ route('sales_commission') }}">See All</a>
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
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions hidden-print">
                                <i class="md-icon material-icons" id="invoice_print"></i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}" aria-haspopup="true" aria-expanded="false">
                                    <i class="md-icon material-icons"></i>
                                    <div class="uk-dropdown" aria-hidden="true">
                                        <ul class="uk-nav">
                                            <li>
                                                <a href="{{ route('sales_commission_edit', ['id' => $salescommission->id]) }}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="uk-text-danger" href="{{ route('sales_commission_delete', ['id' => $salescommission->id]) }}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">Sales Commission</h3>
                        </div>
                        <div class="md-card-content invoice_content print_bg" style="height: 301px;">

                            <div class="uk-grid" data-uk-grid-margin style="text-align: center;">
                                <h1 style="width: 100%; text-align: center;"><img style="text-align: center;" class="logo_regular" src="{{ url('uploads/op-logo/logo.png') }}" alt="" height="15" width="71"/> {{ $OrganizationProfile->company_name }}</h1>
                            </div>
                            <div class="" style="text-align: center;">

                                <p>{{ $OrganizationProfile->street }},{{ $OrganizationProfile->city }},{{ $OrganizationProfile->state }},{{ $OrganizationProfile->country }}</p>

                                <p style="margin-top: -17px;">{{ $OrganizationProfile->email }},{{ $OrganizationProfile->contact_number }}</p>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin style="text-align: center;">
                            </div>
                            <div class="" style="text-align: center;">
                              <h2 style="line-height: 5px;">Sales Commission</h2>
                              <p style="line-height: 4px;">SC-{{ str_pad($salescommission->scNumber,6,'0',STR_PAD_LEFT) }}</p>
                            </div>
                             <hr/>

                                   <div class="uk-grid" >
                                        <div class="uk-width-medium-2-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="reference">Paid To</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="reference">{{ $salescommission->Agents->display_name }}</label>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-2-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="reference">Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label class="uk-vertical-align-middle" for="reference">{{ $salescommission->date }}</label>
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-2-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="reference">Amount Paid</label>
                                        </div>
                                        <div class="uk-width-medium-3-5">
                                            <h3>BDT {{ $salescommission->amount }}</h3>
                                        </div>
                                    </div>

                                 <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-2-5  uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="reference">Total  Payable</label>
                                            </div>
                                           <div class="uk-width-medium-3-5">
                                             <h3>BDT {{ $balance }}</h3>
                                          </div>
                                   </div>

                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-2-5  uk-vertical-align">
                                    <label class="uk-vertical-align-middle" for="reference">Total  Balance</label>
                                </div>
                                <div class="uk-width-medium-3-5">
                                    <h3>BDT {{ $balance-$salescommission->amount }}</h3>
                                </div>
                            </div>




                                 @if($salescommission->paid_through_id == 4)

                                           @if(is_null($salescommission->show))
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-2-5  uk-vertical-align">
                                                    <label class="uk-vertical-align-middle" for="reference">Paid Through</label>
                                                </div>
                                                <div class="uk-width-medium-3-5">
                                                    <label class="uk-vertical-align-middle" for="reference">{{ $salescommission->Account->account_name }}</label>
                                                </div>
                                            </div>
                                            @else
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-2-5  uk-vertical-align">
                                                        <label class="uk-vertical-align-middle" for="reference">Paid Through</label>
                                                    </div>
                                                    <div class="uk-width-medium-3-5">
                                                        <label class="uk-vertical-align-middle" for="reference">{{ $salescommission->Account->account_name }}</label>
                                                    </div>
                                                </div>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-2-5  uk-vertical-align">
                                                        <label class="uk-vertical-align-middle" for="reference">Details</label>
                                                    </div>
                                                    <div class="uk-width-medium-3-5">
                                                        <label class="uk-vertical-align-middle" for="reference">{{ $salescommission->bank_info }}</label>
                                                    </div>
                                                </div>
                                            @endif
                                 @else
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-2-5  uk-vertical-align">
                                                <label class="uk-vertical-align-middle" for="reference">Paid Through</label>
                                            </div>
                                            <div class="uk-width-medium-3-5">
                                                <label class="uk-vertical-align-middle" for="reference">{{ $salescommission->Account->account_name }}</label>
                                            </div>
                                        </div>
                                 @endif
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <span class="uk-text-muted uk-text-small uk-text-italic">Notes: &nbsp;&nbsp; {{ $salescommission->CustomerNote }}</span>
                                    <p class="uk-text-small uk-margin-bottom">Looking forward for your business.</p>
                                </div>
                            </div>

                            <div class="uk-grid">
                                <div class="uk-width-1-2" style="text-align: left">
                                    <p class="uk-text-small uk-margin-bottom" style="text-decoration: overline">Receipient Signature</p>
                                </div>
                                <div class="uk-width-1-2" style="text-align: right">
                                    <p class="uk-text-small uk-margin-bottom" style="text-decoration: overline">Company Representative</p>
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

    </div>
@endsection

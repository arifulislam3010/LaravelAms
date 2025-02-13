@extends('layouts.main')

@section('title', 'Medical Slip Form')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('angular')
    <script src="{{url('app/moneyin/invoice/invoice.module.js')}}"></script>
    <script src="{{url('app/moneyin/invoice/invoice.controller.js')}}"></script>
@endsection

@section('content')
    <div class="uk-grid" ng-controller="InvoiceController">
        <div class="uk-width-large-10-10">
            @if(Session::has('msg'))
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {!! Session::get('msg') !!}
                </div>
            @endif
            {!! Form::open(['url' => route('immigration_update',$immigration->id), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Create Medical Slip Form</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Pax Id</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <div class="md-card">
                                            <div class="md-card-content">
                                                {{--@foreach($immipax as $item)--}}
                                                {{--<div class="uk-grid form_section" data-section-added="1">--}}
                                                    {{--<div class="uk-width-1-1">--}}

                                                        {{--<div class="uk-input-group">--}}

                                                            {{--<select data-md-selectize="" data-uk-tooltip="{pos:'top'}" title="Select Customer" id="customer_id" name="pax_id[]" required="" tabindex="-1" style="display: none;" class="md-input-success selectized" data-parsley-id="5">--}}
                                                                {{--@foreach($rec as $value)--}}
                                                                    {{--@if($value->id==$item->pax_id)--}}
                                                                        {{--<option value="{!! $value->id !!}" selected>{!! $value->paxid !!}</option>--}}
                                                                    {{--@else--}}
                                                                        {{--<option value="{!! $value->id !!}">{!! $value->paxid !!}</option>--}}
                                                                    {{--@endif--}}
                                                                {{--@endforeach--}}
                                                            {{--</select>--}}
                                                            {{--<div class="selectize-control md-input-success single plugin-tooltip" data-uk-tooltip="{pos:'top'}">--}}
                                                                {{--<div class="selectize-input items required full has-options has-items">--}}
                                                                    {{--<div data-value="8" class="item">gfh4545</div>--}}
                                                                    {{--<input type="text" autocomplete="off" tabindex="-1" style="width: 4px;">--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="selectize_fix"></div>--}}
                                                            {{--<span class="uk-input-group-addon">--}}
                                                                {{--<a href="#" class="btnSectionRemove"><i class="material-icons md-24"></i></a>--}}
                                                            {{--</span>--}}
                                                        {{--</div>--}}

                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--@endforeach--}}


                                                <div class="uk-grid form_section" id="d_form_row">
                                                    @foreach($immipax as $item)
                                                    <div class="uk-width-1-1">

                                                        <div class="uk-input-group">
                                                            <select data-md-selectize data-uk-tooltip="{pos:'top'}" title="Select Customer" id="customer_id" name="pax_id[]">

                                                                @foreach($rec as $value)
                                                                    @if($value->id==$item->pax_id)
                                                                    <option value="{!! $value->id !!}" selected>{!! $value->paxid !!}</option>
                                                                    @else
                                                                        <option value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                                        @endif
                                                                @endforeach
                                                            </select>
                                                            <span class="uk-input-group-addon">
                                                                <a href="#" class="btnSectionRemove"><i class="material-icons md-24"></i></a>
                                                            </span>
                                                        </div>

                                                    </div>
                                                        @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Date Of Application</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select date</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->applicationDate !!}" name="applicationDate" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Country Name</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Country Name</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->country_name !!}" name="country_name">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Total Person</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Total Person</label>
                                        <input class="md-input" type="number" id="uk_dp_start" value="{!! $immigration->total_person !!}" name="total_person">
                                        @if($errors->has('total_person'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('total_person')!!}</span>

                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Person Count</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Person Count</label>
                                        <input class="md-input" type="number" id="uk_dp_start" value="{!! $immigration->person_count !!}" name="person_count">
                                        @if($errors->has('person_count'))

                                            <span style="color:red; position: relative; right:-500px">{!!$errors->first('person_count')!!}</span>

                                        @endif
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Gender</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Gender</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->gender !!}" name="gender">
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Stamp Fee</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Stamp Fee</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->stampFee !!}" name="stampFee">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Validity Of License</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Validity Of License</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->licenseValidity !!}" name="licenseValidity">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Authentication</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Authentication</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->authentication !!}" name="authentication">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Welfare Fee/Person</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Welfare Fee/Person</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->unitWelfareFee !!}" name="unitWelfareFee">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Comment About Welfare</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Comment About Welfare</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->WelfareComment !!}" name="WelfareComment">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Income Tax NA Fee</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Income Tax NA Fee</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->unitIncomeTaxNAFee !!}" name="unitIncomeTaxNAFee">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Income Tax FA Fee</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Income Tax FA Fee</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->unitIncomeTaxSAFee !!}" name="unitIncomeTaxSAFee">
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Income Tax Comment</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Income Tax Comment</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->incomeTaxComment !!}" name="incomeTaxComment">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Income Tax Type</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Income Tax Type</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->incomeTaxType !!}" name="incomeTaxType">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Smart Card Comment</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Smart Card Comment</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->SmartCardComment !!}" name="SmartCardComment">
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5  uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="invoice_date">Payorder Details</label>
                                    </div>
                                    <div class="uk-width-medium-2-5">
                                        <label for="invoice_date">Select Payorder Details</label>
                                        <input class="md-input" type="text" id="uk_dp_start" value="{!! $immigration->payOrderDetails !!}" name="payOrderDetails">
                                    </div>
                                </div>

                                <br>
                                <br>
                                <hr>
                                <br>
                                <br>

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
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')

    <script>

    </script>

    <script>
        altair_forms.parsley_validation_config();
    </script>

    <script src="{{ url('admin/bower_components/parsleyjs/dist/parsley.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/pages/forms_validation.js') }}"></script>

@endsection

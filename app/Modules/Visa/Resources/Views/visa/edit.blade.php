@extends('layouts.main')

@section('title', 'Visa create')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <div class="uk-grid">
        <div class="uk-width-large-10-10">
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Update Visa</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="{{ route('visa') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>
                                        <a href="{{ route('visa_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                        <a href="{{ URL::previous() }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            {!! Form::open(['url' => route('visa_update',$visa->id), 'method' => 'POST']) !!}
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Visa Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="visa_date" name="visa_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{ $visa->date  }}" />
                                        </div>
                                        @if($errors->first('visa_date'))
                                            <div class="uk-text-danger">Date is required.</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Local Reference</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Local Reference</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Local Refrence" id="local_ref" name="local_ref">
                                                <option>Select Local Reference</option>
                                                @foreach($contact as $value)
                                                    @if($value->id==$visa->local_Reference)
                                                    <option selected value=" {{ $value->id }} " > {{ $value->company_name }} </option>
                                                    @else
                                                        <option value=" {{ $value->id }} " > {{ $value->company_name }} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if($errors->has('local_ref'))
                                                <div class="uk-text-danger">{{ $errors->first('local_ref') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">Visa Issue Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="visa_issue_date">Select date</label>
                                            <input class="md-input" type="text" id="visa_issue_date" name="issue_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{ $visa->visaIssuedate }}" />
                                        </div>
                                        @if($errors->has('visa_date'))
                                            <div class="uk-text-danger">{{ $errors->first('visa_date') }}</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="company_name">Company Name</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="company_name">Company Name</label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Company Name" id="company_name" name="company_name" >
                                                <option>Select Company Name</option>
                                                @foreach($company as $value)
                                                    @if($value->id == $visa->company_id)
                                                    <option selected value=" {{ $value->id }} " > {{ $value->name }} </option>
                                                    @else
                                                        <option value=" {{ $value->id }} " > {{ $value->name }} </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            @if($errors->has('company_name'))
                                                <div class="uk-text-danger">{{ $errors->first('company_name') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="visa_number">Visa Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="visa_number">Visa Number</label>
                                            <input class="md-input" type="text" id="visa_number" pattern="\d*"  name="visa_number" value="{{ $visa->visaNumber }}" />
                                            @if($errors->has('visa_number'))
                                                <div class="uk-text-danger">{{ $errors->first('visa_number') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Destination">Destination</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Destination">Destination</label>
                                            <input class="md-input" type="text" id="Destination"  name="destination" value="{{ $visa->destination }} " />

                                        </div>
                                    </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Destination">Register Serial</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="registerSerial">Register Serial</label>
                                            <input class="md-input" type="text" id="registerSerial"  name="registerSerial" value="{{ $visa->registerSerial }} " />
                                            @if($errors->has('registerSerial'))
                                                <div class="uk-text-danger">{{ $errors->first('registerSerial') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Flag_Number">Flag Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="Flag_Number">Flag Number</label>
                                            <input class="md-input" type="text" id="Flag_Number"  name="flag_num" value="{{ $visa->flagNum }} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Iqama Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Iqama Number</label>
                                            <input class="md-input" type="text" id="iqamaNumber"  name="iqamaNumber" value="{{ $visa->iqamaNumber }} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Iqama Sector</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Iqama Sector</label>
                                            <input class="md-input" type="text" id="iqamaSector"   name="iqamaSector" value="{{ $visa->iqamaNumber  }} " />

                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="visaType">Visa Type</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="visaType">Visa Type</label>
                                            <input class="md-input" type="text" id="visaType"   name="visaType" value="{{ $visa->visaType }} " />

                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="bill_id">Created by</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="bill_id">{{ $visa->createdBy->name }}</label>
                                        </div>

                                     </div>


                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="bill_id">Updated by</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="bill_id">{{ $visa->updatedBy->name }}</label>
                                        </div>

                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="bill_id">Created At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="bill_id">{{ $visa->created_at }}</label>
                                        </div>

                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="bill_id">Updated At</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="bill_id">{{ $visa->updated_at }}</label>
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="uk-grid uk-ma" data-uk-grid-margin>
                                        <div class="uk-width-1-1 uk-float-left">
                                            <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')



@endsection
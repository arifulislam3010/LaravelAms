@extends('layouts.main')

@section('title', 'Recruite Order create')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New order</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="{{ route('order') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>
                                        <a href="{{ route('order_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                        <a href="{{ URL::previous() }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            {!! Form::open(['url' => route('order_store'), 'method' => 'POST']) !!}
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">PassPort Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="order_date" name="order_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('order_date')}}" />
                                        </div>
                                        @if($errors->first('order_date'))
                                            <div class="uk-text-danger">Date is required.</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">PassPort Issue  Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="order_date" name="issue_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('issue_date')}}" />
                                        </div>
                                        @if($errors->first('issue_date'))
                                            <div class="uk-text-danger">Date is required.</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Customer</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Customer </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="local_ref" name="customer_id">
                                                <option>Select Customer</option>
                                                @foreach($customer as $value)
                                                    <option value=" {{ $value->id }} " > {{ $value->company_name }} </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('customer_id'))
                                                <div class="uk-text-danger">{{ $errors->first('customer_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Package</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Package </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select package" id="local_ref" name="package_id">
                                                <option>Select Package</option>
                                                @foreach($package as $value)
                                                    <option value=" {{ $value->id }} " > {{ $value->item_name }} </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('package_id'))
                                                <div class="uk-text-danger">{{ $errors->first('package_id') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Register Serial</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">RegisterSerial </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Serail" id="local_ref" name="registerSerial_id">
                                                <option>Select RegisterSerial</option>
                                                @foreach($registerserial as $value)
                                                    <option value=" {{ $value->id }} " > {{ $value->registerSerial }} </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('registerSerial_id'))
                                                <div class="uk-text-danger">{{ $errors->first('registerSerial_id') }}</div>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="order_pax">Pax </label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="order_pax">Pax</label>
                                            <input class="md-input" type="text" id="order_pax"   name="paxid" value="{{old('paxid')}}" />
                                            @if($errors->has('paxid'))
                                                <div class="uk-text-danger">{{ $errors->first('paxid') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Passport Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="passportNumber">Passport Number</label>
                                            <input class="md-input" type="text" id="passportNumber"  name="passportNumber" value="{{ old('passportNumber')}} " />
                                            @if($errors->has('passportNumber'))
                                                <div class="uk-text-danger">{{ $errors->first('passportNumber') }}</div>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Passport Number <br/> (in Bangla)</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="passportNumberbn">Passport Number</label>
                                            <input class="md-input" type="text" id="passportNumberbn"  name="passportNumberbn" value="{{ old('passportNumberbn')}} " />
                                            @if($errors->has('passportNumberbn'))
                                                <div class="uk-text-danger">{{ $errors->first('passportNumberbn') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Place Of Issue)</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="placeofissue">Place Of Issue</label>
                                            <input class="md-input" type="text" id="placeofissue"  name="placeofissue" value="{{ old('placeofissue')}} " />
                                            @if($errors->has('placeofissue'))
                                                <div class="uk-text-danger">{{ $errors->first('placeofissue') }}</div>
                                            @endif
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
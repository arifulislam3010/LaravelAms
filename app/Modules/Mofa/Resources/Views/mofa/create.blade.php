@extends('layouts.main')

@section('title', 'Mofa create')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Create New Mofa</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="{{ route('mofa') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">All</a>
                                        <a href="{{ route('mofa_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                        <a href="{{ URL::previous() }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            {!! Form::open(['url' => route('mofa_store'), 'method' => 'POST']) !!}
                            <div class="user_content">
                                <div class="uk-margin-top">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5  uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="payment_date">mofa Date</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="payment_date">Select date</label>
                                            <input class="md-input" type="text" id="mofa_date" name="mofa_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" value="{{old('mofa_date')}}" />
                                        </div>
                                        @if($errors->first('mofa_date'))
                                            <div class="uk-text-danger">Date is required.</div>
                                        @endif
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>

                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Local">Pax Id</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="Local">Pax </label>
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Pax" id="local_ref" name="pax_ref">
                                                <option>Select Pax</option>
                                                @foreach($pax as $value)
                                                    <option value=" {{ $value->id }} " > {{ $value->paxid }} </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('pax_ref'))
                                                <div class="uk-text-danger">{{ $errors->first('pax_ref') }}</div>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="mofa_number">mofa Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <label for="mofa_number">mofa Number</label>
                                            <input class="md-input" type="text" id="mofa_number"   name="mofa_number" value="{{old('mofa_number')}}" />
                                            @if($errors->has('mofa_number'))
                                                <div class="uk-text-danger">{{ $errors->first('mofa_number') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="iqamaNumber">Iqama Number</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="iqamaNumber">Iqama Number</label>
                                            <input class="md-input" type="text" id="iqamaNumber"  name="iqamaNumber" value="{{ old('iqamaNumber')}} " />
                                            @if($errors->has('iqamaNumber'))
                                                <div class="uk-text-danger">{{ $errors->first('iqamaNumber') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="status">Status</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">
                                            <p>
                                                <input checked value="1" type="radio" name="status" id="status" data-md-icheck />
                                                <label  for="radio_demo_1"  class="inline-label">ok</label>
                                            </p>
                                            <p>
                                                <input type="radio" value="0" name="status"  id="status" data-md-icheck />
                                                <label for="radio_demo_2" class="inline-label">not ok</label>
                                            </p>
                                        </div>
                                    </div>



                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5 uk-vertical-align">
                                            <label class="uk-vertical-align-middle" for="Flag_Number">Comments</label>
                                        </div>
                                        <div class="uk-width-medium-2-5">

                                            <label for="Flag_Number">Comments</label>
                                            <div class="uk-form-row">

                                                <textarea name="comments" cols="30" rows="4" class="md-input no_autosize">{{ old('comments')}}</textarea>
                                                @if($errors->has('comments'))
                                                    <div class="uk-text-danger">{{ $errors->first('comments') }}</div>
                                                @endif
                                            </div>

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
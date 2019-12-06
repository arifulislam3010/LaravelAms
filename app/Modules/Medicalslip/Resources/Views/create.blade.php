@extends('layouts.main')
@section('title')
   Medical slip
@endsection

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection


@section('content')

    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
         <form action="{{ route('medicalslip_store') }}"  method="post" class="uk-form-stacked" id="class_store">
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                {{ csrf_field() }}
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"> Add Medical Slip </span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-grid">
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Pax Id</label>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <select name="paxid" id="paxid" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="select class">
                                                <option value="">Select Customer</option>
                                                @foreach($recrut as $value)
                                                    <option value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if($errors->has('paxid'))

                                        <span style="color:red">{!!$errors->first('paxid')!!}</span>

                                    @endif
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-2">
                                        <div class="parsley-row">
                                            <label>Status:</label>
                                            <div class="dynamic_radio uk-margin-small-top">
                                                        <span class="icheck-inline">
                                                            <input type="radio" name="status" value="1" id="d_form_gender_m" />
                                                            <label for="d_form_gender_m" class="inline-label">Fit</label>
                                                        </span>
                                                        <span class="icheck-inline">
                                                            <input type="radio" name="status" value="0" id="d_form_gender_f"  />
                                                            <label for="d_form_gender_f" class="inline-label">Unfit</label>
                                                        </span>
                                                   </div>
                                             </div>
                                         </div>
                                     </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-7">
                                        <div class="parsley-row">
                                            <label for="medicalcn">Medical Centre Name <span class="req"></span></label>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <div class="parsley-row">
                                            <input type="text" id="medicalcn" name="medicalcn" required class="md-input"  />
                                        </div>
                                    </div>
                                    @if($errors->has('medicalcn'))

                                        <span style="color:red">medicalcn Required</span>

                                    @endif
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-3">
                                        <label for="start_date">Test date</label>
                                        <input class="md-input" type="date" id="test_date" name="test_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                    @if($errors->has('test_date'))

                                        <span style="color:red">{!!$errors->first('test_date')!!}</span>

                                    @endif
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-3">
                                        <label for="user_edit_personal_info_control">Comment</label>
                                        <textarea class="md-input" name="comment" id="user_edit_personal_info_control" cols="30" rows="4"></textarea>
                                    </div>
                                    @if($errors->has('comment'))

                                        <span style="color:red">{!!$errors->first('comment')!!}</span>

                                    @endif
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1 uk-float-right">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
    </div>


@endsection
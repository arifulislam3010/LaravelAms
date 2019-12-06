@extends('layouts.main')
@section('title')
    VisaStamp
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
            <form action="{{ route('visastamp_update', $stamp->id) }}" method="post" class="uk-form-stacked" id="user_edit_form">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-large-10-10">
                        <div class="md-card">
                            <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                                {{ csrf_field() }}
                                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                </div>
                                <div class="user_heading_content">
                                    <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"> Edit VisaStamp</span></h2>
                                </div>
                            </div>
                            <div class="user_content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-5 uk-vertical-align">
                                        <label class="uk-vertical-align-middle" for="customer_name">Type</label>
                                    </div>

                                    <div class="uk-width-medium-2-6">
                                        <select onchange="onTypeSelected()" name="type" title="type" id="type" name="type" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                            <option value="1">Outgonig</option>
                                            <option value="2">Incoming</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" id="sending_date">
                                    <div class="uk-width-1-3">
                                        <label for="start_date">Sending date </label>
                                        <input class="md-input" type="text" value="{!! $stamp->send_date  !!}" name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                    {{--@if($errors->has('send_date'))

                                        <span style="color:red">{!!$errors->first('send_date')!!}</span>

                                    @endif--}}
                                </div>

                                <div class="uk-grid" id="return_date">
                                    <div class="uk-width-1-3">
                                        <label for="start_date">Return date </label>
                                        <input class="md-input" type="text" value="{!! $stamp->return_date !!}"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                    </div>
                                    {{--@if($errors->has('return_date'))

                                        <span style="color:red">{!!$errors->first('return_date')!!}</span>

                                    @endif--}}
                                </div>


                                <div class="uk-grid form_section" id="d_form_row">
                                    <div class="uk-width-1-3">
                                        <div class="uk-input-group">
                                            <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select Customer" id="customer_id" name="paxid[]">
                                                <option value="">Select Pax Id</option>
                                                @foreach($recrut as $value)
                                                    @if($value->id==$stamp->pax_id)
                                                    <option  selected value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                    $else
                                                        <option   value="{!! $value->id !!}">{!! $value->paxid !!}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="uk-width-1-3">
                                                <label for="user_edit_personal_info_control">Comment</label>
                                                <textarea class="md-input" name="comment" id="user_edit_personal_info_control" cols="30" rows="4">{!! $stamp->comment !!}</textarea>
                                            </div>
                                            <span class="uk-input-group-addon">
                                            <a href="#" class="btnSectionClone" data-section-clone="#d_form_row"><i class="material-icons md-24">&#xE146;</i></a>
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="uk-grid">
                                    <div class="uk-width-1-3">
                                        <label for="user_edit_personal_info_control">Message</label>
                                        <textarea class="md-input" name="message" id="user_edit_personal_info_control" cols="30" rows="4"></textarea>
                                    </div>
                                    @if($errors->has('message'))

                                        <span style="color:red">message is Required</span>

                                    @endif
                                </div>--}}
                                {{--<div class="uk-grid">
                                    <div class="uk-width-1-3">
                                        <label for="user_edit_personal_info_control">Comment</label>
                                        <textarea class="md-input" name="comment" id="user_edit_personal_info_control" cols="30" rows="4">{!! $stamp->comment !!}</textarea>
                                    </div>
                                    @if($errors->has('comment'))

                                        <span style="color:red">{!!$errors->first('comment')!!}</span>

                                    @endif
                                </div>--}}
                                <div class="uk-grid">
                                    <div class="uk-width-1-1 uk-float-right">
                                        <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                        <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript">
        window.onload=function () {
            document.getElementById("sending_date").style.display = 'none';
            document.getElementById("return_date").style.display = 'block';
        }
        function onTypeSelected(){
            var type=document.getElementById("type").value;
            if(type==2){

                document.getElementById("sending_date").style.display='none';
                document.getElementById("return_date").style.display='block';
            }
            else{
                document.getElementById("sending_date").style.display='block';
                document.getElementById("return_date").style.display='none';
            }

        }
    </script>
@endsection


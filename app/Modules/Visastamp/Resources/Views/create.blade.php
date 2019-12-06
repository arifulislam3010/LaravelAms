
@extends('layouts.main')

@section('title', 'VisaStamp')

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
            {!! Form::open(['url' => route('visastamp_store'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
            <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                <div class="uk-width-xLarge-10-10 uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">New VisaStamp</span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-5 uk-vertical-align">
                                <label class="uk-vertical-align-middle" for="customer_name">Type</label>
                            </div>

                            <div class="uk-width-medium-2-6">
                                <select onchange="onTypeSelected()" name="type" title="type" id="type" name="type" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}">
                                    <option value="1">Outgoing</option>
                                    <option value="2">Incoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-grid" id="sending_date">
                            <div class="uk-width-1-3">
                                <label for="start_date">Sending date </label>
                                <input class="md-input" type="text"  name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                            </div>
                            @if($errors->has('send_date'))
                                <span style="color:red">{!!$errors->first('send_date')!!}</span>
                            @endif
                        </div>
                        <div class="uk-grid" id="return_date">
                            <div class="uk-width-1-3">
                                <label for="start_date">Return date </label>
                                <input class="md-input" type="text"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                            </div>
                            @if($errors->has('return_date'))
                                <span style="color:red">{!!$errors->first('return_date')!!}</span>
                            @endif
                        </div>
                        <div class="uk-grid form_section" id="d_form_row">
                            <div class="uk-width-1-3">
                                <div class="uk-input-group">
                                    <select data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select PaxId" id="paxid" name="paxid[]">
                                        <option value="">Select Pax Id</option>
                                        @foreach($recrut as $value)
                                            <option value="{!! $value->id !!} " selected>{!! $value->paxid !!}</option>
                                        @endforeach
                                    </select>
                                    <div class="uk-width-1-3">
                                        <label for="user_edit_personal_info_control">Comment</label>
                                        <textarea class="md-input" name="comment" id="user_edit_personal_info_control" cols="30" rows="4"></textarea>
                                    </div>
                                    <span class="uk-input-group-addon">
                                                <a href="#" class="btnSectionClone" data-section-clone="#d_form_row"><i class="material-icons md-24">&#xE146;</i></a>
                                            </span>
                                </div>
                            </div>

                        </div>
                             @if($errors->has('paxid'))
                              <span style="color:red">{!!$errors->first('paxid')!!}</span>
                           @endif
                                </div>
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
            {!! Form::close() !!}
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

{{--
<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
    <div class="uk-width-large-10-10">
        <form action="{{ route('visastamp_store') }}" method="post" class="uk-form-stacked" id="user_edit_form">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            {{ csrf_field() }}
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname">Add VisaStamp</span></h2>
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
                                    <input class="md-input" type="text"  name="send_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                </div>
                                @if($errors->has('send_date'))

                                    <span style="color:red">{!!$errors->first('send_date')!!}</span>

                                @endif
                            </div>

                            <div class="uk-grid" id="return_date">
                                <div class="uk-width-1-3">
                                    <label for="start_date">Return date </label>
                                    <input class="md-input" type="text"  name="return_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                                </div>
                                @if($errors->has('return_date'))

                                    <span style="color:red">{!!$errors->first('return_date')!!}</span>
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



<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>
--}}

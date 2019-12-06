@extends('layouts.main')

@section('title', 'MedicalSlip')

{{--@section('header')
    @include('inc.header')
@endsection--}}

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    @if(Session::has('msg'))
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('msg') !!}
        </div>
    @endif
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Pax ID</th>
                                        <th>Customer Name</th>
                                        <th>Visa</th>
                                        <th>Okala</th>
                                        <th>Fp & Tranning</th>
                                        <th>Manpower</th>
                                        <th>Flight</th>
                                        <th>Mofa</th>
                                        <th>Musaned</th>
                                        <th>Medical</th>
                                        <th>Visa stamping</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Pax ID</th>
                                        <th>Customer Name</th>
                                        <th>visa</th>
                                        <th>okala</th>
                                        <th>Fp & Tranning</th>
                                        <th>Manpower</th>
                                        <th>Flight</th>
                                        <th>Mofa</th>
                                        <th>Musaned</th>
                                        <th>Medical</th>
                                        <th>Visa stamping</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <?php
                                    $i=1;
                                    ?>
                                    <tbody>
                                    @foreach ($Rorder as $value)
                                        <tr>
                                            <td>{!! $i++ !!}</td>
                                            <td>{!!$value->paxid  !!}</td>
                                            <td>{{ $value->customer->display_name }}</td>
                                            <td>{{ $value->registerserial->visaNumber }}</td>
                                            <td>{{$value->paxId['date']}}</td>
                                            <td>{{$value->ft_pax['assignedDate']}}</br> {{$value->ft_pax['receivingDate']}}</td>
                                            <td>{{$value->mp_pax['issuingDate']}} </br>{{$value->mp_pax['receivingDate']}}</td>
                                            <td>{{$value->flight['flightDate']}}</td>
                                            <td>{{$value->mofa['mofaDate']}}</td>
                                            <td>{{$value->musan['issue_date']}}</td>
                                            <td>{{$value->medical['status']}}</td>
                                            <td>{{$value->visa['send_date']}} {{$value->visa['return_date']}}</td>
                                            <td class="uk-text-center">
                                                <a href="#" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE8F4;</i></a>
                                                {{-- <a href="#" class="batch-edit" data-uk-modal="{target:'#edit_modal{{$data->course_id}}'}"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>--}}
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                 </table>

                                {!! Form::open(['url' => route('recruitdashboard_search'), 'method' => 'POST', 'class' => 'user_edit_form', 'id' => 'my_profile', 'files' => 'true', 'enctype' => "multipart/form-data", 'novalidate']) !!}
                                <div class="uk-width-1-2">
                                    <h3 class="md-card-toolbar-heading-text">
                                        Activity Log
                                    </h3>
                                </div>

                                <div class="uk-grid">
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <label>From <span class="req">*</span></label>
                                            <input type="text" name="from_date"  id="from" value="@if (isset($from)) {{$from}} @endif" required class="md-input" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                            {{--<input class="md-input" type="text"  name="from_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" >--}}
                                        </div>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <label>TO <span class="req">*</span></label>
                                            <input type="text" name="to_date"  id="to" value="@if (isset($to)) {{$to}} @endif" required class="md-input" data-uk-datepicker="{format:'YYYY-MM-DD'}" />
                                            {{--<input class="md-input" type="text"  name="to_date" data-uk-datepicker="{format:'YYYY-MM-DD'}" >--}}
                                        </div>
                                    </div>
                                    <div class="uk-width-1-4">
                                        <div class="parsley-row">
                                            <button type="submit" onclick="myFunction()" class="md-btn md-btn-primary" >Submit</button>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Okala</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>

                                                                <th><span style="color:green;">Okala Date</span></th>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Status</span></th>
                                                                <th><span style="color:green;">Comments</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            @foreach($okala as $value)
                                                                <tr>
                                                                    <td>{!! $value->date !!}</td>
                                                                    <td>{!! $value->paxId['paxid'] !!}</td>
                                                                    @if($value->status==1)
                                                                        <td>OK</td>
                                                                    @else
                                                                        <td>Not OK</td>
                                                                    @endif
                                                                    <td>{!! $value->comment !!}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('okala_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="okala_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <h4><span style="color:blue;">Flight</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>

                                                                <th><span style="color:green;">Flight Date</span> </th>
                                                                <th><span style="color:green;">Carrier Name</span></th>
                                                                <th><span style="color:green;">Vendor</span></th>
                                                                <th><span style="color:green;">Paxid</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>

                                                            <tbody>
                                                            @foreach($flight as $value )
                                                                <tr>
                                                                    <td>{!! $value->flightDate !!}</td>
                                                                    <td>{!! $value->carrierName !!}</td>
                                                                    <td>{!! $value->vendor_id  !!}</td>
                                                                    <td>{!! $value->paxid  !!}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('flight_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="flight_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Mofa</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Pax Id </span></th>
                                                                <th><span style="color:green;">Mofa Number</span></th>
                                                                <th><span style="color:green;">Iqama Number</span></th>
                                                                <th><span style="color:green;">Mofa Date</span></th>
                                                                <th><span style="color:green;">Status</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            <tbody>
                                                            @foreach($mofa as $value )
                                                                <tr>
                                                                    <td>{!! $value->pax_id !!}</td>
                                                                    <td>{!! $value->mofaNumbe !!}</td>
                                                                    <td>{!! $value->iqamaNumber  !!}</td>
                                                                    <td>{!! $value->mofaDate  !!}</td>
                                                                    @if($value->status==1)
                                                                        <td>OK</td>
                                                                    @else
                                                                        <td>Not OK</td>
                                                                    @endif
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('mofa_edit',$value->id) !!}"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a onclick="deleterow(this); return false" href="{!! route('mofa_delete',$value->id) !!}" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue; ">FingerPrint</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Assigned Date</span></th>
                                                                <th><span style="color:green;">Receiving Date</span></th>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Comment</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            <tbody>
                                                            @foreach($ft as $value )
                                                                <tr>
                                                                    <td>{!! $value->assignedDate !!}</td>
                                                                    <td>{!! $value->receivingDate !!}</td>
                                                                    <td>{!! $value->paxid  !!}</td>
                                                                    <td>{!! $value->comment  !!}</td>

                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('fingerprint_edit',$value->id) !!}"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a onclick="deleterow(this); return false" href="{!! route('fingerprint_delete',$value->id) !!}" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Visaentry</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Date</span></th>
                                                                <th><span style="color:green;">local Reference</span></th>
                                                                <th><span style="color:green;">visaNumber</span></th>
                                                                <th><span style="color:green;">company</span></th>
                                                                <th><span style="color:green;">numberofVisa</span></th>
                                                                <th><span style="color:green;">registerSerial</span></th>
                                                                <th><span style="color:green;">iqamaNumber</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            <tbody>
                                                            @foreach($visaentry as $value )
                                                                <tr>
                                                                    <td>{{ $value->date }}</td>
                                                                    <td>{{ $value->Contact->company_name }}</td>
                                                                    <td>{{ $value->visaNumber }}</td>
                                                                    <td>{{ $value->Company->name }}</td>
                                                                    <td>{{ $value->numberofVisa }}</td>
                                                                    <td>{{ $value->registerSerial }}</td>
                                                                    <td>{{ $value->iqamaNumber }}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('visa_edit',$value->id) !!}"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a onclick="deleterow(this); return false" href="{!! route('visa_delete',$value->id) !!}" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Manpower</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Issuing Date</span></th>
                                                                <th><span style="color:green;">Receiving Date</span></th>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Comments</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($manpower as $value)
                                                                <tr>
                                                                    <td>{!! $value->issuingDate !!}</td>
                                                                    <td>{!! $value->receivingDate !!}</td>
                                                                    <td>{!! $value->paxId['paxid'] !!}</td>
                                                                    <td>{!! $value->comment !!}</td>

                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('manpower_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="manpower_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue; ">MedicalSlip</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Mrdical centre </span></th>
                                                                <th><span style="color:green;">Status</span></th>
                                                                <th><span style="color:green;">Test Date</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($medical as $value)
                                                                <tr>
                                                                    <td>{!! $value->pax_id !!}</td>
                                                                    <td>{!! $value->medical_centre !!}</td>
                                                                    @if($value->status==1)
                                                                        <td>OK</td>
                                                                    @else
                                                                        <td>Not OK</td>
                                                                    @endif
                                                                    <td>{!! $value->testdate !!}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('medicalslip_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="medicalslip_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Musaned</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Pax Id</span></th>
                                                                <th><span style="color:green;">Issue Date </span></th>
                                                                <th><span style="color:green;">Company Name</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($musaned as $value)
                                                                <tr>
                                                                    <td>{!! $value->paxId['paxid'] !!}</td>
                                                                    <td>{!! $value->issue_date !!}</td>
                                                                    <td>{!! $value->companyId ['name'] !!}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('musaned_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="musaned_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4><span style="color:blue; ">VisaStamp</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Sending Date</span></th>
                                                                <th><span style="color:green;">Returning Date </span> </th>
                                                                <th><span style="color:green;">Pax Id </span></th>
                                                                <th><span style="color:green;">Comment</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($visastamp as $value)
                                                                <tr>
                                                                    <td>{!! $value->send_date !!}</td>
                                                                    <td>{!! $value->return_date  !!}</td>
                                                                    <td>{!! $value->pax_id !!}</td>
                                                                    <td>{!! $value->comment  !!}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('medicalslip_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="medicalslip_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">Document</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Created At</span></th>
                                                                <th><span style="color:green;">Category </span> </th>
                                                                <th><span style="color:green;">Pax Id </span></th>
                                                                <th><span style="color:green;">Title</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($document as $value)
                                                                <tr>
                                                                    <td>{!! $value->created_at !!}</td>
                                                                    <td>{!! $value->Category['categoryName'] !!}</td>
                                                                    <td>{!! $value->pax_id  !!}</td>
                                                                    <td>{!! $value->title  !!}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('document_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="document_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><span style="color:blue;">RecruitOrder</span></h4>
                                    <div class="uk-width-large-10-10">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-large-10-10">
                                                <div class="user_content">
                                                    <div class="uk-overflow-container uk-margin-bottom">
                                                        <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                                        <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                                            <thead>
                                                            <tr>
                                                                <th><span style="color:green;">Customer</span></th>
                                                                <th><span style="color:green;">Package </span> </th>
                                                                <th><span style="color:green;">Register Serial</span> </th>
                                                                <th><span style="color:green;">Passport Number</span></th>
                                                                <th class="uk-text-center"><span style="color:red;">Action</span></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($Rorder as $value)
                                                                <tr>
                                                                    <td>{{ $value->customer->company_name }}</td>
                                                                    <td>{{ $value->package->item_name }}</td>
                                                                    <td>{{ $value->registerserial->visaNumber }}</td>
                                                                    <td>{{ $value->passportNumber }}</td>
                                                                    <td class="uk-text-center">
                                                                        <a href="{!! route('order_edit',$value->id) !!}" class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                                                        <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                                        <input type="hidden" class="order_id" value="{{ $value->id }}">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div>

                    </div>

                </div>


                <script>
     function deleterow(link) {
     UIkit.modal.confirm('Are you sure?', function(){
     window.location.href = link;
       });
   }
    </script>
@endsection

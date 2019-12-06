@extends('layouts.admin')

@section('title', 'Report')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection



@section('content')
    <div class="uk-width-large-10-10">
        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-margin-bottom">
                    <a href="#" class="md-btn uk-margin-right" id="printTable">Print Table</a>
                    <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                        <button class="md-btn">Columns <i class="uk-icon-caret-down"></i></button>
                        <div class="uk-dropdown">
                            <ul class="uk-nav uk-nav-dropdown" id="columnSelector"></ul>
                        </div>
                    </div>
                </div>

                <div class="uk-overflow-container uk-margin-bottom">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair" id="ts_pager_filter">
                        <thead>
                        <tr>
                            <th data-priority="critical">Serial</th>
                            <th data-priority="2">Mofa Date</th>
                            <th data-priority="6">Mofa Number</th>
                            <th data-priority="6">Iqama Number</th>
                            <th data-priority="6">Status</th>

                            <th class="filter-false remove sorter-false uk-text-center" data-priority="1">Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Passport Number</th>
                            <th>Coustomer Name</th>
                            <th class="uk-text-center">Actions</th>
                        </tr>
                        </tfoot>

                        @php
                            $i=1;
                        @endphp

                        <tbody>
                        @foreach($mofa as $value)
                            <tr>
                                <td>{!! $i++ !!}</td>
                                <td>{!!$value->mofaDate  !!}</td>
                                <td>{!! $value->mofaNumber !!}</td>
                                <td>{!! $value->iqamaNumber!!}</td>
                                @if($value->status==1)
                                    <td>OK</td>
                                @else
                                    <td>Not OK</td>
                                @endif


                                <td class="uk-text-center">
                                    <a href="customer_details.html" class="batch-edit"><i class="material-icons">&#xE884;</i></a>
                                    <a href="{!! route('mofa_edit',$value->id) !!}"  class="batch-edit"><i class="md-icon material-icons uk-margin-right">&#xE254;</i></a>
                                    <a onclick="deleterow(this); return false" href="{!! route('mofa_delete',$value->id) !!}" class=""><i class="md-icon material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <ul class="uk-pagination ts_pager">
                    <li data-uk-tooltip title="Select Page">
                        <select class="ts_gotoPage ts_selectize"></select>
                    </li>
                    <li class="first"><a href="javascript:void(0)"><i class="uk-icon-angle-double-left"></i></a></li>
                    <li class="prev"><a href="javascript:void(0)"><i class="uk-icon-angle-left"></i></a></li>
                    <li><span class="pagedisplay"></span></li>
                    <li class="next"><a href="javascript:void(0)"><i class="uk-icon-angle-right"></i></a></li>
                    <li class="last"><a href="javascript:void(0)"><i class="uk-icon-angle-double-right"></i></a></li>
                    <li data-uk-tooltip title="Page Size">
                        <select class="pagesize ts_selectize">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </li>
                </ul>
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
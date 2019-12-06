@extends('layouts.main')

@section('title', 'Pending Ticket Order')

@section('header')
    @include('inc.header')
@endsection

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
    @if(Session::has('update'))
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('update') !!}
        </div>
    @endif
    @if(Session::has('create'))
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('create') !!}
        </div>
    @endif
    @if(Session::has('save'))
        <div class="uk-alert uk-alert-success" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('save') !!}
        </div>
    @endif
    @if(Session::has('del'))
        <div class="uk-alert uk-alert-danger" data-uk-alert>
            <a href="#" class="uk-alert-close uk-close"></a>
            {!! Session::get('del') !!}
        </div>
    @endif
    <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
        <div class="uk-width-large-10-10">
            <div class="uk-grid" data-uk-grid-margin>

                <div class="uk-width-large-10-10">
                    <div class="md-card">
                        <div class="user_heading">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate">Pending Ticket Order List</span></h2>
                                <div class="uk-width-medium-1-3">
                                    <div class="md-btn-group">
                                        <a href="{{ route('ticket_Order_confirmed') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Confirmed</a>
                                        <a href="{{ route('ticket_Order_pending') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Pending</a>
                                        <a href="{{ route('ticket_Order_create') }}" class="md-btn md-btn-small md-btn-primary md-btn-wave">Add</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Contact Number</th>
                                        <th>Updated By</th>
                                        <th>Updated At</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Contact Number</th>
                                        <th>Updated By</th>
                                        <th>Updated At</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($order as $value)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $value->first_name }}</td>
                                            <td>{{ $value->contact_number }}</td>
                                            <td>{{ $value->updatedBy->name }}</td>
                                            <td>{{ $value->updated_at }}</td>
                                            <td class="uk-text-center">
                                                <a href="{{ route('ticket_Order_pendingUpdate',['id' => $value->id]) }}"><i title="pending" class="md-icon material-icons">&#xE88E;</i></a>
                                                <a href="{{ route('ticket_Order_pdf',['id' => $value->id]) }}"><i class="material-icons">&#xE415;</i></a>
                                                <a href="{{ route('ticket_Order_bill_show',['id' => $value->bill_id?$value->bill_id:0,'order'=>$value->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">B</i></a>
                                                <a href="{{ route('ticket_Order_invoice_show',['id' => $value->invoice_id?$value->invoice_id:0,'order'=>$value->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">I</i></a>
                                                <a href="{{ route('ticket_Order_edit',['id' => $value->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                                                <a href="{{ route('ticket_Order_destroy',['bill' => $value->bill_id?$value->bill_id:0,'invoice' => $value->invoice_id?$value->invoice_id:0,'id'=>$value->id]) }}"><i  title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script type="text/javascript">
        $('#settings_menu_taxes').addClass('md-list-item-active');
    </script>
@endsection



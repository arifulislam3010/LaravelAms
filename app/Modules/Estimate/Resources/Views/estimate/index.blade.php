@extends('layouts.main')

@section('title', 'Estimate')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
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
                                <h2 class="heading_b"><span class="uk-text-truncate"> Estimate </span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <div class="uk-overflow-container uk-margin-bottom">
                                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Estimate Number</th>

                                        <th>Reference#</th>
                                        <th>Subject </th>
                                        <th>Attn</th>

                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Estimate Number</th>

                                        <th>Reference#</th>
                                        <th>Subject </th>
                                        <th>Attn</th>

                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($estimate as $value)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{date('d-m-Y', strtotime($value->date)) }}</td>
                                            <td>{{ $value->customer->display_name }}</td>
                                            <td>{{ str_pad($value->estimate_number,6,"0",STR_PAD_LEFT) }}</td>
                                            <td>{{ $value->ref }}</td>
                                            <td>{{ str_limit($value->subject,20) }}</td>
                                            <td>{{ $value->attn }}</td>

                                            <td>
                                                <a href="{{ route('estimateentry_invoice', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Convert To Invoice"  class="md-icon material-icons" >swap_horiz</i>
                                                </a>
                                                <a href="{{ route('estimate_pdf', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View"  class="md-icon material-icons">picture_as_pdf</i>
                                                </a>
                                                <a href="{{ route('estimate_print', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View"  class="md-icon material-icons">print</i>
                                                </a>
                                                <a href="{{ route('estimate_edit', ['id' => $value->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                <input type="hidden" class="estimate_id" value="{{ route('estimate_destroy',$value->id)  }}">
                                                <a href="{!! route('estimate_mail_send_view',$value->id) !!}"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('estimate_create') }}" class="md-fab md-fab-accent branch-create">
                                    <i class="material-icons">&#xE145;</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.delete_btn').click(function () {
            var url = $(this).next('.estimate_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = url;
            })
        })
    </script>
@endsection
@extends('layouts.main')

@section('title', 'Income')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Income</span></h2>
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
                                        <th>Income ACCOUNT</th>
                                        <th>Reference#</th>
                                        <th>Customer Name</th>
                                        <th>Received Through</th>
                                        <th>Amount</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Income ACCOUNT</th>
                                        <th>Reference#</th>
                                        <th>Customer Name</th>
                                        <th>Received Through</th>
                                        <th>Amount</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach($incomes as $income)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{date('d-m-Y', strtotime($income->date)) }}</td>
                                            <td>{{ $income->account->account_name }}</td>
                                            <td>{{ $income->reference }}</td>
                                            <td>{{ $income->customer->display_name }}</td>
                                            <td>{{ $income->accountReceiveThrough->account_name }}</td>
                                            <td>{{ $income->amount }}</td>
                                             <td>
                                                <a href="{{ route('income_show', ['id' => $income->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('income_edit', ['id' => $income->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                 <a class="delete_btn"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                                                 <input type="hidden" class="income_id" value="{{ $income->id }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('income_create') }}" class="md-fab md-fab-accent branch-create">
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
            var id = $(this).next('.income_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/income/delete/"+id;
            })
        })
    </script>
@endsection
@extends('layouts.main')

@section('title', 'Credit Notes')

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
                                <h2 class="heading_b"><span class="uk-text-truncate">Credit Notes</span></h2>
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
                                        <th>Credit Note#</th>
                                        <th>Reference#</th>
                                        <th>Customer</th>
                                        <th>Invoice#</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Credit Note#</th>
                                        <th>Reference#</th>
                                        <th>Customer</th>
                                        <th>Invoice#</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Balance</th>
                                        <th class="uk-text-center">Action</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php $count = 1; ?>
                                        @forelse($credit_notes as $credit_note)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $credit_note->credit_note_date }}</td>
                                            <td>CN-{{ $credit_note->credit_note_number }}</td>
                                            <td>{{ $credit_note->reference }}</td>
                                            <td>{{ $credit_note->customer->display_name }}</td>
                                            <td>
                                                @forelse($invoices as $invoice)
                                                    @foreach($credit_note->creditNotePayments as $payment)
                                                        @if($payment->invoice_id == $invoice->id)
                                                            {{ $invoice->invoice_number }} <br>
                                                        @endif
                                                    @endforeach
                                                @empty
                                                    No Invoice
                                                @endforelse
                                            </td>
                                            <td>
                                                <?php $total = 0; ?>
                                                @foreach($credit_note->creditNoteEntries as $entry)
                                                    <?php $total = $total + (float)$entry->amount ?>
                                                @endforeach

                                                @if($credit_note->total_credit_note > $total)
                                                    <p class="uk-text-success">Open</p>
                                                @else
                                                    <p class="uk-text-danger">Closed</p>
                                                @endif
                                            </td>
                                            <td>{{ $credit_note->total_credit_note }}</td>
                                            <td>
                                                <?php $total = 0;?>
                                                <?php $refund = 0;?>
                                                @foreach($credit_note->creditNotePayments as $entry)
                                                    <?php $total = $total + (float)$entry->amount ?>
                                                @endforeach

                                                    @foreach($credit_note->creditNoteRefunds as $refunds)
                                                        <?php $refund = $refund + (float)$refunds->amount ?>
                                                    @endforeach

                                                {{ $credit_note->total_credit_note - $total - $refund }}
                                            </td>
                                            <td>
                                                <a href="{{ route('credit_note_show', ['id' => $credit_note->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="View" class="md-icon material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('credit_note_edit', ['id' => $credit_note->id]) }}">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i>
                                                </a>
                                                <a class="delete_btn">
                                                    <i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i>
                                                </a>
                                                <input type="hidden" class="credit_note_id" value="{{ $credit_note->id }}">

                                                <a href="{!! route('credit_note_send_view',$credit_note->id) !!}"><i class="material-icons">&#xE0BE;</i></a>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- Add branch plus sign -->

                            <div class="md-fab-wrapper branch-create">
                                <a id="add_branch_button" href="{{ route('credit_note_create') }}" class="md-fab md-fab-accent branch-create">
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
            var id = $(this).next('.credit_note_id').val();
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = "/credit-note/delete/"+id;
            })
        })
    </script>
@endsection

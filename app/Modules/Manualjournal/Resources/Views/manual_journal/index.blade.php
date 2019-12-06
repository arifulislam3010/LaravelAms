@extends('layouts.main')

@section('title', 'Manual Journal')

@section('header')
    @include('inc.header')
@endsection

@section('sidebar')
    @include('inc.sidebar')
@endsection

@section('content')
    <h3 class="heading_b uk-margin-bottom">Journals</h3>

    <div class="md-card">
        <div class="md-card-content">
            <div class="uk-overflow-container uk-margin-bottom">
                <div style="padding: 5px;margin-bottom: 10px;" class="dt_colVis_buttons"></div>
                <table class="uk-table" cellspacing="0" width="100%" id="data_table" >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Journal</th>
                        <th>Ref#</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="uk-text-center">Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Journal</th>
                        <th>Ref#</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th class="uk-text-center">Action</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php $i = 1; $sum = 0; ?>
                    @foreach($journals as $journal)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $journal->date }}</td>
                            <td>{{ $journal->id }}</td>
                            <td>{{ $journal->reference }}</td>
                            <td>
                                <?php
                                    $amount = 0;
                                    foreach ($journal->journalEntries as $journalEntry)
                                    {
                                        $amount = $amount + $journalEntry->amount;
                                    }
                                    echo $amount;
                                ?>
                            </td>
                            <th>{{ substr($journal->note, 0, 50) }}</th>
                            <th>{{ $journal->updated_at }}</th>
                            <th>{{ $journal->createdBy->name }}</th>
                            <td class="uk-text-center">
                                <a href="{{ route('journal_edit',['id' => $journal->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Edit" class="md-icon material-icons">&#xE254;</i></a>
                               <a href="{{ route('journal_delete',['id' => $journal->id]) }}"><i data-uk-tooltip="{pos:'top'}" title="Delete" class="md-icon material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-accent" href="{{ route('journal_create') }}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('#sidebar_account').addClass('current_section');
        $('#sidebar_account_jurnal').addClass('act_item');
    </script>
@endsection
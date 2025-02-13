@extends('layouts.main')

@section('title', ' Access Level')

@section('header')
@include('inc.header')
@endsection

@section('sidebar')
@include('inc.sidebar')
@endsection

@section('content')

<div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
    <div class="uk-width-large-10-10">
        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-2-10">
                <div class="md-list-outside-wrapper">
                    @include('inc.settings_menu')
                </div>
            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-8-10">
                <div class="md-card">
                    <div class="user_content">
                        <div class="uk-margin-top">
                            {!! Form::open(['url' => route('access_level_update'), 'method' => 'post', 'class' => 'uk-form-stacked', 'id' => 'user_edit_form']) !!}
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-5 uk-vertical-align">
                                    <label for="role_id" class="uk-vertical-align-middle">Select Role</label>
                                </div>
                                <div class="uk-width-medium-2-5">
                                    <select id="role_id" name="role_id" data-md-selectize data-md-selectize-bottom data-uk-tooltip="{pos:'top'}" title="Select with tooltip">
                                        <option value="">Select role</option>
                                        @foreach($roles as $role)
                                        @if($role->id == $role_id)
                                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                        @else
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-overflow-container">
                                        <table class="uk-table uk-table-hover">
                                            <thead>
                                            <tr>
                                                <th>Module</th>
                                                <th>Create</th>
                                                <th>Read</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $count = 1; ?>
                                            @foreach($access_levels as $access_level)
                                            <tr>
                                                <td>{{ $access_level->module->module_name }}</td>
                                                <td>
                                                    <input type="hidden" name="module[]" value="{{ $access_level->module->id }}">
                                                    @if($access_level->create == 1)
                                                        <input type="checkbox" name="create_{{ $access_level->module->id }}" id="create_{{ $access_level->module->id }}" data-md-icheck data-parsley-mincheck="2"  checked/>
                                                    @else
                                                        <input type="checkbox" name="create_{{ $access_level->module->id }}" id="create_{{ $access_level->module->id }}" data-md-icheck data-parsley-mincheck="2" />
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($access_level->read == 1)
                                                        <input type="checkbox" name="read_{{ $access_level->module->id }}" id="read_{{ $access_level->module->id }}" data-md-icheck data-parsley-mincheck="2" checked/>
                                                    @else
                                                        <input type="checkbox" name="read_{{ $access_level->module->id }}" id="read_{{ $access_level->module->id }}" data-md-icheck data-parsley-mincheck="2" />
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($access_level->update == 1)
                                                        <input type="checkbox" name="update_{{ $access_level->module->id }}" id="update_{{ $access_level->module->id }}val_check_ski" data-md-icheck data-parsley-mincheck="2" checked/>
                                                    @else
                                                        <input type="checkbox" name="update_{{ $access_level->module->id }}" id="update_{{ $access_level->module->id }}val_check_ski" data-md-icheck data-parsley-mincheck="2" />
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($access_level->delete == 1)
                                                        <input type="checkbox" name="delete_{{ $access_level->module->id }}" id="delete_{{ $access_level->module->id }}" data-md-icheck data-parsley-mincheck="2" checked/>
                                                    @else
                                                        <input type="checkbox" name="delete_{{ $access_level->module->id }}" id="delete_{{ $access_level->module->id }}" data-md-icheck data-parsley-mincheck="2" />
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-1-1 uk-float-right">
                                    <button type="submit" class="md-btn md-btn-primary" >Submit</button>
                                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#role_id').change(function(){
            var id = $("#role_id :selected").val();
            var base_url = window.location.origin;
            var redirect_url = base_url + '/settings/access-level/edit/' + id;
            window.location.href = redirect_url;
        });
    </script>
    <script type="text/javascript">
        $('#settings_menu_user_access').addClass('md-list-item-active');
    </script>
@endsection
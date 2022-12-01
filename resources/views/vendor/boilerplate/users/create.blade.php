@extends('boilerplate::layout.index', [
    'title' => __('boilerplate::users.title'),
    'subtitle' => __('boilerplate::users.create.title'),
    'breadcrumb' => [
        __('boilerplate::users.title') => 'boilerplate.users.index',
        __('boilerplate::users.create.title')
    ]
])

@section('content')
    {{ Form::open(['route' => 'boilerplate.users.store', 'autocomplete' => 'off']) }}
        <div class="row">
            <div class="col-12 pb-3">
                <a href="{{ route("boilerplate.users.index") }}" class="btn btn-default" data-toggle="tooltip" title="@lang('boilerplate::users.returntolist')">
                    <span class="far fa-arrow-alt-circle-left text-muted"></span>
                </a>
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <!-- @lang('boilerplate::users.save') -->
                        <i class="fas fa-save"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                @component('boilerplate::card', ['color' => 'light', 'title' => 'boilerplate::users.informations'])
                    @component('boilerplate::select2', ['name' => 'active', 'label' => 'boilerplate::users.status', 'minimum-results-for-search' => '-1'])
                        <option value="1" @if (old('active', 1) == '1') selected="selected" @endif>@lang('boilerplate::users.active')</option>
                        <option value="0" @if (old('active') == '0') selected="selected" @endif>@lang('boilerplate::users.inactive')</option>
                    @endcomponent
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            @component('boilerplate::input', ['name' => 'full_name', 'label' => 'boilerplate::users.full_name', 'autofocus' => true])@endcomponent
                            @component('boilerplate::input', ['name' => 'username', 'label' => 'boilerplate::users.username'])@endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('boilerplate::password', ['name' => 'password', 'label' => ucfirst(__('boilerplate::auth.fields.password'))])@endcomponent
                        </div>
                        <div class="col-md-6">
                            @component('boilerplate::password', ['name' => 'password_confirmation', 'label' => ucfirst(__('boilerplate::auth.fields.password_confirm')), 'check' => false])@endcomponent
                        </div>
                    </div>
                @endcomponent
                @component('boilerplate::card', ['color' => 'light', 'title' => 'Optional'])
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan!</h5>
                        Wajib diisi jika role yang dipilih adalah Admin Kelurahan.
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12" id="location">
                            @component('boilerplate::select2', ['name' => 'id_kecamatan', 'label' => 'boilerplate::korbanbencana.kecamatan', 'id' => 'id_kecamatan', 'minimum-results-for-search' => '-1'])
                                @foreach($kecamatan as $kec)
                                    <option value="{{ $kec->id }}" @if (old('id_kecamatan') == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                                @endforeach
                            @endcomponent
                            <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'></x-boilerplate::select2>
                        </div>
                    </div>
                @endcomponent
            </div>
            <div class="col-lg-6">
                @component('boilerplate::card', ['color' => 'light', 'title' => 'boilerplate::users.roles'])
                    <table class="table table-sm table-hover">
                        @foreach($roles as $role)
                            <tr>
                                <td style="width:25px">
                                    @component('boilerplate::icheck', ['name' => 'roles['.$role->id.']', 'id' => 'role_'.$role->id, 'checked' => old('roles.'.$role->id) == 'on'])@endcomponent
                                </td>
                                <td>
                                    {{ Form::label('role_'.$role->id, $role->display_name, ['class' => 'mb-0 pb-0']) }}<br />
                                    <span class="small">{{ $role->description }}</span><br />
                                    <span class="small text-muted">{!! $role->permissions->implode('display_name', '<br>') !!}</span>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection

@push('js')
    <script type="text/javascript">
        if ($('input.checkbox_check').is(':checked')) {
            alert($(this).val();
        }
    </script>
@endpush

@extends('boilerplate::layout.index', [
    'title' => __('boilerplate::users.title'),
    'subtitle' => __('boilerplate::users.edit.title'),
    'breadcrumb' => [
        __('boilerplate::users.title') => 'boilerplate.users.index',
        __('boilerplate::users.edit.title')
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.users.update', $user->id], 'method' => 'put', 'autocomplete' => 'off']) }}
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
            <div class="col-md-6">
                @component('boilerplate::card', ['color' => 'light'])
                    <div class="d-flex flex-column flex-md-row">
                        <div id="avatar-wrapper">
                            <img src="{{ $user->avatar_url }}" class="avatar-img" alt="avatar" />
                        </div>
                        <div class="mt-3 mt-md-0 pl-md-3">
                            <span class="info-box-text">
                                <p class="mb-0"><strong class="h3">{{ $user->full_name  }}</strong></p>
                                <p class="">{{ $user->getRolesList() }}</p>
                            </span>
                            <span class="info-box-more">
                                <p class="mb-0 text-muted">
                                    {{ __('boilerplate::users.profile.subscribedsince', [
                                        'date' => $user->created_at->isoFormat(__('boilerplate::date.lFdY')),
                                        'since' => $user->created_at->diffForHumans()]) }}
                                </p>
                            </span>
                        </div>
                    </div>
                @endcomponent
                @component('boilerplate::card', ['color' => 'light', 'title' => __('boilerplate::users.informations')])
                    <div class="row">
                        <div class="col-md-12">
                        @if(Auth::user()->id !== $user->id)
                            @component('boilerplate::select2', ['name' => 'active', 'label' => 'boilerplate::users.status', 'minimum-results-for-search' => '-1'])
                                <option value="1" @if (old('active', $user->active) == '1') selected="selected" @endif>@lang('boilerplate::users.active')</option>
                                <option value="0" @if (old('active', $user->active) == '0') selected="selected" @endif>@lang('boilerplate::users.inactive')</option>
                            @endcomponent
                        @endif
                        @component('boilerplate::input', ['name' => 'full_name', 'label' => 'boilerplate::users.full_name', 'value' => $user->full_name])@endcomponent
                        @component('boilerplate::input', ['name' => 'username', 'label' => 'boilerplate::users.username', 'value' => $user->username])@endcomponent
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
                                <option value="{{ $kec->id }}" @if (old('id_kecamatan', $user->id_kecamatan) == $kec->id) selected="selected" @endif>{{ $kec->kecamatan }}</option>
                            @endforeach
                        @endcomponent
                        <x-boilerplate::select2 name="id_kelurahan" label="boilerplate::korbanbencana.kelurahan" :ajax="route('boilerplate.kel-desa.get-byidkec')" :minimum-results-for-search='-1'>
                            @if($keldes)
                            <option value="{{ $keldes->id }}" @if (old('id_kelurahan', $user->id_kelurahan) == $keldes->id) selected="selected" @endif>{{ $keldes->nama_deskel }}</option>
                            @endif
                        </x-boilerplate::select2>
                        </div>
                    </div>
                @endcomponent
            </div>
            <div class="col-md-6">
                @component('boilerplate::card', ['color' => 'light', 'title' =>__('boilerplate::users.roles')])
                    <table class="table table-sm table-hover">
                        @foreach($roles as $role)
                            @if($role->name !== 'admin' || ($role->name === 'admin' && Auth::user()->hasRole('admin')))
                            <tr>
                                <td style="width:25px">
                                    <div class="icheck-primary">
                                    @if(Auth::user()->id === $user->id && $role->name === 'admin' && Auth::user()->hasRole('admin'))
                                        {{ Form::checkbox('roles['.$role->id.']', 1, old('roles['.$role->id.']', $user->hasRole($role->name)), ['id' => 'role_'.$role->id, 'class' => 'icheck', 'checked', 'disabled']) }}
                                        {!! Form::hidden('roles['.$role->id.']', '1', ['id' => 'role_'.$role->id]) !!}
                                    @else
                                        {{ Form::checkbox('roles['.$role->id.']', 1, old('roles['.$role->id.']', $user->hasRole($role->name)), ['id' => 'role_'.$role->id, 'class' => 'icheck']) }}
                                    @endif
                                        <label for="{{ 'role_'.$role->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ Form::label('role_'.$role->id, $role->display_name, ['class' => 'mb-0']) }}</div>
                                    <div class="small">{{ $role->description }}</div>
                                    <div class="small text-muted pt-1">{!! $role->permissions->implode('display_name', '<br>') !!}</div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                @endcomponent
            </div>
        </div>
    {{ Form::close() }}
@endsection

@extends('boilerplate::layout.index', [
    'title' => __('boilerplate::users.profile.title'),
    'subtitle' => $user->full_name,
    'breadcrumb' => [
        $user->full_name => 'boilerplate.user.profile',
    ]
])

@section('content')
    {{ Form::open(['route' => ['boilerplate.user.profile'], 'method' => 'post', 'autocomplete' => 'off', 'files' => true]) }}
        <div class="row">
            <div class="col-12 mb-3">
                <span class="btn-group float-right">
                    <button type="submit" class="btn btn-primary">
                        <!-- @lang('boilerplate::users.save') -->
                        <i class="fas fa-save"></i>
                    </button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5">
                @component('boilerplate::card', ['color' => 'light', 'title' => __('boilerplate::users.profile.title')])
                    <div class="d-flex flex-wrap">
                        <div id="avatar-wrapper" class="mb-3">
                            @include('boilerplate::users.avatar')
                        </div>
                        <div class="pl-3">
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
            </div>
            <div class="col-xl-7">
                @component('boilerplate::card', ['color' => 'light', 'title' => __('boilerplate::users.informations')])
                    <div class="row">
                        <div class="col-md-6">
                            @component('boilerplate::input', ['name' => 'full_name', 'label' => 'boilerplate::users.full_name', 'value' => $user->full_name, 'autofocus' => true])@endcomponent
                        </div>
                        <div class="col-md-6">
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
            </div>
        </div>
    {{ Form::close() }}
@endsection

@push('js')
    <script>
        var avatar = {
            url: "{{ route('boilerplate.user.avatar.url', null, false) }}",
            locales: {
                delete: "@lang('boilerplate::avatar.delete')",
                gravatar: {
                    success: "@lang('boilerplate::avatar.gravatar.success')",
                    error: "@lang('boilerplate::avatar.gravatar.error')",
                },
                upload: {
                    success: "@lang('boilerplate::avatar.upload.success')",
                    error: "@lang('boilerplate::avatar.upload.error')",
                }
            }
        }
    </script>
    <script src="{{ mix('/avatar.min.js', '/assets/vendor/boilerplate') }}"></script>
@endpush

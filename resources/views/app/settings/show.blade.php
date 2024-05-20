@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('settings.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.settings.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.nom_site')</h5>
                    <span>{{ $setting->nom_site ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.logo_site')</h5>
                    <span>{{ $setting->logo_site ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.contact_site')</h5>
                    <span>{{ $setting->contact_site ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.email_site')</h5>
                    <span>{{ $setting->email_site ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.defaut_lang')</h5>
                    <span>{{ $setting->defaut_lang ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.position_site')</h5>
                    <span>{{ $setting->position_site ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.list_social')</h5>
                    <span>{{ $setting->list_social ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.settings.inputs.lien_contact')</h5>
                    <span>{{ $setting->lien_contact ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('settings.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Setting::class)
                <a href="{{ route('settings.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

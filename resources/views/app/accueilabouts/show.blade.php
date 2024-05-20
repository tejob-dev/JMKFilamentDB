@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilabouts.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilabouts.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.section')</h5>
                    <span>{{ $accueilabout->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.title')</h5>
                    <span>{{ $accueilabout->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.text')</h5>
                    <span>{{ $accueilabout->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.subservice')</h5>
                    <span>{{ $accueilabout->subservice ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.boutontitre')</h5>
                    <span>{{ $accueilabout->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.boutonlien')</h5>
                    <span>{{ $accueilabout->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilabout->image ? \Storage::url($accueilabout->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.imagetitle')</h5>
                    <span>{{ $accueilabout->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilabouts.inputs.imagetextlist')</h5>
                    <span>{{ $accueilabout->imagetextlist ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilabouts.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilabout::class)
                <a
                    href="{{ route('accueilabouts.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

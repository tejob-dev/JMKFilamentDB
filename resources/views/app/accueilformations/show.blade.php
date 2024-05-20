@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilformations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilformations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.section')</h5>
                    <span>{{ $accueilformation->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.title')</h5>
                    <span>{{ $accueilformation->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.text')</h5>
                    <span>{{ $accueilformation->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.boutontitre')</h5>
                    <span>{{ $accueilformation->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.boutonlien')</h5>
                    <span>{{ $accueilformation->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.imagetitle')</h5>
                    <span>{{ $accueilformation->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilformations.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilformation->image ? \Storage::url($accueilformation->image) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilformations.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilformation::class)
                <a
                    href="{{ route('accueilformations.create') }}"
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

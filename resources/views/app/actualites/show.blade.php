@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('actualites.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.actualites.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.section')</h5>
                    <span>{{ $actualite->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.title')</h5>
                    <span>{{ $actualite->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.text')</h5>
                    <span>{{ $actualite->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.boutontitre')</h5>
                    <span>{{ $actualite->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.boutonlien')</h5>
                    <span>{{ $actualite->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $actualite->image ? \Storage::url($actualite->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.imagetitle')</h5>
                    <span>{{ $actualite->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.dateactu')</h5>
                    <span>{{ $actualite->dateactu ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.managernom')</h5>
                    <span>{{ $actualite->managernom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.typeformation_id')</h5>
                    <span
                        >{{ optional($actualite->typeformation)->title ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.actualites.inputs.accueilactu_id')</h5>
                    <span
                        >{{ optional($actualite->accueilactu)->title ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('actualites.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Actualite::class)
                <a
                    href="{{ route('actualites.create') }}"
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

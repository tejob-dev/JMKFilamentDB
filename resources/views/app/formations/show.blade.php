@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('formations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.formations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.title')</h5>
                    <span>{{ $formation->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.text')</h5>
                    <span>{{ $formation->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.boutontitre')</h5>
                    <span>{{ $formation->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.boutonlien')</h5>
                    <span>{{ $formation->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $formation->image ? \Storage::url($formation->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.imagetitle')</h5>
                    <span>{{ $formation->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.typeformation_id')</h5>
                    <span
                        >{{ optional($formation->typeformation)->title ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.formations.inputs.accueilformation_id')</h5>
                    <span
                        >{{ optional($formation->accueilformation)->title ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('formations.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Formation::class)
                <a
                    href="{{ route('formations.create') }}"
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

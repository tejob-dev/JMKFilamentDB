@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilactus.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilactus.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.section')</h5>
                    <span>{{ $accueilactu->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.title')</h5>
                    <span>{{ $accueilactu->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.text')</h5>
                    <span>{{ $accueilactu->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.boutontitre')</h5>
                    <span>{{ $accueilactu->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.boutonlien')</h5>
                    <span>{{ $accueilactu->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilactu->image ? \Storage::url($accueilactu->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilactus.inputs.imagetitle')</h5>
                    <span>{{ $accueilactu->imagetitle ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilactus.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilactu::class)
                <a
                    href="{{ route('accueilactus.create') }}"
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

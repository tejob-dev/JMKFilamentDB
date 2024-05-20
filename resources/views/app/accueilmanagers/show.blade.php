@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilmanagers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilmanagers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.section')</h5>
                    <span>{{ $accueilmanager->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.title')</h5>
                    <span>{{ $accueilmanager->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.text')</h5>
                    <span>{{ $accueilmanager->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.boutontitre')</h5>
                    <span>{{ $accueilmanager->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.boutonlien')</h5>
                    <span>{{ $accueilmanager->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilmanager->image ? \Storage::url($accueilmanager->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.imagetitle')</h5>
                    <span>{{ $accueilmanager->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanagers.inputs.textentreprise')</h5>
                    <span>{{ $accueilmanager->textentreprise ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilmanagers.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilmanager::class)
                <a
                    href="{{ route('accueilmanagers.create') }}"
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

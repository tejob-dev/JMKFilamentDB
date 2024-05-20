@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilclients.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilclients.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.section')</h5>
                    <span>{{ $accueilclient->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.title')</h5>
                    <span>{{ $accueilclient->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.text')</h5>
                    <span>{{ $accueilclient->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.boutontitre')</h5>
                    <span>{{ $accueilclient->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.boutonlien')</h5>
                    <span>{{ $accueilclient->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.imagetitle')</h5>
                    <span>{{ $accueilclient->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclients.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilclient->image ? \Storage::url($accueilclient->image) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilclients.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilclient::class)
                <a
                    href="{{ route('accueilclients.create') }}"
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

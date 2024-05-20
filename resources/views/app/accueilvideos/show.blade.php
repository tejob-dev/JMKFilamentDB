@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilvideos.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilvideos.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilvideos.inputs.section')</h5>
                    <span>{{ $accueilvideo->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilvideos.inputs.title')</h5>
                    <span>{{ $accueilvideo->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilvideos.inputs.text')</h5>
                    <span>{{ $accueilvideo->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilvideos.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilvideo->image ? \Storage::url($accueilvideo->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilvideos.inputs.videolien')</h5>
                    <span>{{ $accueilvideo->videolien ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilvideos.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilvideo::class)
                <a
                    href="{{ route('accueilvideos.create') }}"
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

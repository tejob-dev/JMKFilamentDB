@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('slides.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.slides.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.slides.inputs.title')</h5>
                    <span>{{ $slide->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.slides.inputs.soustitle')</h5>
                    <span>{{ $slide->soustitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.slides.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $slide->image ? \Storage::url($slide->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.slides.inputs.boutontitre')</h5>
                    <span>{{ $slide->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.slides.inputs.boutonlien')</h5>
                    <span>{{ $slide->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.slides.inputs.icone')</h5>
                    <span>{{ $slide->icone ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('slides.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Slide::class)
                <a href="{{ route('slides.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

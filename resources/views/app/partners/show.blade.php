@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('partners.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.partners.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.partners.inputs.imagetitle')</h5>
                    <span>{{ $partner->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.partners.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $partner->image ? \Storage::url($partner->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.partners.inputs.descript')</h5>
                    <span>{{ $partner->descript ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('partners.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Partner::class)
                <a href="{{ route('partners.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

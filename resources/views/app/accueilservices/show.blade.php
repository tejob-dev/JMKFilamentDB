@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilservices.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilservices.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilservices.inputs.secton')</h5>
                    <span>{{ $accueilservice->secton ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilservices.inputs.title')</h5>
                    <span>{{ $accueilservice->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilservices.inputs.text')</h5>
                    <span>{{ $accueilservice->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilservices.inputs.boutonlien')</h5>
                    <span>{{ $accueilservice->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilservices.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilservice->image ? \Storage::url($accueilservice->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilservices.inputs.imagetitle')</h5>
                    <span>{{ $accueilservice->imagetitle ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilservices.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilservice::class)
                <a
                    href="{{ route('accueilservices.create') }}"
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

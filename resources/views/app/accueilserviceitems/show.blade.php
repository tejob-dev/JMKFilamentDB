@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilserviceitems.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilserviceitems.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilserviceitems.inputs.title')</h5>
                    <span>{{ $accueilserviceitem->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilserviceitems.inputs.text')</h5>
                    <span>{{ $accueilserviceitem->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilserviceitems.inputs.subservice')</h5>
                    <span>{{ $accueilserviceitem->subservice ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.accueilserviceitems.inputs.boutontitre')
                    </h5>
                    <span>{{ $accueilserviceitem->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilserviceitems.inputs.boutonlien')</h5>
                    <span>{{ $accueilserviceitem->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.accueilserviceitems.inputs.accueilservice_id')
                    </h5>
                    <span
                        >{{ optional($accueilserviceitem->accueilservice)->title
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilserviceitems.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilserviceitem::class)
                <a
                    href="{{ route('accueilserviceitems.create') }}"
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilmanageritems.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilmanageritems.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanageritems.inputs.title')</h5>
                    <span>{{ $accueilmanageritem->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanageritems.inputs.text')</h5>
                    <span>{{ $accueilmanageritem->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanageritems.inputs.icone')</h5>
                    <span>{{ $accueilmanageritem->icone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.accueilmanageritems.inputs.boutontitre')
                    </h5>
                    <span>{{ $accueilmanageritem->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilmanageritems.inputs.boutonlien')</h5>
                    <span>{{ $accueilmanageritem->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.accueilmanageritems.inputs.accueilmanager_id')
                    </h5>
                    <span
                        >{{ optional($accueilmanageritem->accueilmanager)->title
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilmanageritems.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilmanageritem::class)
                <a
                    href="{{ route('accueilmanageritems.create') }}"
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueilclientitems.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueilclientitems.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueilclientitems.inputs.title')</h5>
                    <span>{{ $accueilclientitem->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclientitems.inputs.text')</h5>
                    <span>{{ $accueilclientitem->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclientitems.inputs.boutontitre')</h5>
                    <span>{{ $accueilclientitem->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclientitems.inputs.boutonlien')</h5>
                    <span>{{ $accueilclientitem->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclientitems.inputs.icone')</h5>
                    <span>{{ $accueilclientitem->icone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueilclientitems.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueilclientitem->image ? \Storage::url($accueilclientitem->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.accueilclientitems.inputs.accueilclient_id')
                    </h5>
                    <span
                        >{{ optional($accueilclientitem->accueilclient)->title
                        ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueilclientitems.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueilclientitem::class)
                <a
                    href="{{ route('accueilclientitems.create') }}"
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

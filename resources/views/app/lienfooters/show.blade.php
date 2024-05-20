@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('lienfooters.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.lienfooters.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.lienfooters.inputs.titre')</h5>
                    <span>{{ $lienfooter->titre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.lienfooters.inputs.lien_page')</h5>
                    <span>{{ $lienfooter->lien_page ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.lienfooters.inputs.descript')</h5>
                    <span>{{ $lienfooter->descript ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('lienfooters.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Lienfooter::class)
                <a
                    href="{{ route('lienfooters.create') }}"
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

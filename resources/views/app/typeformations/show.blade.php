@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('typeformations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.typeformations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.typeformations.inputs.title')</h5>
                    <span>{{ $typeformation->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.typeformations.inputs.text')</h5>
                    <span>{{ $typeformation->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.typeformations.inputs.icone')</h5>
                    <span>{{ $typeformation->icone ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('typeformations.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Typeformation::class)
                <a
                    href="{{ route('typeformations.create') }}"
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('accueiltemoins.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.accueiltemoins.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.section')</h5>
                    <span>{{ $accueiltemoin->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.title')</h5>
                    <span>{{ $accueiltemoin->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.text')</h5>
                    <span>{{ $accueiltemoin->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.boutontitre')</h5>
                    <span>{{ $accueiltemoin->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.boutonlien')</h5>
                    <span>{{ $accueiltemoin->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $accueiltemoin->image ? \Storage::url($accueiltemoin->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.accueiltemoins.inputs.imagetitle')</h5>
                    <span>{{ $accueiltemoin->imagetitle ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('accueiltemoins.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Accueiltemoin::class)
                <a
                    href="{{ route('accueiltemoins.create') }}"
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

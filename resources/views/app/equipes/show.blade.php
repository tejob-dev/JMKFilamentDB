@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('equipes.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.equipes.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.section')</h5>
                    <span>{{ $equipe->section ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.title')</h5>
                    <span>{{ $equipe->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.text')</h5>
                    <span>{{ $equipe->text ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.boutontitre')</h5>
                    <span>{{ $equipe->boutontitre ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.boutonlien')</h5>
                    <span>{{ $equipe->boutonlien ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $equipe->image ? \Storage::url($equipe->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.imagetitle')</h5>
                    <span>{{ $equipe->imagetitle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.nom_prenom')</h5>
                    <span>{{ $equipe->nom_prenom ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.fonction')</h5>
                    <span>{{ $equipe->fonction ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.equipes.inputs.accueiltemoin_id')</h5>
                    <span
                        >{{ optional($equipe->accueiltemoin)->title ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('equipes.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Equipe::class)
                <a href="{{ route('equipes.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

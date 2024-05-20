@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.equipes.index_title')</h4>
            </div>

            <div class="searchbar mt-4 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="input-group">
                                <input
                                    id="indexSearch"
                                    type="text"
                                    name="search"
                                    placeholder="{{ __('crud.common.search') }}"
                                    value="{{ $search ?? '' }}"
                                    class="form-control"
                                    autocomplete="off"
                                />
                                <div class="input-group-append">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        <i class="icon ion-md-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        @can('create', App\Models\Equipe::class)
                        <a
                            href="{{ route('equipes.create') }}"
                            class="btn btn-primary"
                        >
                            <i class="icon ion-md-add"></i>
                            @lang('crud.common.create')
                        </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.section')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.boutontitre')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.boutonlien')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.imagetitle')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.nom_prenom')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.fonction')
                            </th>
                            <th class="text-left">
                                @lang('crud.equipes.inputs.accueiltemoin_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($equipes as $equipe)
                        <tr>
                            <td>{{ $equipe->section ?? '-' }}</td>
                            <td>{{ $equipe->title ?? '-' }}</td>
                            <td>{{ $equipe->text ?? '-' }}</td>
                            <td>{{ $equipe->boutontitre ?? '-' }}</td>
                            <td>{{ $equipe->boutonlien ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $equipe->image ? \Storage::url($equipe->image) : '' }}"
                                />
                            </td>
                            <td>{{ $equipe->imagetitle ?? '-' }}</td>
                            <td>{{ $equipe->nom_prenom ?? '-' }}</td>
                            <td>{{ $equipe->fonction ?? '-' }}</td>
                            <td>
                                {{ optional($equipe->accueiltemoin)->title ??
                                '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $equipe)
                                    <a
                                        href="{{ route('equipes.edit', $equipe) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $equipe)
                                    <a
                                        href="{{ route('equipes.show', $equipe) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $equipe)
                                    <form
                                        action="{{ route('equipes.destroy', $equipe) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="11">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11">{!! $equipes->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

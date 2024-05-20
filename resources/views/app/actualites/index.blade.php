@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.actualites.index_title')</h4>
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
                        @can('create', App\Models\Actualite::class)
                        <a
                            href="{{ route('actualites.create') }}"
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
                                @lang('crud.actualites.inputs.section')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.boutontitre')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.boutonlien')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.imagetitle')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.dateactu')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.managernom')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.typeformation_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.actualites.inputs.accueilactu_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($actualites as $actualite)
                        <tr>
                            <td>{{ $actualite->section ?? '-' }}</td>
                            <td>{{ $actualite->title ?? '-' }}</td>
                            <td>{{ $actualite->text ?? '-' }}</td>
                            <td>{{ $actualite->boutontitre ?? '-' }}</td>
                            <td>{{ $actualite->boutonlien ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $actualite->image ? \Storage::url($actualite->image) : '' }}"
                                />
                            </td>
                            <td>{{ $actualite->imagetitle ?? '-' }}</td>
                            <td>{{ $actualite->dateactu ?? '-' }}</td>
                            <td>{{ $actualite->managernom ?? '-' }}</td>
                            <td>
                                {{ optional($actualite->typeformation)->title ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($actualite->accueilactu)->title ??
                                '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $actualite)
                                    <a
                                        href="{{ route('actualites.edit', $actualite) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $actualite)
                                    <a
                                        href="{{ route('actualites.show', $actualite) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $actualite)
                                    <form
                                        action="{{ route('actualites.destroy', $actualite) }}"
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
                            <td colspan="12">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">{!! $actualites->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

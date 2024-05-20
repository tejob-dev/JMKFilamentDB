@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.accueilabouts.index_title')
                </h4>
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
                        @can('create', App\Models\Accueilabout::class)
                        <a
                            href="{{ route('accueilabouts.create') }}"
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
                                @lang('crud.accueilabouts.inputs.section')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.subservice')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.boutontitre')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.boutonlien')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.imagetitle')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilabouts.inputs.imagetextlist')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accueilabouts as $accueilabout)
                        <tr>
                            <td>{{ $accueilabout->section ?? '-' }}</td>
                            <td>{{ $accueilabout->title ?? '-' }}</td>
                            <td>{{ $accueilabout->text ?? '-' }}</td>
                            <td>{{ $accueilabout->subservice ?? '-' }}</td>
                            <td>{{ $accueilabout->boutontitre ?? '-' }}</td>
                            <td>{{ $accueilabout->boutonlien ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $accueilabout->image ? \Storage::url($accueilabout->image) : '' }}"
                                />
                            </td>
                            <td>{{ $accueilabout->imagetitle ?? '-' }}</td>
                            <td>{{ $accueilabout->imagetextlist ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $accueilabout)
                                    <a
                                        href="{{ route('accueilabouts.edit', $accueilabout) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $accueilabout)
                                    <a
                                        href="{{ route('accueilabouts.show', $accueilabout) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $accueilabout)
                                    <form
                                        action="{{ route('accueilabouts.destroy', $accueilabout) }}"
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
                            <td colspan="10">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">
                                {!! $accueilabouts->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

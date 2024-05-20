@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.accueilclients.index_title')
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
                        @can('create', App\Models\Accueilclient::class)
                        <a
                            href="{{ route('accueilclients.create') }}"
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
                                @lang('crud.accueilclients.inputs.section')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilclients.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilclients.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilclients.inputs.boutontitre')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilclients.inputs.boutonlien')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilclients.inputs.imagetitle')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilclients.inputs.image')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accueilclients as $accueilclient)
                        <tr>
                            <td>{{ $accueilclient->section ?? '-' }}</td>
                            <td>{{ $accueilclient->title ?? '-' }}</td>
                            <td>{{ $accueilclient->text ?? '-' }}</td>
                            <td>{{ $accueilclient->boutontitre ?? '-' }}</td>
                            <td>{{ $accueilclient->boutonlien ?? '-' }}</td>
                            <td>{{ $accueilclient->imagetitle ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $accueilclient->image ? \Storage::url($accueilclient->image) : '' }}"
                                />
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $accueilclient)
                                    <a
                                        href="{{ route('accueilclients.edit', $accueilclient) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $accueilclient)
                                    <a
                                        href="{{ route('accueilclients.show', $accueilclient) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $accueilclient)
                                    <form
                                        action="{{ route('accueilclients.destroy', $accueilclient) }}"
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
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                {!! $accueilclients->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.formations.index_title')</h4>
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
                        @can('create', App\Models\Formation::class)
                        <a
                            href="{{ route('formations.create') }}"
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
                                @lang('crud.formations.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.boutontitre')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.boutonlien')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.imagetitle')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.typeformation_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.formations.inputs.accueilformation_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($formations as $formation)
                        <tr>
                            <td>{{ $formation->title ?? '-' }}</td>
                            <td>{{ $formation->text ?? '-' }}</td>
                            <td>{{ $formation->boutontitre ?? '-' }}</td>
                            <td>{{ $formation->boutonlien ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $formation->image ? \Storage::url($formation->image) : '' }}"
                                />
                            </td>
                            <td>{{ $formation->imagetitle ?? '-' }}</td>
                            <td>
                                {{ optional($formation->typeformation)->title ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($formation->accueilformation)->title
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $formation)
                                    <a
                                        href="{{ route('formations.edit', $formation) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $formation)
                                    <a
                                        href="{{ route('formations.show', $formation) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $formation)
                                    <form
                                        action="{{ route('formations.destroy', $formation) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $formations->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.accueilserviceitems.index_title')
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
                        @can('create', App\Models\Accueilserviceitem::class)
                        <a
                            href="{{ route('accueilserviceitems.create') }}"
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
                                @lang('crud.accueilserviceitems.inputs.title')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilserviceitems.inputs.text')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilserviceitems.inputs.subservice')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilserviceitems.inputs.boutontitre')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilserviceitems.inputs.boutonlien')
                            </th>
                            <th class="text-left">
                                @lang('crud.accueilserviceitems.inputs.accueilservice_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($accueilserviceitems as $accueilserviceitem)
                        <tr>
                            <td>{{ $accueilserviceitem->title ?? '-' }}</td>
                            <td>{{ $accueilserviceitem->text ?? '-' }}</td>
                            <td>
                                {{ $accueilserviceitem->subservice ?? '-' }}
                            </td>
                            <td>
                                {{ $accueilserviceitem->boutontitre ?? '-' }}
                            </td>
                            <td>
                                {{ $accueilserviceitem->boutonlien ?? '-' }}
                            </td>
                            <td>
                                {{
                                optional($accueilserviceitem->accueilservice)->title
                                ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $accueilserviceitem)
                                    <a
                                        href="{{ route('accueilserviceitems.edit', $accueilserviceitem) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $accueilserviceitem)
                                    <a
                                        href="{{ route('accueilserviceitems.show', $accueilserviceitem) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $accueilserviceitem)
                                    <form
                                        action="{{ route('accueilserviceitems.destroy', $accueilserviceitem) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                {!! $accueilserviceitems->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

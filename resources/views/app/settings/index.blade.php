@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.settings.index_title')</h4>
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
                        @can('create', App\Models\Setting::class)
                        <a
                            href="{{ route('settings.create') }}"
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
                                @lang('crud.settings.inputs.nom_site')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.logo_site')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.contact_site')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.email_site')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.defaut_lang')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.position_site')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.list_social')
                            </th>
                            <th class="text-left">
                                @lang('crud.settings.inputs.lien_contact')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($settings as $setting)
                        <tr>
                            <td>{{ $setting->nom_site ?? '-' }}</td>
                            <td>{{ $setting->logo_site ?? '-' }}</td>
                            <td>{{ $setting->contact_site ?? '-' }}</td>
                            <td>{{ $setting->email_site ?? '-' }}</td>
                            <td>{{ $setting->defaut_lang ?? '-' }}</td>
                            <td>{{ $setting->position_site ?? '-' }}</td>
                            <td>{{ $setting->list_social ?? '-' }}</td>
                            <td>{{ $setting->lien_contact ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $setting)
                                    <a
                                        href="{{ route('settings.edit', $setting) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $setting)
                                    <a
                                        href="{{ route('settings.show', $setting) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $setting)
                                    <form
                                        action="{{ route('settings.destroy', $setting) }}"
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
                            <td colspan="9">{!! $settings->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

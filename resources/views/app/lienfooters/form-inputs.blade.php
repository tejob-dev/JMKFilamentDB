@php $editing = isset($lienfooter) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="titre"
            label="Titre"
            :value="old('titre', ($editing ? $lienfooter->titre : ''))"
            maxlength="255"
            placeholder="Titre"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lien_page"
            label="Lien Page"
            :value="old('lien_page', ($editing ? $lienfooter->lien_page : ''))"
            maxlength="255"
            placeholder="Lien Page"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="descript" label="Descript" maxlength="255"
            >{{ old('descript', ($editing ? $lienfooter->descript : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>
</div>

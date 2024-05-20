@php $editing = isset($setting) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nom_site"
            label="Nom Site"
            :value="old('nom_site', ($editing ? $setting->nom_site : ''))"
            maxlength="255"
            placeholder="Nom Site"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="logo_site"
            label="Logo Site"
            :value="old('logo_site', ($editing ? $setting->logo_site : ''))"
            maxlength="255"
            placeholder="Logo Site"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="contact_site"
            label="Contact Site"
            :value="old('contact_site', ($editing ? $setting->contact_site : ''))"
            maxlength="255"
            placeholder="Contact Site"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="email_site"
            label="Email Site"
            :value="old('email_site', ($editing ? $setting->email_site : ''))"
            maxlength="255"
            placeholder="Email Site"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="defaut_lang"
            label="Defaut Lang"
            :value="old('defaut_lang', ($editing ? $setting->defaut_lang : 'fr'))"
            maxlength="255"
            placeholder="Defaut Lang"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="position_site"
            label="Position Site"
            :value="old('position_site', ($editing ? $setting->position_site : ''))"
            maxlength="255"
            placeholder="Position Site"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="list_social"
            label="List Social"
            :value="old('list_social', ($editing ? $setting->list_social : ''))"
            maxlength="255"
            placeholder="List Social"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="lien_contact"
            label="Lien Contact"
            :value="old('lien_contact', ($editing ? $setting->lien_contact : ''))"
            maxlength="255"
            placeholder="Lien Contact"
        ></x-inputs.text>
    </x-inputs.group>
</div>

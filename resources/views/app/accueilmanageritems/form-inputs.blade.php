@php $editing = isset($accueilmanageritem) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $accueilmanageritem->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="Text" maxlength="255"
            >{{ old('text', ($editing ? $accueilmanageritem->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="icone" label="Icone">
            @php $selected = old('icone', ($editing ? $accueilmanageritem->icone : '')) @endphp
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutontitre"
            label="Boutontitre"
            :value="old('boutontitre', ($editing ? $accueilmanageritem->boutontitre : ''))"
            maxlength="255"
            placeholder="Boutontitre"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutonlien"
            label="Boutonlien"
            :value="old('boutonlien', ($editing ? $accueilmanageritem->boutonlien : ''))"
            maxlength="255"
            placeholder="Boutonlien"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="accueilmanager_id" label="Accueilmanager">
            @php $selected = old('accueilmanager_id', ($editing ? $accueilmanageritem->accueilmanager_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Accueilmanager</option>
            @foreach($accueilmanagers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

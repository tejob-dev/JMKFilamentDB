@php $editing = isset($accueilserviceitem) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $accueilserviceitem->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="Text" maxlength="255"
            >{{ old('text', ($editing ? $accueilserviceitem->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="subservice" label="Subservice" maxlength="255"
            >{{ old('subservice', ($editing ? $accueilserviceitem->subservice :
            '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutontitre"
            label="Boutontitre"
            :value="old('boutontitre', ($editing ? $accueilserviceitem->boutontitre : ''))"
            maxlength="255"
            placeholder="Boutontitre"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutonlien"
            label="Boutonlien"
            :value="old('boutonlien', ($editing ? $accueilserviceitem->boutonlien : ''))"
            maxlength="255"
            placeholder="Boutonlien"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="accueilservice_id" label="Accueilservice">
            @php $selected = old('accueilservice_id', ($editing ? $accueilserviceitem->accueilservice_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Accueilservice</option>
            @foreach($accueilservices as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

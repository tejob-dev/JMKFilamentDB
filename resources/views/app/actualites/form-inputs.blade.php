@php $editing = isset($actualite) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="section"
            label="Section"
            :value="old('section', ($editing ? $actualite->section : ''))"
            maxlength="255"
            placeholder="Section"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $actualite->title : ''))"
            maxlength="255"
            placeholder="Title"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="Text" maxlength="255"
            >{{ old('text', ($editing ? $actualite->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutontitre"
            label="Boutontitre"
            :value="old('boutontitre', ($editing ? $actualite->boutontitre : ''))"
            maxlength="255"
            placeholder="Boutontitre"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutonlien"
            label="Boutonlien"
            :value="old('boutonlien', ($editing ? $actualite->boutonlien : ''))"
            maxlength="255"
            placeholder="Boutonlien"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $actualite->image ? \Storage::url($actualite->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="Image"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="imagetitle"
            label="Imagetitle"
            :value="old('imagetitle', ($editing ? $actualite->imagetitle : ''))"
            maxlength="255"
            placeholder="Imagetitle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="dateactu"
            label="Dateactu"
            value="{{ old('dateactu', ($editing ? optional($actualite->dateactu)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="managernom"
            label="Managernom"
            :value="old('managernom', ($editing ? $actualite->managernom : ''))"
            maxlength="255"
            placeholder="Managernom"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="typeformation_id" label="Typeformation">
            @php $selected = old('typeformation_id', ($editing ? $actualite->typeformation_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Typeformation</option>
            @foreach($typeformations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="accueilactu_id" label="Accueilactu">
            @php $selected = old('accueilactu_id', ($editing ? $actualite->accueilactu_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Accueilactu</option>
            @foreach($accueilactus as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>

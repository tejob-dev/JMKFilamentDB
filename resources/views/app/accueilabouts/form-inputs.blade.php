@php $editing = isset($accueilabout) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="section"
            label="Section"
            :value="old('section', ($editing ? $accueilabout->section : ''))"
            maxlength="255"
            placeholder="Section"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="Title"
            :value="old('title', ($editing ? $accueilabout->title : ''))"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="text" label="Text" maxlength="255"
            >{{ old('text', ($editing ? $accueilabout->text : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="subservice" label="Subservice" maxlength="255"
            >{{ old('subservice', ($editing ? $accueilabout->subservice : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutontitre"
            label="Boutontitre"
            :value="old('boutontitre', ($editing ? $accueilabout->boutontitre : ''))"
            maxlength="255"
            placeholder="Boutontitre"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="boutonlien"
            label="Boutonlien"
            :value="old('boutonlien', ($editing ? $accueilabout->boutonlien : ''))"
            maxlength="255"
            placeholder="Boutonlien"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $accueilabout->image ? \Storage::url($accueilabout->image) : '' }}')"
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
            :value="old('imagetitle', ($editing ? $accueilabout->imagetitle : ''))"
            maxlength="255"
            placeholder="Imagetitle"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="imagetextlist"
            label="Imagetextlist"
            :value="old('imagetextlist', ($editing ? $accueilabout->imagetextlist : ''))"
            maxlength="255"
            placeholder="Imagetextlist"
        ></x-inputs.text>
    </x-inputs.group>
</div>

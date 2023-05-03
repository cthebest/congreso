<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir presentaciones') }}
        </h2>
    </x-slot>
    <div class="p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div>
                    <label
                        for="formFile"
                        class="mb-2 inline-block text-neutral-700"
                    >Suba las presentaciones</label>

                    <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded
                        border border-solid border-neutral-300 bg-clip-padding
                        px-3 py-[0.32rem] text-base font-normal text-neutral-700
                        transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem]
                        file:overflow-hidden file:rounded-none file:border-0
                        file:border-solid file:border-inherit file:bg-neutral-100
                        file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition
                        file:duration-150 file:ease-in-out file:[border-inline-end-width:1px]
                        file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary
                        focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
                        type="file"
                        id="formFile" multiple accept="application/pdf,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" wire:model="files"/>
                    <x-input-error :messages="$errors->get('files')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4" wire:click="upload">
                        {{ __('Subir') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</div>

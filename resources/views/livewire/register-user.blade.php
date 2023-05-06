<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Registrar o actualizar usuario') }}
    </h2>
</x-slot>
<div class="p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div>
                @if (session()->has('message'))
                    <div class="bg-green-100 text-green-600 p-2">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                              required autofocus autocomplete="name" wire:model="user.name"/>
                <x-input-error :messages="$errors->get('user.name')" class="mt-2"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                              :value="old('email')" required autocomplete="username" wire:model="user.email"/>
                <x-input-error :messages="$errors->get('user.email')" class="mt-2"/>
            </div>

            <div class="mt-4 flex flex-col">
                {{html()->label("Roles")->for("roles")}}
                {{html()->select('roles', $roles)->attribute("wire:model", "role_id")}}
                <x-input-error :messages="$errors->get('role_id')" class="mt-2"/>
            </div>


            <div class="mt-4">
                <x-form-fieldset>
                    <legend>Ponencias disponibles</legend>
                    <div class="p-4">
                        <div class="mb-4">
                            <x-input-label for="search" :value="__('Search')"/>
                            <x-text-input id="search" class="block mt-1 w-full" type="text"
                                          name="search" :placeholder="__('Search')"
                                          wire:model="search_presentations"></x-text-input>
                        </div>
                        <ul>
                            @foreach($presentations as $presentation)
                                <li>{{$presentation->title}}
                                    <button class="text-green-600 hover:text-red-500"
                                            wire:click="assign({{$presentation->id}})">
                                        asignar
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-2">
                            {{$presentations->links()}}
                        </div>
                    </div>
                </x-form-fieldset>
            </div>

            @if(count($assigned_presentations)>0)
                <div class="mt-4">
                    <x-form-fieldset>
                        <legend>Ponencias Asignadas</legend>
                        <div class="p-4 max-h-36 overflow-y-auto">
                            <ul>
                                @foreach($assigned_presentations as $presentation)
                                    <li wire:key="{{ $loop->index }}"
                                        class="transition-colors delay-400 duration-300 {{$loop->last?'bg-red-100':''}}">
                                        {{$presentation['title']}}
                                        @if(!$presentation->review_question_users()->where('user_id', $user->id)->first())
                                            <button type="button" class="text-green-600 hover:text-red-400"
                                                    wire:click="unlock({{$loop->index}})">
                                                Liberar
                                            </button>
                                        @else
                                            <span class="text-blue-600">Evaluado</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </x-form-fieldset>
                </div>
            @else
                <span class="text-sm italic">Este usuario no tiene ponencias asignadas</span>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4" wire:click="store">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</div>

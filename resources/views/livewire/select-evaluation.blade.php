<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluar ponencia') }}
        </h2>
    </x-slot>
    <div class="p-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="flex flex-col">
                    <span class="font-semibold">Nombre del evaluador: {{auth()->user()->name}}</span>
                    <span class="font-semibold">Ponencia: {{$presentation->title}}</span>
                </div>
                @if(!$view_name)
                    {{html()->select('evaluation_format', $formats)->placeholder('Seleccione un formato')->attribute('wire:model','viewID')}}
                @else
                    @livewire($view_name, ['presentation_id'=>$presentation->id])
                @endif
            </div>
        </div>
    </div>
</div>

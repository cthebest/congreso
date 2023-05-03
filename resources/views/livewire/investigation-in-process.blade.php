<div>
    <h1 class="text-xl font-semibold mt-4">VALORACIÓN DE PONENCIAS RESULTADO DE INVESTIGACIONES EN PROCESO O
        CONCLUIDAS</h1>
    @if($errors->any())
        <div class="text-red-600 bg-red-100">
            <p>No se puede completar el registro debido a errores en el formulario. Por favor, asegúrese de haber
                seleccionado todos los criterios necesarios.</p>
        </div>
    @endif
    <div>

    </div>
    @foreach($evaluationPoints as $evaluation_key=>$evaluation)
        <div class="mt-4">
            <x-form-fieldset>
                <legend>{{$evaluation['name']}}</legend>
                <p>Seleccione su valoración respecto a la estructura del escrito.</p>
                <table class="table-auto table-layout-fixed">
                    <thead>
                    <tr>
                        <th class="w-1/2 px-4 py-2">ITEM</th>
                        <th class="w-1/2 px-4 py-2">SI / PARCIALMENTE / NO</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($evaluation['questions'] as $question_key=> $question)
                        <tr wire:key="{{ $loop->index }}">
                            <td class="px-4 py-2">{{$question['description']}}
                            </td>
                            <td class="px-4 py-2 flex justify-center">
                                {{html()->select('value',['si'=>'Sí','partial'=>'Parcialmente','no'=>'No'])
                                        ->placeholder('Seleccione')
                                        //->attribute('wire:change', 'changeEvent($event.target.value,'.$question_key.','.$evaluation_key.')')
                                        ->attribute('class', $errors->get($evaluation_key.'.questions.'.$question_key.'.note')?'border border-red-500':'')
                                        ->attribute('wire:key',$question_key)
                                        ->attribute('wire:model', 'evaluationPoints.'.$evaluation_key.'.questions.'.$question_key.'.note')}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-form-fieldset>
        </div>
    @endforeach

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4" wire:click="store">
            {{ __('Guardar') }}
        </x-primary-button>
    </div>
</div>

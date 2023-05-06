<div>
    <h1 class="text-xl font-semibold mt-4">VALORACIÓN DE PONENCIAS RESULTADO DE INVESTIGACIONES EN PROCESO O
        CONCLUIDAS</h1>
    @if($errors->any())
        <div class="text-red-600 bg-red-100">
            <p>No se puede completar el registro debido a errores en el formulario. Por favor, asegúrese de haber
                seleccionado todos los criterios necesarios.</p>
        </div>
    @endif
    <div class="mt-4">
        <x-form-fieldset>
            <legend>A.PERTINENCIA DEL TRABAJO CON RESPECTO A LA FORMACIÓN DE PROFESORES, LOS EJES PROBLÉMICOS Y AL
                LEMA.
            </legend>
            <p>Seleccione el eje temático al cual se ajusta el escrito.</p>
            <x-input-error :messages="$errors->get('thematic')" class="mt-2"/>
            <table class="table-auto table-layout-fixed">
                <thead>
                <tr>
                    <th class="w-1/2 px-4 py-2">EJES TEMÁTICOS</th>
                    <th class="w-1/2 px-4 py-2"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($thematics as $thematic)
                    <tr class="border">
                        <td class="px-4 py-2">{{$loop->iteration}}. {{$thematic->description}}
                        </td>
                        <td class="px-4 py-2 flex justify-center">
                            {{html()->radio('thematic')->value($thematic->id)->attribute('wire:model','thematic')}}
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </x-form-fieldset>
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
                        <tr>
                            <td class="px-4 py-2">{{$loop->iteration}}. {{$question['description']}}
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

    <div class="mt-4 flex flex-col">
        {{html()->label("D.VALORACION GENERAL")->for("general_evaluation")}}
        {{html()->select('general_evaluation', ['aceptado'=>'ACEPTADO','aceptado con modificaciones'=>'ACEPTADO CON MODIFICACIONES','no es aceptado'=>'NO ES ACEPTADO'])->placeholder('Seleccione una opción')->attribute("wire:model", "general_evaluation")}}
        <x-input-error :messages="$errors->get('general_evaluation')" class="mt-2"/>
    </div>

    <div class="mt-4 flex flex-col">
        {{html()->label("Describa, en un máximo de 150 palabras, su valoración del escrito. De ser el caso, indique los ajustes que deben realizarse, pues esta información se remitirá al autor / autores.")->for("description")}}
        <span class="text-xs font-semibold text-green-600 {{$words_left<0?'text-red-600':''}}">Cantidad de palabras restantes {{$words_left}}</span>
        <textarea id="description" name="description" wire:model="description"></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4" wire:click="store">
            {{ __('Guardar') }}
        </x-primary-button>
    </div>
</div>

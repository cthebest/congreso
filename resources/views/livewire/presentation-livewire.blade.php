<div>
    <section class="container p-4 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="mb-4">
                    @if (session()->has('message'))
                        <div class="bg-green-100 text-green-600 p-2">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="md:flex md:items-center md:justify-between">
                    @role('admin')
                    <div
                        class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                        <a
                            class="px-5 py-2 text-xs font-medium text-gray-600
                            transition-colors duration-200 bg-gray-100 sm:text-sm
                            dark:bg-gray-800 dark:text-gray-300" href="{{route('upload')}}">
                            Subir
                        </a>

                        <button
                            class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors
                            duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300
                            hover:bg-gray-100" wire:click="destroy">
                            Eliminar
                        </button>

                    </div>
                    @endrole
                    @if($evaluate_presentation_id>0)
                        <a href="{{route('evaluations.presentation', $evaluate_presentation_id)}}"
                           class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors
                            duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300
                            hover:bg-gray-100 dark:bg-gray-900">
                            Evaluar ponencia
                        </a>
                    @endif
                    <div class="relative flex items-center mt-4 md:mt-0">
                        <span class="absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                            </svg>
                        </span>

                        <input type="text" placeholder="Search"
                               class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200
                           rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5
                           dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400
                            dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring
                            focus:ring-opacity-40" wire:model="term">
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        @role('admin')
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                        </th>
                                        @endrole
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            ID
                                        </th>
                                        @role('evaluator')
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                        </th>
                                        @endrole

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Título
                                        </th>
                                        @role('admin')
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Asignado a
                                        </th>
                                        @endrole

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Archivo
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha de creación
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Fecha de actualización
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    @foreach($presentations as $presentation)
                                        <tr>
                                            @role('admin')
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{html()->checkbox('delete')->value($presentation->id)->attribute('wire:model', 'presentations_id')}}
                                            </td>
                                            @endrole

                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">{{$presentation->id}}</h2>
                                                </div>
                                            </td>

                                            @role('evaluator')
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{html()->radio('select')->value($presentation->id)->attribute('wire:model','evaluate_presentation_id')}}
                                            </td>
                                            @endrole
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white hover:text-green-500">
                                                {{$presentation->title}}
                                            </td>
                                            @role('admin')
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white ">
                                                @if($presentation->users()->count()>0)
                                                    @foreach($presentation->users as $user)
                                                        <a href="{{route('users.edit', $user->id)}}"
                                                           class="flex hover:text-green-500">{{$user->name}}</a>
                                                    @endforeach
                                                @else
                                                    Sin asignar
                                                @endif
                                            </td>
                                            @endrole

                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white hover:text-green-500">
                                                <a href="{{route('presentations.show', $presentation->id)}}">Ver
                                                    archivo
                                                </a>
                                            </td>


                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white">
                                                {{$presentation->created_at}}
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white">
                                                {{$presentation->updated_at}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 sm:flex sm:items-center sm:justify-between ">
                    {{$presentations->links()}}
                </div>
            </div>
        </div>
    </section>
</div>

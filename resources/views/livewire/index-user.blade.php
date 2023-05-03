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
                    <div
                        class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                        <a
                            class="px-5 py-2 text-xs font-medium text-gray-600
                            transition-colors duration-200 bg-gray-100 sm:text-sm
                            dark:bg-gray-800 dark:text-gray-300" href="{{route('register')}}">
                            Registrar
                        </a>

                        <button
                            class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors
                            duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300
                            hover:bg-gray-100" wire:click="destroy">
                            Eliminar
                        </button>
                    </div>

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
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">

                                        </th>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            ID
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Email
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            Rol
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
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                {{html()->checkbox('delete')->value($user->id)->attribute('wire:model', 'users_id')}}
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                                <div>
                                                    <h2 class="font-medium text-gray-800 dark:text-white ">{{$user->id}}</h2>
                                                </div>
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white hover:text-green-500">
                                                <a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a>

                                            </td>

                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white">
                                                {{$user->email}}
                                            </td>

                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                                @foreach($user->roles as $role)
                                                    <div
                                                        class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                        {{$role->name}}
                                                    </div>

                                                @endforeach
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white">
                                                {{$user->created_at}}
                                            </td>
                                            <td class="px-12 py-4 text-sm font-medium whitespace-nowrap dark:text-white">
                                                {{$user->updated_at}}
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
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </section>
</div>

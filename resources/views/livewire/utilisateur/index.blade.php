<div>
    <button></button>

    <div class="bg-white overflow-auto">
        <div class="flex flex-wrap flex-row justify-between my-1">
            <button class="flex items-center bg-green-500 text-white font-bold text-lg py-3 px-3 rounded-xl">
                <i class="fa-solid fa-plus mr-2"></i>
                Ajouter
            </button>

            <div class=" flex flex-row items-center ">
                <span>utilisateurs </span>
                @php
                $n =$users->total()<20?$users->total():20;
                    @endphp
                    <select wire:model.lazy="parPage" name="maxShow" id="maxShow" class='font-bold mx-1 border-2'>
                        @for($i= 5; $i <= $n ; $i+=5) <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                    <label for="maxShow">par page</label>
            </div>

        </div>
    </div>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Utilsiateur</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Salaire</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">email</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Ajouté</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @php $i = 0 @endphp
                @forelse ( $users as $user )
                {{-- <tr @if($i%2!=0)class="bg-gray-200" @endif>
                    <td class="text-center py-3 px-4">{{$user->id}}</td>
                    <td class="text-center py-3 px-4">{{$user->name}}</td>
                    <td class="text-center py-3 px-4">{{$user->lastName}}</td>
                    <td class="text-center py-3 px-4">{{$user->role->nomrole}}</td>
                    <td class="text-center py-3 px-4">{{$user->salaire}}FCFA</td>
                    <td class="text-center py-3 px-4">{{$user->created_at}}</td>
                    <td class="text-center py-3 px-4"><a href="#" class=" mx-2"><i
                                class="fa-solid fa-pen-to-square text-green-500"></i></a><a href="#" class=" mx-2"><i
                                class="fa-solid fa-pen-to-square text-green-500"></i></a></td>
                </tr> --}}
                <tr class="text-gray-700 ">
                    <td class="py-3 px-4">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                    alt="" loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{$user->name." ".$user->lastName}}</p>
                                <p
                                    class="px-2 py-1 text-xs w-20 text-center font-bold text-gray-600 @if($user->role->nomrole == 'manager')bg-blue-300 @endif @if($user->role->nomrole == 'employe')bg-green-300 @endif @if($user->role->nomrole == 'technicien') bg-yellow-300 @endif rounded-full">
                                    {{$user->role->nomrole}}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="text-center py-3 px-4">
                        {{$user->salaire}}FCFA
                    </td>
                    <td class="px-4 py-3 text-center">
                        {{$user->email}}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{$user->created_at===null?'':$user->created_at->format('d-m-Y')}}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg  focus:outline-none focus:shadow-outline-gray"
                                aria-label="Edit">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg>
                            </button>
                            <button
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Delete">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @php $i++ @endphp
                @empty
                <span>Aucun user enregistré...</span>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{$users->links()}}

    </div>
</div>
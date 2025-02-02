<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __("User Management") }}
            </h2>
            <div class="flex-none justify-between">
                <a href="{{ route('users.create') }}" class="transition ease-in-out  bg-blue-400  delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 text-white rounded p-2">
                    Create a new user
                </a>
            </div>
        </div>
    </x-slot>

    @if($message = Session::get('success'))
        <div class="bg-teal-100 max-w-2xl border-t-4 border-teal-500 rounded-b text-teal-900 mx-auto px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="max-w-2xl mx-auto p-2">
                    <i class="fa-solid fa-circle-info ml-5 pl-5 animate-bounce inline-block float-right"></i>
                    <p class="font-bold">Attention:</p>
                    <p class="text-sm">{{ $message }}</p>
                </div>

            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full  rounded">
                        <thead>
                        <tr class="grid-cols-5 justify-self p-1 m-1">
                            <th class="content-center  border-b-4  border-double border-gray-900">No</th>
                            <th class="content-center  border-b-4  border-double border-gray-900">Name</th>
                            <th class="content-center  border-b-4  border-double border-gray-900">Email</th>
                            <th class="content-center  border-b-4  border-double border-gray-900">Roles</th>
                            <th class="content-center  border-b-4  border-double border-gray-900">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$user)
                            <tr class="grid-cols-5 p-1 m-1">
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">{{ $user->email }}</td>
                                <td class="text-center">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $userRole)
                                            <span>{{$userRole}}</span>
                                        @endforeach
                                    @endif
                                </td>


                                {{-- CHANGES 10/06/2022 8:23 AM:
                                    applying on hover transitions on a links and button links.

                                    ISSUE:
                                    transition only works in button tags. please investigate.
                                --}}
                                <td class="text-center p-3 ">
                                    <a class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300 rounded bg-blue-400 text-white m-3 p-2"
                                       href="{{ route('users.show', $user->id) }}">
                                        Show
                                    </a>
                                    <a class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-orange-500 duration-300 rounded bg-amber-400 text-white m-3 p-2"
                                       href="{{ route('users.edit', $user->id) }}">
                                        Edit
                                    </a>

                                    {{-- todo: a warning modal before deleting would be nice                                    --}}
                                    <form method="POST"
                                          action="{{ route('users.destroy', $user->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-red-900 duration-300 rounded bg-red-500 text-white m-3 p-2"
                                                type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr class="">
                            <td class="p-2 m-1" colspan="5">PAGINATION
                            </td>
                        </tr>
                        <tr class="">
                            <td class="p-2 m-1" colspan="5">{!! $data->links() !!}
                            </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>

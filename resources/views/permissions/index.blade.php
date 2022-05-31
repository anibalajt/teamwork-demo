<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __("Permission Management") }}
            </h2>
            <div class="flex-none justify-between">
                <a href="{{ route('permissions.create') }}" class="bg-blue-400 text-white rounded p-2">
                    Create a new Permission
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
                            <th class="content-center  border-b-4  border-double border-gray-900">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=>$permission)
                            <tr class="grid-cols-5 p-1 m-1">
                                <td class="text-center">{{ ++$i }}</td>
                                <td class="text-center">{{ $permission->name }}</td>

{{--                                <td class="text-center">--}}
{{--                                    @if(!empty($user->getRoleNames()))--}}
{{--                                        @foreach($user->getRoleNames() as $userRole)--}}
{{--                                            <span>{{$userRole}}</span>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </td>--}}

                                <td class="text-center p-3 ">
                                    <a class="rounded bg-blue-400 text-white mx-2 py-2 px-2"
                                       href="{{ route('users.show', $permission->id) }}">
                                        Show
                                    </a>
                                    <a class="rounded bg-orange-400 text-white mx-2 py-2 px-2"
                                       href="{{ route('users.edit', $permission->id) }}">
                                        Edit
                                    </a>

                                    {{-- todo: a warning modal before deleting would be nice                                    --}}
                                    <form method="POST"
                                          action="{{ route('users.destroy', $permission->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="rounded bg-red-500 text-white mt-2 py-2 px-2"
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
                            <td class="p-2 m-1" colspan="5">PAGINATION</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

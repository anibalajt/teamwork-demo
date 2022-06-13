<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __("User Overview:") }} <br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <strong class="font-extrabold"> {{ $user->name }}</strong>
            </h2>
            <div class="flex-none justify-between">
                <a href="{{ route('users.index') }}" class="bg-red-500 text-white rounded p-2">
                    Go back
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center p-6 bg-white border-b border-gray-200">

                    {{--                        name display div block--}}
                    <div class="pb-4 flex">
                        <label for="name" class="flex mr-4 ">
                            <strong> Name:</strong>
                        </label>
                        <span class=""> {{$user->name}}</span>
                    </div>

                    {{--                         Email Address display div block--}}
                    <div class="pb-4 flex">
                        <label for="name" class="flex mr-4 ">
                            <strong>Email Address:</strong>
                        </label>
                        <span class=""> {{$user->email}} </span>
                    </div>

                    {{--                        Roles display div block--}}
                    <div class="pb-4 flex">
                        <label for="role" class="flex mr-4 ">
                            <strong>Role assigned:</strong>
                        </label>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $ur)
                                <span class=""> {{ $ur }}  </span>
                            @endforeach
                        @elseif( empty($user->getRoleNames()))
                            <span>currently no registered roles</span>
                        @endif
                    </div>

                    {{-- permissions assigned to the role --}}
                    <div class="pb-4 flex">
                        <label for="permission" class="flex mr-4 ">
                            <strong>Permission assigned to the role:</strong>
                        </label>
                        {{--                        @if(!empty($user->getRoleNames()))--}}
                        {{--                            @foreach($user->getRoleNames() as $ur)--}}
                        {{--                                <span class=""> {{ $ur }}  </span>--}}
                        {{--                            @endforeach--}}
                        {{--                        @elseif( empty($user->getRoleNames()))--}}
                        {{--                            <span>currently no registered roles</span>--}}
                        {{--                        @endif--}}


                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

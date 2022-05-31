<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __("Edit User: ") }}

                <strong class="font-extrabold"> {{ $user->name }} </strong>
            </h2>
            <div class="flex-none justify-between">
                <a href="{{ route('users.index') }}" class="bg-red-500 text-white rounded p-2">
                    Go back
                </a>
            </div>
        </div>
    </x-slot>

    @if(count($errors) > 0)
        <div class="max-w-xl mt-4 mx-auto p-10 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="block">
                <div class="py-1bg-green-500">
                    <strong class="text-3xl inline-block">Hmmm...</strong>
                    <i class="fa-solid fa-triangle-exclamation animate-ping h-50 w-50 inline-block float-right"></i>
                    <span class="m-1 pt-2 block"> looks like there are some problems with your inputs. </span>
                </div>

                <div class="block mx-4 px-4 ">
                    <ul class="list-disc">
                        @foreach($errors->all() as $err)

                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{--    @if($message = Session::get('success'))--}}
    {{--        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">--}}
    {{--            <div class="flex">--}}
    {{--                <div class="py-1">--}}
    {{--                    <i class="fa-solid fa-circle-info"></i>--}}
    {{--                </div>--}}
    {{--                <div>--}}
    {{--                    <p class="font-bold">Attention:</p>--}}
    {{--                    <p class="text-sm">{{ $message }}</p>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="card-body mt-2 p-4">
                        <form action="  {{ route('users.update', $user->id) }}  " method="POST">
                            @csrf
                            @method('PUT')
                            {{--                        name Filable textbox--}}
                            <div class="pb-4 flex">
                                <label for="name" class="flex mr-4 w-1/12 w-20">
                                    Name:
                                </label>
                                <input type="text" id="name" name="name" required maxlength="128" class="flex-1 form-control" autofocus aria-required="true" placeholder="{{$user->name}}">
                            </div>

                            {{--                    Email Fillable  textbox --}}
                            <div class="pb-4 flex">
                                <label for="email" class="flex mr-4 w-1/12 w-20">
                                    Email Address:
                                </label>
                                <input type="email" class="flex-1 form-control" id="email" name="email" aria-required="true" autofocus placeholder="{{$user->email}}">
                            </div>

                            {{--                        Password fillable textbox--}}
                            <div class="pb-4 flex">
                                <label for="password" class="flex mr-4 w-1/12 w-20">
                                    Password:
                                </label>
                                <input type="password"  id="password" name="password" class="flex-1 form-control" autofocus placeholder="please enter your password ">
                            </div>

                            {{--                    confirm password fillable textbox                      --}}
                            <div class="pb-4 flex">
                                <label for="confirm-password" class="flex mr-4 w-1/12 w-20">
                                    Confirm your Password
                                </label>
                                <input type="password"  id="confirm-password" name="confirm-password" class="flex-1 form-control" placeholder="please enter your password again ">
                            </div>

                            {{--                    List of Roles Selectable options                      --}}
                            <div class="pb-4 flex">
                                <label for="roles" class="flex mr-4 w-1/12 w-20">
                                    Roles
                                </label>
                                <select name="roles[]" id="roles" class="" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}"> {{$role}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pb-4 flex gap-4">

                            <span class="py-4 w-1/12 w-20">
                            </span>

                                <button type="submit" class="rounded  text-center py-4 px-8 mr-4 bg-green-200">Save</button>
                                <button type="reset" value="Reset" class="rounded text-center  py-4 px-8 mr-4 bg-blue-200">Clear</button>
                                <a href="{{ route('users.index')  }}" class="rounded py-4 px-8 bg-red-200 text-center">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __("Edit Permission: ") }}

                <strong class="font-extrabold"> {{ $permission->name }} </strong>
            </h2>
            <div class="flex-none justify-between">
                <a href="{{ route('permissions.index') }}" class="bg-red-500 text-white rounded p-2">
                    Go back
                </a>
            </div>
        </div>
    </x-slot>


    {{-- ERROR MESSAGING CODE BLOCK--}}
    @if(count($errors) > 0)
        <div class="max-w-xl mt-4 mx-auto p-10 bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md"
             role="alert">
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


</x-app-layout>
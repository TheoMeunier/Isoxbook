<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>{{ __('title.book.create') }}</h1>

                    <form action="{{ route('book.store') }}" method="POST">
                        @csrf

                        <div>
                            <x-label for="name" :value="__('input.label.name')"/>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                     required autofocus/>
                        </div>

                        <div>
                            <x-label for="description" :value="__('input.label.description')"/>
                            <textarea name="description" id="description" cols="30"
                                      rows="10">{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <x-label for="image" :value="__('input.label.image')"/>
                            <x-input id="image" class="block mt-1 w-full" type="text" name="image" :value="old('image')"
                                     required autofocus/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('button.action.create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

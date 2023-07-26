<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl py-6 text-gray-800 leading-tight">
            {{ Breadcrumbs::render('home') }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200" style="width: 100%">
            <div class="justify__between ">
                <h1>{{ __('title.books') }}</h1>
                @can('book create')
                    <a href="{{ route('book.create') }}" class="btn btn__primary">
                        <i class="fa-solid fa-plus mr-2"></i>
                        {{ __('button.book.create') }}
                    </a>
                @endcan
            </div>

            @livewire('book-livewire')
        </div>
    </div>

</x-app-layout>

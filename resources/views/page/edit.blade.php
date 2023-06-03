<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Breadcrumbs::render('page.edit', $book, $chapter, $page) }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1>{{ __('title.page.edit') }}</h1>

            <form action="{{ route('pages.update', ['slug' => $page->slug]) }}" method="POST" id="form_page">
                @csrf

                <div>
                    <div>
                        <x-label for="name" :value="__('input.label.name')"/>
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $page->name}}"/>
                        @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-10">
                        <x-label for="description" :value="__('input.label.description')"/>
                        <x-forms.editor name="content" value="{!! $page->content !!}"></x-forms.editor>
                        @error('content')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn__secondary">
                        {{ __('button.action.close') }}
                    </a>
                    <x-button class="ml-3">
                        {{ __('button.action.edit') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

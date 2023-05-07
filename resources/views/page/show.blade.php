<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Breadcrumbs::render('page', $book, $chapter, $page) }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="justify__between">
                <h1>{{ $page->name }}</h1>
                @can('page edit')
                    <a class="btn btn__primary" href="{{ route('book.chapter.page.edit', ['slug' => $book->slug, 'slugChapter' => $chapter->slug, 'slugPage' => $page->slug]) }}">
                        <i class="fa-solid fa-pen-to-square mr-2"></i>
                        {{ __('button.book.edit') }}
                    </a>
                @endcan
            </div>

            <div class="min-w-full prose prose-img:rounded-xl prose-a:text-blue-600">
                <x-markdown>
                    {!! $page->content_parse !!}
                </x-markdown>
            </div>
        </div>
    </div>
</x-app-layout>

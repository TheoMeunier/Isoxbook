<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Str;

class PageController extends Controller
{
    /**
     * @param string $slug
     * @param string $slugChapter
     * @return Application|Factory|View
     */
    public function index(string $slug, string $slugChapter)
    {
        $chapter = Chapter::where('slug', '=', $slugChapter)
            ->first();

        return view('page.index', [
            'chapter' => $chapter,
            'book' => $slug
        ]);
    }

    /**
     * @param string $slug
     * @param string $slugChapter
     * @param $slugPage
     * @return Application|Factory|View
     */
    public function show(string $slug, string $slugChapter, $slugPage)
    {
        $page = Page::where('slug', '=', $slugPage)->first();

        return view('page.show', [
            'book' => $slug,
            'chapter' => $slugChapter,
            'page' => $page
        ]);
    }

    /**
     * @param string $slug
     * @param string $slugChapter
     * @return Application|Factory|View
     */
    public function create(string $slug, string $slugChapter)
    {
        $chapter = Chapter::where('slug', '=', $slugChapter)
            ->with('book')
            ->first();

        return view('page.create', [
            'chapter' => $chapter
        ]);
    }

    /**
     * @param PageRequest $request
     * @param string $slug
     * @param string $slugChapter
     * @return RedirectResponse
     */
    public function store(PageRequest $request, string $slug, string $slugChapter)
    {
        $chapter = Chapter::where('slug', '=', $slugChapter)
            ->first();

        Page::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'content' => $request->get('content'),
            'user_id' => auth()->id(),
            'chapter_id' => $chapter->id
        ]);

        return redirect()->route('book.chapter.page.index', ['slug' => $slug, 'slugChapter' => $slugChapter]);
    }

    /**
     * @param string $slug
     * @param string $slugChapter
     * @param string $slugPage
     * @return Application|Factory|View
     */
    public function edit(string $slug, string $slugChapter, string $slugPage)
    {
        $page = Page::where('slug', '=', $slugPage)
            ->with('chapter')
            ->first();

        return view('page.edit', [
            'page' => $page,
        ]);
    }

    /**
     * @param PageRequest $request
     * @param string $slug
     * @return RedirectResponse
     */
    public function update(PageRequest $request, string $slug)
    {
        $page = Page::where('slug', '=', $slug)->first();

        $page->update([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'content' => $request->get('content'),
        ]);

        return redirect()->route('book.chapter.page.show', ['slug' => $page->chapter->book->slug, 'slugChapter' => $page->chapter->slug, 'slugPage' => $page->slug]);
    }
}

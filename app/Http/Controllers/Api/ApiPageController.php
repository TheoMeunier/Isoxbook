<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Chapter;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiPageController extends Controller
{
    public function index(Request $request, string $slug, string $slugChapter): AnonymousResourceCollection
    {
        $chapter = Chapter::query()
            ->where('slug', '=', $slugChapter)
            ->firstOrFail();

        $pages = Page::query()
            ->where('chapter_id', '=', $chapter->id)
            ->where('name', 'LIKE', '%'.$request->q.'%')
            ->with(['user', 'likes'])
            ->paginate(12);

        return PageResource::collection($pages);
    }

    public function like(Chapter $chapter): JsonResponse
    {
        $chapter->like ? $chapter->likes()->delete() : $chapter->likes()->create(['user_id' => auth()->id()]);

        return response()->json('ok');
    }
}

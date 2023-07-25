<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChapterResource;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiChapterController extends Controller
{
    public function index(Request $request, string $slug): AnonymousResourceCollection
    {
        $book = Book::query()
            ->where('slug', '=', $slug)
            ->firstOrFail();

        $chapters = Chapter::query()
            ->where('book_id', '=', $book->id)
            ->where('name', 'LIKE', "%$request->q%")
            ->with(['user', 'likes'])
            ->paginate(12);

        return ChapterResource::collection($chapters);
    }

    public function like(Chapter $chapter): JsonResponse
    {
        $chapter->like ? $chapter->likes()->delete() : $chapter->likes()->create(['user_id' => auth()->id()]);

        return response()->json('ok');
    }
}

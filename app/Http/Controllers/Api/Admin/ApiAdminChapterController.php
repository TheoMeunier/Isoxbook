<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AdminChapterResource;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiAdminChapterController extends Controller
{
    /**
     * @param  Request  $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $chapters = Chapter::query()
            ->with(['user', 'book', 'likes'])
            ->where('name', 'LIKE', "%$request->q%")
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        return AdminChapterResource::collection($chapters);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Page;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::query()->count();
        $books = Book::query()->count();
        $chapters = Chapter::query()->count();
        $pages = Page::query()->count();

        $logs = ActivityLog::query()
            ->with(['causer'])
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('admin.index', compact('users', 'books', 'chapters', 'pages', 'logs'));
    }
}

<?php

namespace App\Http\Livewire\Admin\Chapters;

use App\Models\Chapter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\WithPagination;

class AdminChapterLivewire extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View|Application|Factory
    {
        $chapters = Chapter::query()
            ->with(['user'])
            ->where(function ($query) {
                $query->orWhere('name', 'LIKE', '%'.$this->search.'%');
            })
            ->paginate(6);

        return view('admin.chapters.livewire.admin-chapter-livewire', compact('chapters'));
    }
}

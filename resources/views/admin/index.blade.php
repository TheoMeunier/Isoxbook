<x-admin.admin-app-layout>
    <h1>{{ __('title.dashboard') }}</h1>

    <section class="grid grid-cols-4 gap-4 my-6">
        <div class="card card__body flex items-center text-indigo-500">
            <div class="w-1/4">
                <i class="fa-solid fa-user h2"></i>
            </div>
            <div>
                <p class="h4">{{ __('title.users') }}</p>
                <p class="text-gray-400">{{ $users }}</p>
            </div>
        </div>
        <div class="card card__body flex items-center text-cyan-500">
            <div class="w-1/4">
                <i class="fa-solid fa-book-bookmark h2"></i>
            </div>
            <div>
                <p class="h4">{{ __('title.books') }}</p>
                <p class="text-gray-400">{{ $books }}</p>
            </div>
        </div>
        <div class="card card__body flex items-center text-emerald-500">
            <div class="w-1/4">
                <i class="fa-solid fa-book-open h2"></i>
            </div>
            <div>
                <p class="h4">{{ __('title.chapters') }}</p>
                <p class="text-gray-400">{{ $chapters }}</p>
            </div>
        </div>
        <div class="card card__body flex items-center text-red-500">
            <div class="w-1/4">
                <i class="fa-sharp fa-solid fa-file-circle-check h2"></i>
            </div>
            <div>
                <p class="h4">{{ __('title.pages') }}</p>
                <p class="text-gray-400">{{ $pages }}</p>
            </div>
        </div>
    </section>

    <section class="card card__body">
        <h2>
            <span class="text-indigo-500 text-3xl"><i class="fa-solid fa-box-archive"></i></span>
            {{ __('title.logs') }}
        </h2>

        <table class="table">
            <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->causer->name ?? 'Server' }}</td>
                    <td>
                        @if($log->event === 'created')
                            <span class="tag tag-success">
                                {{ __('js.table.action.create') }}
                            </span>
                        @elseif($log->event === 'updated')
                            <span class="tag tag-warning">
                                {{ __('js.table.action.update') }}
                            </span>
                        @elseif($log->event === 'deleted')
                            <span class="tag tag-danger">
                                {{ __('js.table.action.delete') }}
                            </span>
                        @endif
                    </td>
                    <td>{{ $log->subject->name ?? 'Server' }}</td>
                    <td>{{ $log->created_at->format('d/m/Y') }}</td>
                    <td>{{ $log->updated_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</x-admin.admin-app-layout>




<div>
    <div class="flex justify-end py-3">
        <a href="{{ route('admin.logs.export') }}" class="btn btn__primary">Export</a>
    </div>

    <table>
        <thead>
        <tr>
            <th>{{ __('table.id') }}</th>
            <th>{{ __('table.username') }}</th>
            <th>{{ __('table.action') }}</th>
            <th>{{ __('table.subject_name') }}</th>
            <th>{{ __('table.createdAt') }}</th>
            <th>{{ __('table.updatedAt') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td class="py-4">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $log->id }}
                    </p>
                </td>
                <td>
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $log->causer->name ?? '' }}
                    </p>
                </td>
                <td>
                    @if($log->description === 'created')
                        <span class="tag tag-success">
                            {{ __('tag.created') }}
                        </span>
                    @elseif($log->description === 'updated')
                        <span class="tag tag-warning">
                        {{ __('tag.updated') }}
                        </span>
                    @else
                        <span class="tag tag-danger">
                            {{ __('tag.deleted') }}
                        </span>
                    @endif
                </td>
                <td>
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $log->subject->name ?? '' }}
                    </p>
                </td>
                <td>
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $log->created_at->format('d/m/Y') }}
                    </p>
                </td>
                <td>
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $log->updated_at->format('d/m/Y')  }}
                    </p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $logs->links('components.modules.pagination') }}
    </div>
</div>

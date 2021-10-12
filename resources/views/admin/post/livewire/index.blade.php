<div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 50px;">#</th>
                <th scope="col">Title</th>
                <th scope="col" class="text-center" style="width: 150px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr>
                    <td class="text-center" style="vertical-align: middle">{{ $post->id }}</td>
                    <td style="vertical-align: middle">{{ $post->title }}</td>
                    <td class="text-center">
                        @php
                            $edit = false;
                            $update = false;
                        @endphp

                        @can('update', $post)
                            @php $edit = true @endphp
                            <a href="{{ route('backend.post.edit', $post) }}" class="btn btn-primary" style="padding: 5px; font-size: 12px;">Edit</a>
                        @endcan

                        @can('delete', $post)
                            @php $update = true @endphp
                            <a href="javascript:;" wire:click="destroy({{ $post }})" class="btn btn-danger" style="padding: 5px; font-size: 12px;">Delete</a>
                        @endcan

                        @if (!$edit && !$update)
                            <span style="font-size: 13px; color: #888;">No access for actions</span>
                        @endif

                    </td>
                </tr>
            @empty
                <tr><td colspan="3">No data found!!!</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{ $posts->onEachSide(5)->links() }}

</div>

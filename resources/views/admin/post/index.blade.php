<x-layouts.master>

    <x-partials.page_header title="Posts List" subtitle="Manage posts data" />

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4">
                <x-partials.admin_sidebar />
            </div>
            <div class="col-lg-8">

                <a href="{{ route('backend.post.create') }}" class="btn btn-primary mb-3">Create Post</a>

                <livewire:admin.post.index />

            </div>
        </div>
    </div>
</x-layouts.master>

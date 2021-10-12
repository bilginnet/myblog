<x-layouts.master>

    <x-partials.page_header title="Create Post" subtitle="Create your own post" />

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4">
                <x-partials.admin_sidebar />
            </div>
            <div class="col-lg-8">

                <livewire:admin.post.form :post="$post" />

            </div>
        </div>
    </div>
</x-layouts.master>

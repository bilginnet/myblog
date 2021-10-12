<x-layouts.master>

    <x-partials.page_header title="Admin Dashboard" subtitle="Manage your dashboard" />

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4">
                <x-partials.admin_sidebar />
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ auth()->user()->name }}</h5>
                        <a href="#" class="btn btn-primary">Edit your profile</a>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">E-Mail: {{ auth()->user()->email }}</li>
                        <li class="list-group-item">Role: {{ auth()->user()->level_string }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-layouts.master>

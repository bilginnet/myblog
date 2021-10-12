<x-layouts.master>

    <x-partials.page_header title="Edit Profile" subtitle="Edit your profile" />

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4">
                <x-partials.admin_sidebar />
            </div>
            <div class="col-lg-8">
                <form method="post" action="{{ route('backend.profile.update') }}">
                    @csrf

                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input id="email" name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail') }}" value="{{ auth()->user()->email }}" readonly>
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input id="name" name="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ auth()->user()->name }}">
                                @error('name')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" value="">{{ __('Update Profile') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-layouts.master>

<x-layouts.master>

    <x-partials.page_header title="Change Password" subtitle="Change your password" />

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-4">
                <x-partials.admin_sidebar />
            </div>
            <div class="col-lg-8">
                <form method="post" action="{{ route('backend.password.update') }}">
                    @csrf

                    <div class="card bg-light">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input id="current_password" name="current_password" type="password" class="form-control form-control-lg @error('current_password') is-invalid @enderror" placeholder="{{ __('Current Password') }}">
                                @error('current_password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ __('New Password') }}">
                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Password Confirmation') }}">
                                @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="card-body d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" value="">{{ __('Update Password') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-layouts.master>

<x-layouts.master>

    <x-partials.page_header title="Login" subtitle="Login for create your own posts" />

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input id="email" name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail') }}">
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                                @error('password')
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-body d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" value="">{{ __('Log In') }}</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.master>

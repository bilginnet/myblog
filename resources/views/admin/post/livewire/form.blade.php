<div>
    <form wire:submit.prevent="submitForm">
        @csrf

        <div class="form-group">
            <label for="excerpt_color">Title *</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.defer="title" name="title" id="title" placeholder="Title">
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        </div>

        <div class="form-group">
            <label for="excerpt">Excerpt *</label>
            <input type="text" class="form-control @error('excerpt') is-invalid @enderror" wire:model.defer="excerpt" name="excerpt" id="excerpt" placeholder="Excerpt">
            <div class="invalid-feedback">
                {{ $errors->first('excerpt') }}
            </div>
        </div>

        <div class="form-group">
            <label for="body">Body *</label>
            <textarea type="text" class="form-control @error('body') is-invalid @enderror" wire:model.defer="body" name="body" id="body">
                {!! $body !!}
            </textarea>
            <div class="invalid-feedback">
                {{ $errors->first('body') }}
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Submit
        </button>

    </form>
</div>

@push('script')
<script>

</script>
@endpush

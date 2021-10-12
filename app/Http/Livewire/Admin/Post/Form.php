<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\Redirector;

class Form extends Component
{
    public $post;
    public $post_id;

    public $title;
    public $excerpt;
    public $body;

    protected $rules = [
        'title' => ['required', 'min:3', 'max:250'],
        'excerpt' => ['required', 'min:3', 'max:250'],
        'body' => ['required', 'min:3', 'max:250'],
    ];

    public function mount(Post $post)
    {
        if (isset($post->id)) $this->post_id = $post->id;

        $this->title = $post->title;
        $this->excerpt = $post->excerpt;
        $this->body = $post->body;
    }

    public function submitForm(): Redirector
    {
        $post = (isset($this->post_id)) ? Post::find($this->post_id) : new Post;

        $attributes = $this->validate();
        $attributes['user_id'] = auth()->user()->id;
        $post->fill($attributes)->save();

        session()->flash('saved', true);
        return redirect()->route('backend.post.index');
    }

    public function render()
    {
        return view('admin.post.livewire.form');
    }
}

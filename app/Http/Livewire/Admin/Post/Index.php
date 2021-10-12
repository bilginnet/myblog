<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    /**
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }

    public function render()
    {
        return view('admin.post.livewire.index', [
            'posts' => Post::query()->user()->paginate(25)
        ]);
    }
}

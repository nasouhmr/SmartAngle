<?php

namespace App\Repositories;

use App\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public  $postParams = []; //Data post params  

    function getPosts()
    {
        return Post::all();
    }

    function getPost()
    {
        return Post::find( $this->postParams['id']); 
    }

    function savePost()
    {
        if ($this->postParams) {
            $post = new Post();
            $post->title = $this->postParams['title'];
            $post->description = $this->postParams['description'];
            $post->tags = $this->postParams['tags'];
            $post->user_id = auth()->user()->id;
            if ($post->save()) { 
                return true;
            }
        }
        return false;
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPosts(Request $request)
    {
        $posts = $this->postRepository->getPosts();

        return response()->json([
            'data'         => $posts,
            'message'      => 'success!',
            'error'      => 200
        ], 200);
    }

    public function getPost(Request $request)
    {
        $this->postRepository->postParams = $request->all();
        $post = $this->postRepository->getPost();

        return response()->json([
            'data'         => $post,
            'message'      => 'success!',
            'error'      => 200
        ], 200);
    }

    public function createPost(Request $request)
    {
        $this->postRepository->postParams = $request->all();
        $post = $this->postRepository->savePost();

        return response()->json([
            'data'         => $post,
            'message'      => 'success!',
            'error'      => 200
        ], 200);
    }
}

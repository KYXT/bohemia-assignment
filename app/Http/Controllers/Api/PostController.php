<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display all posts.
     *
     * @OA\Get(
     *     path="/posts",
     *     operationId="forum-categories",
     *     tags={"Posts"},
     *     summary="Get all posts",
     *     description="Return all posts, paginated by 10",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(example="List of posts. Pagination by 10")
     *      )
     * )
     *
     * @return JsonResponse
     */
    public function index()
    {
        $posts = Post::where('is_in_trash', false)
            ->with('user', 'user:id,name,email,nickname,role')
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    
        return $this->success([$posts]);
    }
    
    /**
     * Display post by slug.
     *
     * @OA\Get(
     *     path="/posts/{slug}",
     
     *     tags={"Posts"},
     *     summary="Get all posts",
     *     description="Return all posts, paginated by 10",
     *     @OA\Parameter(
     *          name="slug",
     *          description="Post's  slug",
     *          required=true,
     *          in="path",
     *          example="my-post-slug",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(example="Post data with comments")
     *      )
     * )
     *
     * @return JsonResponse
     */
    public function show(string $slug)
    {
        $post = Post::where([
            'is_in_trash'   => false,
            'slug'          => $slug
        ])   
        ->with('user', 'user:id,name,email,nickname,role')
        ->first();
    
        if (!$post) {
            return $this->error(__('errors.not-founded'));
        }
    
        $comments = PostComment::where([
            'post_id'       => $post->id,
            'reply_id'      => null,
            'is_in_trash'   => false
        ])
            ->with('replies', 'user:id,name,email,nickname,role')
            ->orderBy('created_at')
            ->paginate(12);
    
        return $this->success([
            'post'          => $post,
            'comments'      => $comments
        ]);
    }
}

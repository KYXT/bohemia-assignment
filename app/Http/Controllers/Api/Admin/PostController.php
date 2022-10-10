<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\UrlGeneratorHelper;
use App\Http\Requests\Api\Admin\Posts\StorePostRequest;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Create new post
     *
     * @OA\Post(
     *     path="/admin/posts/store",
     *     operationId="store-post",
     *     tags={"Admin-Posts"},
     *     summary="Create post",
     *     description="For moderators and admins",
     *     security={
     *          {"bearer": {}}
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePostRequest")
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Successfully created")
     *          )
     *      )
     * )
     *
     * @param StorePostRequest $request
     * @return JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        
        $data['user_id'] = Auth::user()->id;        
        $data['slug'] = UrlGeneratorHelper::postUrl($data['title'], Post::class);

        $post = Post::create($data);

        return $this->success([
            'message' => __('success.create'),
            'post' => $post
        ]);
    }

    /**
     * Delete post
     *
     * @OA\Delete(
     *     path="/admin/posts/delete/{slug}",
     *     operationId="delete post",
     *     tags={"Admin-Posts"},
     *     summary="Delete post by slug",
     *     description="Delete post. Only for admins. Firstly moving to trash",
     *     security={
     *          {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *          name="slug",
     *          description="Posts slug",
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
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Successfully deleted")
     *          )
     *      ),
     *     @OA\Response(
     *          response=500,
     *          description="Item not founded",
     *          @OA\JsonContent(example="Item not founded")
     *      ),
     * )
     *
     * @param $slug
     * @return JsonResponse
     */
    
    public function delete($slug)
    {
        $post = Post::where('slug', $slug)
            ->first();

        if (!$post) {
            return $this->error(__('errors.not-founded'));
        }

        if (!$post->is_in_trash) {
            
            $post->is_in_trash = true;
            $post->save();
    
            PostComment::whereIn('id', $post->comments->pluck('id')->toArray())
                ->update(['is_in_trash' => true]);
    
            return $this->success([
                'message' => __('success.moved_to_trash')
            ]);
        }
    
        $post->comments()->delete();
        $post->delete();
    
        return $this->success([
            'message' => __('success.delete')
        ]);
    }
    
}

<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\PostComment\StorePostCommentRequest;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    /**
     * Store forum message
     *
     * @OA\Post(
     *     path="/user/post-comments/store/{postId}",
     *     tags={"User-Post-Comments"},
     *     summary="Create post comment",
     *     description="Create comment inside post",
     *     security={
     *          {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *          name="postId",
     *          description="Post Id",
     *          required=true,
     *          in="path",
     *          example="123",
     *          @OA\Schema(
     *              type="int"
     *          )
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePostCommentRequest")
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
     * @param StorePostCommentRequest $request
     * @param int $postId
     * @return JsonResponse
     */
    public function store(StorePostCommentRequest $request, int $postId)
    {
        $post = Post::where([
            'id'            => $postId,
            'is_in_trash'   => false
        ])
            ->first();
    
        if (!$post) {
            return $this->error(__('errors.not-founded'));
        }
        
        $data = $request->validated();
        
        if (isset($data['reply_id'])) {
            $repliedMessage = PostComment::where('id', $data['reply_id'])
                ->first();
    
            if (!$repliedMessage) {
                return $this->error(__('errors.not-founded'));
            }
            
            if ($repliedMessage['post_id'] != $postId) {
                return $this->error(__('forum.reply-error'));
            }
        }
        
        $data['user_id'] = Auth::id();
        $data['post_id'] = $postId;
        
        $postComment = PostComment::create($data);
        $postComment->load('user');
    
        return $this->success([
            'postComment' =>  $postComment
        ]);
    }
}

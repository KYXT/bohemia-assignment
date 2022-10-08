<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostComment;
use Illuminate\Http\JsonResponse;

class PostCommentController extends Controller
{
    /**
     * Delete post comment
     *
     * @OA\Delete(
     *     path="/user/post-comments/delete/{id}",
     *     tags={"Admin-Post-Comments"},
     *     summary="Delete post comment",
     *     description="Delete post comment by id",
     *     security={
     *          {"bearer": {}}
     *     },
     *     @OA\Parameter(
     *          name="id",
     *          description="Comment Id",
     *          required=true,
     *          in="path",
     *          example="123",
     *          @OA\Schema(
     *              type="int"
     *          )
     *     ),     
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Successfully created")
     *          )
     *      )
     * )
     *
     * @param $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        $postComment = PostComment::where('id', $id)
            ->with('replies')
            ->first();
        
        if (!$postComment) {
            return $this->error(__('errors.not-founded'));
        }
    
        if (!$postComment->is_in_trash) {
            $postComment->is_in_trash = true;
            $postComment->save();
    
            PostComment::whereIn('id', $postComment->replies()->pluck('id')->toArray())
                ->update(['is_in_trash' => true]);
    
            return $this->success([
                'message' => __('success.moved_to_trash'),
            ]);
        }
    
        $postComment->replies()->delete();
        $postComment->delete();
        
        return $this->success([
            'message' => __('success.delete'),
        ]);
    }
}

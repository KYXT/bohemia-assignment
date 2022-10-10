<?php


namespace App\Http\Requests\Swagger\PostComments;

/**
 * Class StoreForumMessageRequest
 *
 * @package App\Http\Requests\Swagger\PostComments
 *
 * @OA\Schema(
 *      title="StorePostCommentRequest",
 *      type="object",
 *      required={"text"}
 * )
 */
class StorePostCommentRequest
{      
    /**
     * @OA\Property(
     *      title="text",
     *      description="Text of user's comment",
     *      example="My comment",
     *      minLength=3,
     *      maxLength=2000,
     * )
     *
     * @var string
     */
    public $text;
    
    /**
     * @OA\Property(
     *      title="reply_id",
     *      description="Comment id replied on",
     *      example="2",
     * )
     *
     * @var string
     */
    public $reply_id;
}

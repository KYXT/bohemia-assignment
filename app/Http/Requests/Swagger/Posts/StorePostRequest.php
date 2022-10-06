<?php


namespace App\Http\Requests\Swagger\Posts;

/**
 * Class StorePostRequest
 *
 * @package App\Http\Requests\Swagger\Posts
 *
 * @OA\Schema(
 *      title="StorePostRequest",
 *      type="object",
 *      required={"title", "h1", "content"}
 * )
 */
class StorePostRequest
{
    /**
     * @OA\Property(
     *      title="title",
     *      description="title",
     *      example="post post post",
     *      minLength=10,
     *      maxLength=64,
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *      title="h1",
     *      description="h1",
     *      example="post post post",
     *      minLength=10,
     *      maxLength=64,
     * )
     *
     * @var string
     */
    public $h1;

    /**
     * @OA\Property(
     *      title="content",
     *      description="content",
     *      example="this is my content wow",
     *      minLength=10,
     *      maxLength=10000,
     * )
     *
     * @var string
     */
    public $content;

    /**
     * @OA\Property(
     *      title="description",
     *      description="description",
     *      example="this is my description",
     *      minLength=10,
     *      maxLength=1000,
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="keywords",
     *      description="keywords",
     *      example="test, foo, baz",
     *      minLength=10,
     *      maxLength=1000,
     * )
     *
     * @var string
     */
    public $keywords;
}

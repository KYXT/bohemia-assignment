<?php


namespace App\Http\Requests\Swagger\Auth;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Swagger\Auth
 *
 * @OA\Schema(
 *      title="LoginRequest",
 *      type="object",
 *      required={"email", "password"}
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="Email",
     *      example="admin@admin.com",
     *      minLength=5,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="passsword",
     *      description="Password",
     *      example="adminadmin",
     *      minLength=8,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $password;
}

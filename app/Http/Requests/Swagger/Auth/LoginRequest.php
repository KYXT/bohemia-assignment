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
 *      required={"login", "password"}
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *      title="login",
     *      description="Login",
     *      example="userSurnameuse",
     *      minLength=7,
     *      maxLength=300,
     * )
     *
     * @var string
     */
    public $login;

    /**
     * @OA\Property(
     *      title="passsword",
     *      description="Password",
     *      example="useruser",
     *      minLength=8,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $password;
}

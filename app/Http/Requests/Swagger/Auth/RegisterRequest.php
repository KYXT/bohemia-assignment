<?php


namespace App\Http\Requests\Swagger\Auth;

/**
 * Class RegisterRequest
 *
 * @package App\Http\Requests\Swagger\Auth
 *
 * @OA\Schema(
 *      title="RegisterRequest",
 *      type="object",
 *      required={"name", "surname", "nickname", "phone", "email", "address", "city", "state", "zip", "password"}
 * )
 */
class RegisterRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="User's name",
     *      example="user",
     *      minLength=3,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $name;
    
    /**
     * @OA\Property(
     *      title="surname",
     *      description="User's surname",
     *      example="userSurname",
     *      minLength=3,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $surname;
    
    /**
     * @OA\Property(
     *      title="nickname",
     *      description="User's nickname",
     *      example="nicknameTest",
     *      minLength=3,
     *      maxLength=100,
     * )
     *
     * @var string
     */
    public $nickname;
    
    /**
     * @OA\Property(
     *      title="phone",
     *      description="User's phone",
     *      example="1234123412",
     *      minLength=6,
     *      maxLength=20,
     * )
     *
     * @var numeric
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="email",
     *      description="User's email",
     *      example="user@user.com",
     *      minLength=6,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $email;
    
    /**
     * @OA\Property(
     *      title="address",
     *      description="User's address",
     *      example="Washington street, 20",
     *      minLength=5,
     *      maxLength=100,
     * )
     *
     * @var string
     */
    public $address;
    
    /**
     * @OA\Property(
     *      title="city",
     *      description="User's city",
     *      example="New York",
     *      minLength=3,
     *      maxLength=50,
     * )
     *
     * @var string
     */
    public $city;
    
    /**
     * @OA\Property(
     *      title="state",
     *      description="User's state",
     *      example="NY",
     *      minLength=2,
     *      maxLength=50,
     * )
     *
     * @var string
     */
    public $state;
    
    /**
     * @OA\Property(
     *      title="zip",
     *      description="User's zip",
     *      example="15-311",
     *      minLength=3,
     *      maxLength=10,
     * )
     *
     * @var string
     */
    public $zip;

    /**
     * @OA\Property(
     *      title="password",
     *      description="User's password",
     *      example="useruser",
     *      minLength=8,
     *      maxLength=255,
     * )
     *
     * @var string
     */
    public $password;
}

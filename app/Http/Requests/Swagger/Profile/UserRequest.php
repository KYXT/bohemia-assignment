<?php


namespace App\Http\Requests\Swagger\Profile;

/**
 * Class UserRequest
 *
 * @package App\Http\Requests\Swagger\Profile
 *
 * @OA\Schema(
 *      title="UserRequest",
 *      type="object",
 * )
 */
class UserRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      example="Peter"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email",
     *      example="admin@admin.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="email_verified_at",
     *      description="Time when email was verified",
     *      example="2021-08-21T00:07:55.000000Z"
     * )
     *
     * @var string
     */
    public $email_verified_at;

    /**
     * @OA\Property(
     *      title="created_at",
     *      description="Time when uesr was created",
     *      example="2021-08-21T00:07:55.000000Z"
     * )
     *
     * @var string
     */
    public $created_at;

    /**
     * @OA\Property(
     *      title="updated_at",
     *      description="Time when user was updated",
     *      example="2021-08-21T00:07:55.000000Z"
     * )
     *
     * @var string
     */
    public $updated_at;
    
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
     * @var string
     */
    public $phone;
    
    /**
     * @OA\Property(
     *      title="Role",
     *      description="User's role",
     *      example="1"
     * )
     *
     * @var int
     */
    public $role;
    
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
}

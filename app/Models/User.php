<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int                                                                                                                $id
 * @property string                                                                                                             $email
 * @property string                                                                                                             $first_name
 * @property string                                                                                                             $last_name
 * @property string                                                                                                             $user_name
 * @property string                                                                                                             $phone_number
 * @property int                                                                                                                $role
 * @property int                                                                                                                $age
 * @property string                                                                                                             $gender
 * @property string                                                                                                             $education
 * @property string                                                                                                             $occupation
 * @property string|null                                                                                                        $interests
 * @property string|null                                                                                                        $hobbies
 * @property string|null                                                                                                        $bio
 * @property int                                                                                                                $postal_code
 * @property string                                                                                                             $address
 * @property mixed                                                                                                              $password
 * @property int                                                                                                                $enable
 * @property \Illuminate\Support\Carbon|null                                                                                    $created_at
 * @property \Illuminate\Support\Carbon|null                                                                                    $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null                                                                                                      $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken>                           $tokens
 * @property-read int|null                                                                                                      $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHobbies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserName($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'user_name',
        'phone_number',
        'role',
        'age',
        'gender',
        'education',
        'occupation',
        'interests',
        'hobbies',
        'bio',
        'postal_code',
        'address',
        'password',
        'enable',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

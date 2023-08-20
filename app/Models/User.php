<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Database\Factories\UserFactory;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\DatabaseNotificationCollection;

/**
 * App\Models\User
 *
 * @property int                                                            $id
 * @property string                                                         $email
 * @property string                                                         $first_name
 * @property string                                                         $last_name
 * @property string                                                         $user_name
 * @property string                                                         $phone_number
 * @property int                                                            $role_id
 * @property int                                                            $age
 * @property string                                                         $gender
 * @property string                                                         $education
 * @property string                                                         $occupation
 * @property string|null                                                    $interests
 * @property string|null                                                    $hobbies
 * @property string|null                                                    $bio
 * @property int                                                            $postal_code
 * @property string                                                         $address
 * @property mixed                                                          $password
 * @property Carbon|null                                                    $deleted_at
 * @property Carbon|null                                                    $created_at
 * @property Carbon|null                                                    $updated_at
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null                                                  $notifications_count
 * @property-read Collection<int, \App\Models\Order>                        $ordersBought
 * @property-read int|null                                                  $orders_bought_count
 * @property-read Collection<int, \App\Models\Order>                        $ordersSold
 * @property-read int|null                                                  $orders_sold_count
 * @property-read \App\Models\Role|null                                     $role
 * @property-read Collection<int, PersonalAccessToken>                      $tokens
 * @property-read int|null                                                  $tokens_count
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User onlyTrashed()
 * @method static Builder|User query()
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereAge($value)
 * @method static Builder|User whereBio($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDeletedAt($value)
 * @method static Builder|User whereEducation($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereHobbies($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereInterests($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereOccupation($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhoneNumber($value)
 * @method static Builder|User wherePostalCode($value)
 * @method static Builder|User whereRoleId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUserName($value)
 * @method static Builder|User withTrashed()
 * @method static Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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
        'role_id',
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

    public static function getAllUsers()
    {
        return User::select([
            'email',
            'first_name',
            'last_name',
            'user_name',
            'phone_number',
            'id',
            'role_id',
        ])->paginate(10);
    }

    public static function storeEditedUser(Request $request, $id)
    {
        $data = $request->all();

        /*
         * removing the token.
         */
        array_shift($data);

        return User::find($id)->update($data);
    }

    public function ordersBought(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function ordersSold(): HasMany
    {
        return $this->hasMany(Order::class, 'seller_id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}

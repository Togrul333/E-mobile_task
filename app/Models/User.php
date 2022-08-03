<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = false;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function travel_districts()
    {
        return $this->hasMany(Travel_district::class);
    }

    public function last_travel_districts()
    {
        $dates_travel = $this->travel_districts()->orderBy('date_of_travel', 'desc')->first();
        return $dates_travel->name ?? 'Seyahet etmiib';
    }

    public function calculate_age()
    {

        return Carbon::createFromFormat("Y-m-d", $this->date_of_birthday)->age;

//        $birthday_timestamp = strtotime($this->born);
//        $age = date('Y') - date('Y', $birthday_timestamp);
//        if (date('md', $birthday_timestamp) > date('md')) {
//            $age--;
//        }
//        return $age;
    }
}

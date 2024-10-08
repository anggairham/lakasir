<?php

namespace App\Models\Tenants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProfile
 */
class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'address',
        'locale',
        'photo',
        'timezone',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function get(array $key = ['*']): Profile
    {
        return Profile::select($key)->whereUserId(auth()->id())->first() ?? new Profile();
    }
}

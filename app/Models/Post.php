<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Post
 * @package App\Models
 *
 * @property int $id
 * @property int $user_id
 * @property string $publish_date
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property string $rate_avg
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['rate_avg'];

    protected static function booted()
    {
        static::addGlobalScope('sort', function ($query) {
            $query->orderBy('publish_date', 'DESC');
        });
    }

    public function scopeDate($query)
    {
        return $query->where('publish_date', '<=', now());
    }

    public function scopeUser($query)
    {
        if (auth()->user()->is_author) {
            return $query->where('user_id', auth()->user()->id);
        }

        return $query;
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rates(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function setRate($rate)
    {
        if (auth()->check()) {
            Rate::query()->updateOrCreate([
                'user_id' => auth()->user()->id,
                'post_id' => $this->id,
            ], ['rate' => $rate]);
        }
    }

    public function getRateAvgAttribute(): ?string
    {
        $avg = 0;
        if ($rates = $this->rates()) {

            $count = $rates->count();

            if ($count >= 2) {

                $percent30Count = round((30 / 100) * $count);
                $percent70Count = $count - $percent30Count;

                $sum30 = DB::table('rates')
                    ->where('post_id', $this->id)
                    ->orderBy('created_at', 'DESC')
                    ->limit($percent30Count)
                    ->pluck('rate')
                    ->sum();

                $sum70 = DB::table('rates')
                    ->where('post_id', $this->id)
                    ->orderBy('created_at', 'ASC')
                    ->limit($percent70Count)
                    ->pluck('rate')
                    ->sum();

                $totalCount = ($percent30Count * 2) + $percent70Count;
                $totalSum = ($sum30 * 2) + $sum70;
                $avg = $totalSum / $totalCount;
            }
            else if ($count == 1) {
                $avg = DB::table('rates')
                    ->where('post_id', $this->id)
                    ->pluck('rate')
                    ->sum();
            }
        }

        return round($avg, 2);
    }

}

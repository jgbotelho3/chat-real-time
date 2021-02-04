<?php

namespace App\Models\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    protected $appends = ['owner'];


    /**
     * @return bool
     */
    public function getOwnerAttribute()
    {
        return $this->user_id == auth()->user()->id;
    }

    /**
     * @param $data
     * @return string
     */
    public function getCreatedAtAttribute($data)
    {
        return \Carbon\Carbon::parse($data)->format('d/m/Y H:i');
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

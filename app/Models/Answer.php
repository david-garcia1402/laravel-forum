<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends Model
{
    use HasFactory;

    public function support(): BelongsTo
    {
        return $this->belongsTo(Support::class);
    }

    protected $fillable = [
        'answer',
        'user_id_answer',
        'user_id_support',
        'support_id'
    ];
}

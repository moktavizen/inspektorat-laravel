<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DropdownItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'sort',
        'dropdown_id',
    ];

    public function dropdown(): BelongsTo
    {
        return $this->belongsTo(Dropdown::class);
    }
}

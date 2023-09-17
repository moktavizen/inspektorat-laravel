<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dropdown extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'sort'];

    public function dropdown_items(): HasMany
    {
        return $this->hasMany(DropdownItem::class);
    }
}

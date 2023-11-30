<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function amount()
    {
        return Attribute::make(
            get: fn($cents) => $cents / 100,
            set: fn($dollars) => $dollars * 100
        );
    }

    public function envelope()
    {
        return $this->belongsTo(Envelope::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

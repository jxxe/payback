<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Category extends Model
{
    use Sushi;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'Meals & Foodstuffs',
            'qualified' => true
        ],
        [
            'id' => 2,
            'name' => 'Textbooks & Supplies',
            'qualified' => true
        ],
        [
            'id' => 3,
            'name' => 'Room & Board',
            'qualified' => true
        ],
        [
            'id' => 4,
            'name' => 'Transportation',
            'qualified' => false
        ],
        [
            'id' => 999,
            'name' => 'Other',
            'qualified' => false
        ]
    ];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}

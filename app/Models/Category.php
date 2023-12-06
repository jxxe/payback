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
            'keywords' => 'meals, food, groceries, snacks',
            'slug' => 'food',
            'qualified' => true
        ],
        [
            'id' => 2,
            'name' => 'Textbooks & Supplies',
            'keywords' => 'textbooks, school supplies, office supplies, room decorations, educational materials',
            'slug' => 'supplies',
            'qualified' => true
        ],
        [
            'id' => 3,
            'name' => 'Room & Board',
            'keywords' => 'rent, utilities',
            'slug' => 'rent',
            'qualified' => true
        ],
        [
            'id' => 4,
            'name' => 'Transportation',
            'keywords' => 'transportation, public transit, airfare, rideshare',
            'slug' => 'transportation',
            'qualified' => false
        ],
        [
            'id' => 999,
            'name' => 'Other',
            'keywords' => 'all other expenses',
            'slug' => 'other',
            'qualified' => false
        ]
    ];

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}

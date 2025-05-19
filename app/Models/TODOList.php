<?php

namespace App\Models;

use App\Builders\TODOListBuilder;
use Illuminate\Database\Eloquent\Model;

class TODOList extends Model
{
    protected $table = 'lists';

    protected $guarded = [];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function query(): TODOListBuilder
    {
        return parent::query();
    }

    public function newEloquentBuilder($query): TODOListBuilder
    {
        return new TODOListBuilder($query);
    }
    
    public function items() {
        return $this->hasMany(TODOItem::class, 'list_id');
    }
}

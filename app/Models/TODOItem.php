<?php

namespace App\Models;

use App\Builders\TODOItemBuilder;
use Illuminate\Database\Eloquent\Model;

class TODOItem extends Model
{
    protected $guarded = [];
    protected $table = 'list_items';

    public function list() {
        return $this->belongsTo(TODOList::class, 'list_id');
    }
}

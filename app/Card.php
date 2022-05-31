<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{

    protected $fillable = ['title', 'order', 'list_id', 'owner_id'];

    public function lists(): BelongsTo
    {
        //list_id es el nombre que de la columna de la tabla cards en donde
        //se establece la relación: una card específica pertenece a una lista específica

        $this->BelongsTo(CardList::class, 'list_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}

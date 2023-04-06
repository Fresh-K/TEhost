<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pn extends Model
{
    protected $table = 'pns';
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function po(): BelongsToMany
    {
        return $this->belongsToMany(PO::class,'pns','pn_id');
    }
    use HasFactory;
}

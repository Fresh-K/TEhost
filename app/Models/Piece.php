<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Piece extends Model
{
    protected $table = 'pieces';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['inspector_id'];

    public function PO(){

        return $this->belongsTo('App\Models\PO','po_id','id');
    }
    public function inspector()
    {

        return $this->belongsTo(Lineinspector::class, 'inspector_id','id');
    }


    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PO extends Model
{
    protected $table = 'p_o_s';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function piece(){

        return $this->hasMany('App\Models\Piece','po_id');
    }

    public function pn(){

        return $this->belongsTo('App\Models\Pn');
    }

    public function inspector(){

        return $this->belongsTo(Lineinspector::class,'inspector_id','id');
    }
    use HasFactory;
}

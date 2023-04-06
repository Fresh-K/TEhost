<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Lineinspector extends Model
{
    public function pieces()
    {
        return $this->hasMany(Piece::class,'inspector_id', 'id');
    }
    public function po()
    {
        return $this->hasMany(PO::class,'inspector_id', 'id');
    }

    public static function getStates(){

        $lineInspectors = LineInspector::with(['po', 'pieces'])->get();

        $data = [];

        foreach ($lineInspectors as $inspector) {
            $posCount = $inspector->po->count();
            $piecesCount = $inspector->pieces->count();
            $piecessum = $inspector->pieces->sum('time');

            if ($piecesCount > 0) {
                $data[] = [
                    'Inspector Name' => $inspector->nom,
                    'Matricule' => $inspector->matricule,
                    'Status' => $inspector->status,
                    'PO Count' => $posCount,
                    'Pieces Count' => $piecesCount,
                    'Average time' => $piecessum/$piecesCount ,
                ];
            } else {
                $data[] = [
                    'Inspector Name' => $inspector->nom,
                    'Matricule' => $inspector->matricule,
                    'Status' => $inspector->status,
                    'PO Count' => $posCount,
                    'Pieces Count' => $piecesCount,
                    'Average time' => null,
                ];
            }
        }

          return $data;
    }
    use HasFactory;
}

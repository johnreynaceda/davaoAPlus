<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanInformation extends Model
{
    protected $guarded = [];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}

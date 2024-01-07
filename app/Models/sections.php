<?php

namespace App\Models;

use App\Models\invoices;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sections extends Model
{
    use HasFactory;

    protected $fillable= [
        'section_name',
        'description',
        'Created_by',
    ];

    public function invoice()
    {
        return $this->belongsTo(invoices::class);
    }

}

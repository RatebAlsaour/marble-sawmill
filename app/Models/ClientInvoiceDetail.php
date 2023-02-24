<?php

namespace App\Models;

use Database\Factories\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientInvoiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'clientInvoice_id',
        'block_symbol',
        'height',
        'width',
        'high'
    ];
    public function clientInvoice(): BelongsTo
    {
        return $this->belongsTo(ClientInvoice::class);
    }



}

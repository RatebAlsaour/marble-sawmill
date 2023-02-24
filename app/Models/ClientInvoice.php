<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ClientInvoice extends Model
{
    use HasFactory;


    protected $fillable = [
        'client_id',
        'category_id'
    ];


    public function client() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function ClientInvoiceDetail()
    {
        return $this->belongsToMany(ClientInvoiceDetail::class);
    }

}

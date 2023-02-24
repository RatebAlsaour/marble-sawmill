<?php

namespace App\Models;

use App\Http\Resources\category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends User
{
    /**@var helper variable for management */
    public $params;

    protected $fillable = [
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function invoices()
    {
        $this->belongsToMany(ClientInvoices::class);
    }

    public function bookings() : hasMany
    {
        return $this->hasMany(Booking::class);
    }
}

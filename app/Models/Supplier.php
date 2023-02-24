<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Supplier extends User
{
    use HasFactory;


    protected $fillable = [
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function invoices(){
        return $this->hasMany(supplierInvoice::class);
    }
    public function scopeSubject($query, $subject_id)
    {
        return $query->whereRelation('user.subjects', 'subjects.id', $subject_id);
    }

    public function scopeName($query, $name)
    {
        return $query->whereRelation('user', 'name', 'like', '%' . $name . '%');
    }


    public function scopeEducationalLevel($query, $educational_level)
    {
        return $query->where('educational_level', $educational_level);
    }
}

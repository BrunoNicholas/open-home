<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'description',
        'location',
        'attachement',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'incidents';

    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

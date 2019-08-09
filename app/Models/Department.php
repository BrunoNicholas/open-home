<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'created_by',
        'parent_department',
        'description',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'departments';
    
    /**
     * Belonds to relationship connects both 
     * the user table and the departments table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}

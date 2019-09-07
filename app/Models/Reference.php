<?php

namespace App\Models;
use App\Models\Department;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'topic',
        'item',
        'attachment',
        'description',
        'department_id',
        'status'
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'references';
    
    /**
     * Belonds to relationship connects both 
     * the department table and the departments table
     *
     */
    public function departments()
    {
        return $this->belongsTo(Department::class);
    }
    
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

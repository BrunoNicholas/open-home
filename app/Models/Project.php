<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Post;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by',
        'department',
        'name',
        'description_image',
        'description',
        'estimated_period',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * The string variable is for the table.
     *
     * @var array
     */
    protected $table = 'projects';
    
    /**
     * Belonds to relationship connects both 
     * the user table and the books table
     *
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The relationship method for posts.
     *
     * as posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

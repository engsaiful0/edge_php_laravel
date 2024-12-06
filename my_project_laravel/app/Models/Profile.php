<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Set the table name if it's different from the default (optional)
    // protected $table = 'profiles';

    // Define the fillable fields for mass assignment
    protected $fillable = ['bio', 'user_id'];

    /**
     * Define the inverse of the one-to-one relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

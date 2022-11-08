<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Author extends Authenticatable 
{
    use HasFactory,HasApiTokens;
    protected $fillable = ['username'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

        /**
     * Find the user instance for the given username.
     *
     * @param  string  $username
     * @return \App\Models\User
     */
    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
    
}

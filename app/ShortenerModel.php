<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortenerModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'urls_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'source', 'short_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    // Table Name
    protected $table = 'files';
    // Primary Key
    public $primaryKey = 'file_id';
    //Timestamps
    protected $filliablle = [
        'text',
        'summary',
        'users'
    ];
    public $timestamps = true;


    public function users(){

        return $this->belongsTo(Users::class, 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class About extends Model
{
    use HasFactory;
        protected $fillable = [
       
    'heading_one',
    'heading_two',
    'text_one',
    'list_one',
    'list_two',
    'list_three',
    'text_two',
        
    ];
}

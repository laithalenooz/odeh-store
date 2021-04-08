<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyAndTerms extends Model
{
    use HasFactory;

    protected $fillable = ['terms', 'privacy'];
}

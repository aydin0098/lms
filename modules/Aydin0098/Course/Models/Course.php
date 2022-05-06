<?php

namespace Aydin0098\Course\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    static $types = ['free','cash'];
    static $statuses = ['completed','progress','locked'];
}

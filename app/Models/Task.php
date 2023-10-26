<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\TaskController;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['id', 'name', 'completed'];
}

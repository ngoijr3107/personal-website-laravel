<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'project_name', 'project_image',
                            'project_description', 'code_link', 'live_link'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

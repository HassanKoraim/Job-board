<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tag extends Model
{
     use HasFactory;
    use HasUuids;
    // primary Key
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;


    protected $table = 'tag';
    protected $fillable = ['title'];
    protected $guarded = ['id'];
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}

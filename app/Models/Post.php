<?php

namespace App\Models;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;
    // primary Key
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;

    protected $table = 'post';
    protected $fillable = ['title', 'body','published','user_id'];
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}

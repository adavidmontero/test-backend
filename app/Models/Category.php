<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id'
    ];

    /* RELACIONES */
    //Una categoría pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Una categoría pertenece a muchos favoritos
    public function favorites()
    {
        return $this->belongsToMany(Favorite::class);
    }

    /* ALMACENAMIENTO */

    public function saveCategory($request)
    {
        $this->create([
            'name' => $request->name,
            'user_id' => auth()->user()->id
        ]);
    }

    public function updateCategory($request, $category)
    {
        $category->update([
            'name' => $request->name
        ]);
    }
}

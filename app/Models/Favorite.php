<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'url', 'description', 'visibility', 'user_id', 'categories'
    ];

    /* RELACIONES */

    //Un favorito pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Un favorito tiene muchas categorias
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /* ALMACENAMIENTO */

    public function saveFavorite($request)
    {
        $favorite = Favorite::create([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'visibility' => $request->visibility,
            'user_id' => auth()->user()->id
        ]);

        $favorite->syncCategories($request->get('categories'));
    }

    public function updateFavorite($request, $favorite)
    {
        $favorite->update([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'visibility' => $request->visibility,
        ]);

        $favorite->syncCategories($request->get('categories'));
    }

    /* UTILIDADES */

    //Nos devuelve todos los favoritos públicos
    public function scopeIsPublic($query)
    {
        return $query->where('visibility', 1);
    }

    //Accesor para cambiar la forma en como se ve visibilidad en la vista
    public function getVisibilityAttribute($value)
    {
        return ($value) ? 'Público' : 'Privado';
    }

    //Retorna true si la visibilidad es pública
    public function visibilityPublic()
    {
        return $this->visibility === 'Público';
    }

    public function syncCategories($categories)
    {
        //Crea una colección con el arreglo y comienza un map
        $categoriesIds = collect($categories)->map(function ($cat) {

            if(is_numeric($cat)) {
                //Si la etiqueta no existe la crea
                return Category::find($cat) ? $cat : Category::create(['name' => $cat])->id;
            } else {
                return !Category::where('name', $cat)->get() ? Category::where('name', $cat)->get('id') : Category::create(['name' => $cat])->id;
            }
        });

        $this->categories()->sync($categoriesIds);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        "icon",
        "title",
        "menu_category_id",
        "parent_menu_id",
        "link"
    ];

    public function submenu()
    {
        return $this->HasMany(\App\Menu::class, 'parent_menu_id');
    }
}

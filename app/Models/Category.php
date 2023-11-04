<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use \Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

    public function scopeRoot($query)
    {
        $query->whereNull('parent_id');
    }

    // public function children()
    // {
    //     return $this->hasMany(Category::class, 'parent_id', 'id');
    // }

    public function getParentKeyName()
    {
        return 'parent_id';
    }

    public function getLocalKeyName()
    {
        return 'id';
    }

    public function getDepthName()
    {
        return 'depth';
    }

    public static function hasChildren($data, $id)
    {
        foreach ($data as $item) {
            if ($item['parent_id'] == $id) {
                return true;
            }
        }
    }

    public static function toTree2($data, $parent_id = NULL, $depth = 0)
    {
        $result = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['depth'] = $depth;
                $result[] = $item;
                // unset($data[$item['id']]);
                if (self::hasChildren($data, $item['id'])) {
                    $child = self::toTree2($data, $item['id'], $depth + 1);
                    $result = array_merge($result, $child);
                }
            }
        }
        return $result;
    }

    public static function toHtml($data, $parent_id = NULL, $depth = 0)
    {
        if ($depth == 0)
            $result = "<ul id='main-menu'>";
        else
            $result = "<ul id='sub-menu'>";

        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $result .= "<li>";
                $result .= "<a href=''>{$item['title']}</a>";
                if (self::hasChildren($data, $item['id'])) {
                    $result .= self::toHtml($data, $item['id'], $depth + 1);
                }
                $result .= "</li>";
            }
        }
        $result .= "</ul>";
        return $result;
    }

    public static function lastDepth($data, $parent_id = NULL)
    {
        $result = [];
        foreach ($data as $item) {
            $result[] = $item['depth'];
        }
        return max($result);
    }
}

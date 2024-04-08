<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'identifier' => (int)$category->id,
            'title' => (string)$category->name,
            'description' => (string)$category->description,
            'creationDate' => (string)$category->created_at,
            'lastChange' => (string)$category->updated_at,
            'deleteDate' => isset($category->deleted_at) ? (string) $category->deleted_at : null,

            'links' => [
                'rel' => 'self',
                'href' => route('categories.show', $category->id),
            ],
            [
                'rel' => 'categories.buyers',
                'href' => route('categories.buyers.index', $category->id),
            ],
            [
                'rel' => 'categories.products',
                'href' => route('categories.products.index', $category->id),
            ],
            [
                'rel' => 'categories.transactions',
                'href' => route('categories.transactions.index', $category->id),
            ],
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'identifier' => 'id',
            'title' => 'name',
            'details' => 'description',
            'creationDate' => 'created_at',
            'lastChange' => 'updated_at',
            'deletedDate' => 'deleted_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identifier',
            'name' => 'title',
            'description' => 'details',
            'created_at' => 'creationDate',
            'updated_at' => 'lastChange',
            'deleted_at' => 'deletedDate',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}

<?php

namespace App\Models;

use App\Core\Application;

class Category extends Model
{
    /** @var int */
    public $id;

    /** @var string */
    public $name;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $attributes = [
        'name',
    ];

    public static function getInstance(): self
    {
        return new self;
    }

    public function courses()
    {
        return Course::getInstance()->where('category_id', $this->id)->get();
    }

    public function postCount()
    {
        return Blog::getInstance()->where('category_id', $this->id)->count();
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}

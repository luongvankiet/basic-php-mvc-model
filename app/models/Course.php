<?php

namespace App\Models;

class Course extends Model
{
    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var string */
    public $imagePath;

    /** @var int */
    public $categoryId;

    protected $table = 'courses';
    protected $primaryKey = 'id';

    protected $attributes = [
        'name',
        'description',
        'category_id',
        'image_path'
    ];

    public static function getInstance(): self
    {
        return new self;
    }
}

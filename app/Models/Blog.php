<?php

namespace App\Models;

class Blog extends Model
{
    /** @var int */
    public $id;

    /** @var string */
    public $title;

    /** @var string */
    public $content;

    /** @var string */
    public $imagePath;

    /** @var int */
    public $categoryId;

    /** @var int */
    public $userId;

    protected $table = 'blogs';
    protected $primaryKey = 'id';

    protected $attributes = [];

    public static function getInstance(): self
    {
        return new self;
    }

    public function user()
    {
        return User::getInstance()->where('id', $this->userId)->first();
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'image_path' => $this->imagePath,
            'category_id' => $this->categoryId,
            'user_id' => $this->userId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}

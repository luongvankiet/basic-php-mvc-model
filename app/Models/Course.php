<?php

namespace App\Models;

use App\Core\Application;

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
    public $duration;

    /** @var int */
    public $categoryId;

    /** @var int */
    public $userId;

    protected $table = 'courses';
    protected $primaryKey = 'id';

    protected $attributes = [
        'name',
        'description',
        'category_id',
        'image_path',
        'user_id'
    ];

    public static function getInstance(): self
    {
        return new self;
    }

    public function locations()
    {
        $courseLocations = LocationCourse::getInstance()->where('course_id', $this->id)->get();
        $locationIds = array_map(function ($courseLocations) {
            return $courseLocations->locationId;
        }, $courseLocations);

        return Location::getInstance()->whereIn('id', $locationIds)->get();
    }

    public function trainer()
    {
        return User::getInstance()->where('id', $this->userId)->first();
    }

    // public function locations()
    // {
    //     $courseLocations = LocationCourse::getInstance()->where('course_id', $this->id)->get();
    //     $locationIds = array_map(function ($courseLocations) {
    //         return $courseLocations->locationId;
    //     }, $courseLocations);

    //     return Location::getInstance()->whereIn('id', $locationIds)->get();
    // }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'image_path' => $this->imagePath,
            'category_id' => $this->categoryId,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}

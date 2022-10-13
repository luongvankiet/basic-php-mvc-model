<?php

namespace App\Models;

class LocationCourse extends Model
{
    /** @var int */
    public $locationId;

    /** @var int */
    public $courseId;

    protected $table = 'location_course';
    // protected $primaryKey = 'id';

    // protected $attributes = [
    //     'name',
    //     'address',
    //     'phone_contact',
    //     'email_contact'
    // ];

    public static function getInstance(): self
    {
        return new self;
    }

    public function toArray()
    {
        return [
            'location_id' => $this->locationId,
            'course_id' => $this->courseId,
        ];
    }
}

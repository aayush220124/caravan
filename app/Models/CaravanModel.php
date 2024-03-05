<?php

namespace App\Models;

use CodeIgniter\Model;

class CaravanModel extends Model
{
    protected $table = 'caravans'; // Name of your database table

    protected $primaryKey = 'id'; // Primary key of your table

    protected $allowedFields = [
        'caravan_name',
        'make',
        'model',
        'year',
        'registration_number',
        'color',
        'mileage',
        'images_url',
        'video_url',
        'short_description',
        'long_description',
        'tags',
        'features',
        'amenities',
        'rules_regulations',
        'minimum_days_available',
        'dates_availability',
        'deposit_price',
        'per_day_price',
    ];

    protected $useTimestamps = true; // Set to true if you have created_at and updated_at fields

    protected $dateFormat = 'datetime'; // Set the format of the timestamps

    // Validation rules for your model fields
    protected $validationRules = [
        'caravan_name' => 'required|max_length[255]',
        'make' => 'required|max_length[255]',
        'model' => 'required|max_length[255]',
        'year' => 'required|integer',
        'registration_number' => 'required|max_length[255]',
        'color' => 'required|max_length[255]',
        'mileage' => 'required|integer',
        'images_url' => 'max_length[255]',
        'video_url' => 'max_length[255]',
        'short_description' => 'required',
        'long_description' => 'required',
        'tags' => 'max_length[255]',
        'features' => 'max_length[255]',
        'amenities' => 'max_length[255]',
        'rules_regulations' => 'required',
        'minimum_days_available' => 'integer',
        'dates_availability' => 'max_length[1000]',
        'deposit_price' => 'required|integer',
        'per_day_price' => 'required|integer',
    ];

    // Error messages for validation
    protected $validationMessages = [
        // You can customize error messages here if needed
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = "events";

    protected $fillable = [
        "user_id",
        "category_id",
        "event_name",
        "event_address",
        "no_of_attendres",
        "price",
        "start_date",
        "end_date",
        "start_time",
        "end_time",
        "publication_status",
        "cover_image",
        "description",
    ];

    public function categories()
    {
        return $this->belongsTo("App\Models\Category", "category_id", "id");
    }

    public function users()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }
}

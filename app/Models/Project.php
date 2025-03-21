<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function timesheets()
    {
        return $this->hasManyThrough(Timesheet::class, User::class);
    }

    public function attributes()
    {
        return $this->hasMany(AttributeValue::class, 'entity_id');
    }

    public function scopeFilter($query, $filters)
    {
        foreach ($filters as $field => $value) {
            $query->when($field === 'status', fn($q) => $q->where('status', $value))
                ->when($field === 'name', fn($q) => $q->where('name', 'like', "%$value%"));
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\Encryptable;
use Spatie\Activitylog\Traits\LogsActivity;

class Employee extends Model
{

  use LogsActivity;
  use Encryptable;

  protected static $logAttributes = ['pan', 'social_security', 'department', 'employee_id'];
  protected $encryptable = ['pan', 'social_security'];
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'first_name',
      'last_name',
      'gender',
      'department',
      'hire_date',
      'dob',
      'pan',
      'primary_email',
      'nationality',
      'father_name',
      'spouse_name',
      'social_security',
      'other_email',
      'employee_id',
      'children'
  ];
  protected $guarded = ['id', 'uuid'];

  protected static function boot()
  {
    parent::boot();
    self::creating(function ($model) {
      $model->uuid = (string) Str::uuid();
      return true;
    });
  }
}

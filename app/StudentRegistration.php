<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class StudentRegistration extends Authenticatable
{
    protected $table = 'student_registrations';
}

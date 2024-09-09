<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// if we want to save a random string in id
// use HasUuids(36 chars) or HasUlids(26 chars);

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    // to use Student::create() method to store data, initially table coloumns are locked
    protected $guarded = [];

    // using this we can only add data in name field and not in age and city
    // protected $fillable = ['name'];

    // if we want to change table's name in db, first change using phpMyAdmin then here, SAME FOR OTHER THINGS BELOW
    //protected $table = 'students_data';
    // but in coding we can use the Model name same as before, 'Student'

    // if we want to change the name of the primary key
    //protected $primaryKey = 'student_id'

    // if we want to change the type of primary key
    //public $incrementing = false;
    //protected $keyType = 'string';

    // change the format of the date
    //protected $dateFormat = 'U';

    // change the name of created_at and updated_at
    //const CREATED_AT = 'c_time';
    // const UPDATED_AT = 'u_time';

    // set default values for columns
    // protected $attributes = [
    // 'age' => 18,
    // 'city' => 'NoCity',
    // ];

    // want to change the databse
    //protected $connection = 'sqlite';
    // this only changes the database for this model, in this way we can use multiple dbs in a single project


}

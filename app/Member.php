<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
     use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'n_id',
        'email',
        'degree',
        'department_id',
        'picture',
        'cv',
    ];
    /**
     * The name of degrees
     *
     * @var array
     */
    CONST degrees = [
        'ماجستير',
        'دكتوراة'
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'name' => 'required|string',
            'phone'=> 'nullable|string',
            'email'=> 'nullable|string',
            'n_id'=> 'nullable|string',
            'degree'=> 'nullable|string',
            'department_id'=> 'nullable|string',
            'picture'=> 'file',
            'cv'=> 'file',
        ];
    }

    /**
     * Get the providers for the Service.
     */
    public function decisions()
    {
        return $this->belongsToMany('App\Decision');
    }

    /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public static function getList()
    {
        return static::paginate(10);
    }
}

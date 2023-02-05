<?php

namespace App;

use Carbon\Carbon;
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
        'name', 'n_id', 'employment_date',
        'department_id', 'specialization_id',
        'degree', 'academic_degree',
        'last_pormotion_date', 
        //'next_pormotion_date',
        'notes', 'phone', 'email',
        'picture'
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

    public function getMinimumYears($degree,$academic_degrees)
    {
        if($academic_degrees == 'أستاذ'){
            return 0;
        }
        if($academic_degrees == 'أستاذ مساعد' && $degree == 'دكتوراة'){
            return 3;

        }elseif($academic_degrees == 'أستاذ مشارك' && $degree == 'ماجستير'){
            return 6;
        }else{
            return 4;
        }
    }
   
    /**
     * The name of degrees
     *
     * @var array
     */
    CONST academic_degrees = [
        'أستاذ',
        'أستاذ مساعد',
        'أستاذ مشارك',
        'محاضر ',
        'محاضر مساعد '
    ];

    /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            // 'name' => 'required|string',
            // 'phone'=> 'nullable|string',
            // 'email'=> 'nullable|string',
            // 'n_id'=> 'nullable|string',
            // 'degree'=> 'nullable|string',
            // 'department_id'=> 'nullable|string',
            'name'=> 'required|string',
            'n_id'=> 'required|string',
            'employment_date'=> 'required|string',
            'department_id'=> 'required|string',
            'specialization_id'=> 'required|string',
            'degree'=> 'required|string',
            'academic_degree'=> 'required|string',
            'last_pormotion_date'=> 'date',
          //  'next_pormotion_date'=> 'date',
            'notes'=> 'required|string',
            'phone'=> 'required|string',
            'email'=> 'required|string',
            //'cv'=> 'file',
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

     /**
     * Returns the paginated list of resources
     *
     * @return \Illuminate\Pagination\Paginator
     **/
    public function calculateNextPromotionDate()
    {
        $years = $this->getMinimumYears($this->degree,$this->academic_degree);
        
        if($years > 0){
            $last_date = new Carbon($this->last_pormotion_date);
            $next_date = $last_date->addYears($years);
            $this->next_pormotion_date = $next_date;
            $this->save();
        }
        
        
        
    }
}

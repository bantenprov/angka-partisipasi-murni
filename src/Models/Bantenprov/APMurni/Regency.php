<?php

namespace Bantenprov\APMurni\Models\Bantenprov\APMurni;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regency extends Model
{

    protected $table = 'regencies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('province_id', 'name');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\APMurni\Models\Bantenprov\APMurni\Province','id','province_id');
    }

}


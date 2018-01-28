<?php

namespace Bantenprov\APMurni\Models\Bantenprov\APMurni;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class APMurni extends Model
{

    protected $table = 'ap_murnis';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\APMurni\Models\Bantenprov\APMurni\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\APMurni\Models\Bantenprov\APMurni\Regency','id','regency_id');
    }

}


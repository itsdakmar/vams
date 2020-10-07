<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * @property integer $id
 * @property integer $vehicle_id
 * @property string $status
 * @property string $tarikh
 * @property string $servis
 * @property string $enjin
 * @property string $brek
 * @property string $transmisi
 * @property string $steering
 * @property string $suspension
 * @property string $casis
 * @property string $pam_jentera
 * @property string $kos
 * @property string $created_at
 * @property string $updated_at
 * @property Vehicle $vehicle
 * @mixin Builder
 */
class ServiceHistory extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['vehicle_id', 'tarikh', 'status', 'servis', 'enjin', 'brek', 'transmisi', 'steering', 'suspension', 'casis', 'pam_jentera', 'kos', 'created_at', 'updated_at'];

    protected $dates = ['tarikh'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}

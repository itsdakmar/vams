<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $office_id
 * @property string $no_siri_b
 * @property string $no_enjin
 * @property string $no_casis
 * @property string $tarikh_pendaftaran
 * @property string $tarikh_perolehan
 * @property string $no_kenderaan
 * @property string $model
 * @property string $jenis
 * @property string $no_fail
 * @property string $created_at
 * @property string $updated_at
 * @property Office $office
 * @property ServiceHistory[] $serviceHistories
 */
class Vehicle extends Model
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
    protected $fillable = ['office_id', 'no_siri_b', 'no_enjin', 'no_casis', 'tarikh_pendaftaran', 'tarikh_perolehan', 'no_kenderaan', 'model', 'jenis', 'no_fail', 'created_at', 'updated_at', 'image'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceHistories()
    {
        return $this->hasMany('App\Models\ServiceHistory');
    }
}

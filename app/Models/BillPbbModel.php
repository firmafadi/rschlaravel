<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillPbbModel extends Model
{
     /**
     * Set the connection to be apply
     */
    protected $connection = 'GW_PBB';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'PBB_SPPT';
}

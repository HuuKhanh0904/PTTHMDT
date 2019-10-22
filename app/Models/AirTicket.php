<?php

namespace App\Models;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;

class AirTicket extends Model
{
    protected $table = 'air_tickets';  //tên bảng

    protected $primaryKey = 'air_ticket_id'; //khóa chính

    protected $keyType = 'int'; // kiểu của khóa chính

    protected $fillable = [ // Chèn các trường ở đây
        'air_ticket_id',
        'air_ticket_code',
        'air_ticket_name',
        'air_ticket_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public $timestamps = true;
}

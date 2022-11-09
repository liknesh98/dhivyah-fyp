<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Announcement extends Model

{

    use HasFactory;



    protected $fillable = [

        'name', 'desc' , 'img_path', 'status', 'created_by'

    ];

    protected $table = 'announcement';
}

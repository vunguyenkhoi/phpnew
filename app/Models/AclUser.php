<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AclUserHasRole;
use App\Models\AclRoleHasPermission;
use App\Models\AclUserHasPermision;
use App\Models\ShopPost;


class AclUser extends Model
{
    use HasFactory;
    protected $table = 'acl_users';
    protected $fillable = [
        'username',
        'last_name',
        'username',
        'fist_name',
        'gender',
        'email',
        'birthday',
        'avatar',
        'code',
        'job_title',
        'department',
        'manager_id',
        'phone',
        'address1',
        'city',
        'username',
        'state',
        'postal_code',
        'country',
        'active_code',
        'username',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $dates = [
        'birthday',
        'created_at',
        'updated_at'
    ];
    protected $dateFormat = 'Y-m-d H:i:s';

    public function roles()
    {
        return $this->hasMany(AclUserHasRole::class, 'user_id', 'id');
    }

    public function permissions()
    {
        return $this->hasMany(AclRoleHasPermission::class, 'permission_id', 'id');
    }
    public function users()
    {
        return $this->hasMany(AclUserHasPermision::class, 'permission_id', 'id');
    }
    public function posts()
    {
        return $this->hasMany(ShopPost::class, 'user_id', 'id');
    }
}

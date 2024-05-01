<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Permission;
use App\Models\UserPermission;
use App\Models\Role;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ACTIVE = 1;
    const INACTIVE = 0;

    //Approval statuses
    const APPROVED = 1;
    const NOT_APPROVED = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'last_name',
        'first_name',
        'username',
        'dob',
        'status',
        'role_id',
        'user_image',
        'assigned_permissions',
        'password_reset_token',
        'is_approved',
        'site_address',
        'correspondence_address',
        'postal_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsersForFilters($searchKey){
        return User::with('role')
        ->where('role_id',1)
        ->where(function($query) use($searchKey){

            if($searchKey != null){

                $query->where('first_name','like','%'.$searchKey.'%')
                ->orWhere('last_name','like','%'.$searchKey.'%')
                ->orWhere('email','like','%'.$searchKey.'%')
                ->orWhere('phone','like','%'.$searchKey.'%');
            }
        })
        ->paginate(env("RECORDS_PER_PAGE"));
    }

    public static function getClientsForFilters($searchKey){

        return User::with('role')
        ->where('role_id',2)
        ->where(function($query) use($searchKey){

            if($searchKey != null){

                $query->where('first_name','like','%'.$searchKey.'%')
                ->orWhere('last_name','like','%'.$searchKey.'%')
                ->orWhere('email','like','%'.$searchKey.'%')
                ->orWhere('phone','like','%'.$searchKey.'%');
            }
        })
        ->orderBy('id','desc')        
        ->paginate(env("RECORDS_PER_PAGE"));

    }

    // *** Load all active role = user  ,clients
    public static function getAllClients(){
        return  User::where('status',1)
        ->where('role_id',2)
        ->pluck('first_name','id');

    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id','id');
    }
    
    public function permissions(){
        return $this->belongsToMany(Permission::class, 'user_has_permissions');
    }

    public function testimonials(){

        return $this->hasMany(Testimonial::class);
        
    }

    public function hasPermission($permission) {

        $userHasPermission = null;

        $permissionRec = Permission::where('name',$permission)->get()->first();

        if($permissionRec != null){

            $userHasPermission = UserPermission::where('permission_id',$permissionRec->id)
            ->where('user_id',Auth::user()->id)->get()->first();
        }
        

        return $userHasPermission != null ? true : false;

    }
    
    public static function getUserPermissions($userId){

        return UserPermission::where('user_id',$userId)->pluck('permission_id')->toArray();
    }

}

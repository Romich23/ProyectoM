<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getId()
{
return $this->attributes['id'];
}
public function setId($id)
{
$this->attributes['id'] = $id;
}
public function getName()
{
return $this->attributes['name'];
}
public function setName($name)
{
$this->attributes['name'] = $name;
}
public function getEmail()
{
return $this->attributes['email'];
}
public function setEmail($email)
{
$this->attributes['email'] = $email;
}
public function getPassword()
{
return $this->attributes['password'];
}
public function setPassword($password)
{
$this->attributes['password'] = $password;
}
public function getRole()
{
return $this->attributes['role'];
}
public function setRole($role)
{
$this->attributes['role'] = $role;
}
}

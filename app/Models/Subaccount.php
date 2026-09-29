<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subaccount extends Model
{
    use HasFactory;


    protected $fillable = [
        'transactions',
        'subscriptions',
        'authorizations',
        'first_name',
        'last_name',
        'email',
        'phone',
        'domain',
        'customer_code',
        'risk_action',
        'customer_id',
        'integration',
        'createdAt',
        'updatedAt',
        'identified',
        'identifications',
            
    
        'name',
        'bank_id',
        'slug',


        'account_name',
        'account_number',
        'assigned',
        'currency',
        'active',
        'virtual_account_id',


        'assignee_id',
        'assignee_type',
        'assigned_at',
        'expired',
        'expired_at',
        'account_type',
       
        'subvendor_commission',
       'distributor_email', 
       'vendor_email', 
       'distributor_id',
       'vendor_id',
       'user_id',
       'wallet',


    ];

    

}

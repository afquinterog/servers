<?php

namespace App\Policies;

use App\User;
use App\Models\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;


    /**
     * Allow super admins to execute all operations
     *
     * @param  \App\User  $user
     * @param  $ability
     * @return mixed
     */
    public function before($user, $ability)
    {
        // if ($user->isSuperAdmin()) {
        //     return true;
        // }
    }

    /**
     * Determine whether the user can view the company.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Company  $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        if(isset( $user->company_id) ){
            return $user->company->id == $company->id;
        }

        return true;
    }

    /**
     * Determine whether the user can create companies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param  \App\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Company  $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the company.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Company  $company
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the company.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Company  $company
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        return true;
    }
}

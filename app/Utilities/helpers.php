<?php

use Illuminate\Database\Eloquent\Model;

function companyId()
{
    return auth()->user()->company_id;
}

function sameCompanyAs(Model $model)
{
    return auth()->user()->company_id == $model->company_id;
}

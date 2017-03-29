<?php

function companyId()
{
    return auth()->user()->company_id;
}

function sameCompanyAs($class)
{
    return auth()->user()->company_id == $class->company_id;
}

/**
 * Instantiate a carbon instance
 *
 * @param $date
 * @return \Carbon\Carbon
 */
function carbon($date)
{
    return new Carbon\Carbon($date);
}

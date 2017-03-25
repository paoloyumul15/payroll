<?php

function companyId()
{
    return auth()->user()->company_id;
}

function sameCompanyAs($class)
{
    return auth()->user()->company_id == $class->company_id;
}

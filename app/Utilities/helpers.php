<?php

function companyId()
{
    if (! auth()->user()) {
        return null;
    }
    return auth()->user()->company_id;
}

<?php
function roleCouleur($role)
{
    if ($role == "manager")
        return "bg-red-300";
    elseif ($role == "empoleye")
        return "bg-green-300";
    else
        return "bg-yellow-300";
}

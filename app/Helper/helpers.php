<?php

/** Set Sidebar Item Active Backend */
function adminSidebarActive(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'mm-active';
            }
        }
    }
}

/** Set Sidebar Item Active Frontend */
function setActive(array $route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    }
}

<?php

/** Set Sidebar Item Active */
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

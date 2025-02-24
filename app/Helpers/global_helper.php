<?php

/**Activate a sidebar item */
if (!function_exists('activateSidebar')) {
    function activateSidebar(array $routes)
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active-nav-link';
            }
        }
        return '';
    }
}

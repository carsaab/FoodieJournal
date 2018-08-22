<?php

// [method, URI, Controller, Controller->action()]
return[

    //Account Controller
    ['GET', '/account/manage', 'AccountController','manage'], /* View */
    ['POST', '/account/create', 'AccountController', 'create'],
    ['GET', '/account/delete', 'AccountController', 'delete'],

    //Authentication Controller
    ['POST', '/authentication/login', 'AuthenticationController', 'login'],
    ['GET', '/authentication/logout', 'AuthenticationController', 'logout'],

    //Journal Controller
    ['GET', '/', 'JournalController', 'index'],
    ['POST', '/journal/create', 'JournalController', 'create'],
    ['GET', '/journal/delete', 'JournalController', 'delete'],
    ['GET', '/journal/open', 'JournalController', 'open'], /* View */
    ['POST', '/journal/write', 'JournalController', 'write'],

    ['GET', '/login/write', 'Login', 'write'],
    ['GET', '/login/joy', 'Login', 'joy'],
];
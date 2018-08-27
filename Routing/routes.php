<?php

// [method, URI, Controller, Controller->action()]
return[

    //Account Controller
    ['GET', '/account', 'AccountController','manage'],
    ['POST', '/api/account', 'AccountController', 'create'],
    ['DELETE', '/api/account', 'AccountController', 'delete'],

    //Authentication Controller
    ['GET', '/login', 'AuthenticationController', 'login'],
    ['POST', '/login', 'AuthenticationController', 'login'],
    ['GET', '/logout', 'AuthenticationController', 'logout'],

    //Journal Controller
    ['GET', '/', 'JournalController', 'index'],
    ['POST', '/api/journal/', 'JournalController', 'create'],
    ['DELETE', '/api/journal/', 'JournalController', 'delete'],
    ['GET', '/api/journal/entry', 'JournalController', 'open'],
    ['POST', '/api/journal/entry', 'JournalController', 'write'],

    ['GET', '/login/write', 'Login', 'write'],
    ['GET', '/login/joy', 'Login', 'joy'],
];
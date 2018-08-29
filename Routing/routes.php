<?php

// [method, URI, Controller, Controller->action()]
return[

    //Account Controller
    ['GET', '/account', 'AccountController','manage'],
    ['POST', '/api/account', 'AccountController', 'create'], /*need form for this in a view*/
    ['DELETE', '/api/account', 'AccountController', 'delete'],

    //Authentication Controller
    ['GET', '/login', 'AuthenticationController', 'login'],

    ['POST', '/login', 'AuthenticationController', 'login'],
    ['GET', '/logout', 'AuthenticationController', 'logout'],

    //Journal Controller
    ['GET', '/', 'JournalController', 'index'],
    ['GET', '/journal/entry', 'JournalController', 'open'],

    ['POST', '/api/journal/', 'JournalController', 'create'], /*need a form that has this as the action*/
    ['DELETE', '/api/journal/', 'JournalController', 'delete'], /*need a button that has this as the action or a link*/
    ['GET', '/api/journal/', 'JournalController', 'fetchJournalNames'],
    ['GET', '/api/journal/entry', 'JournalController', 'fetchEntries'],
    ['POST', '/api/journal/entry', 'JournalController', 'writeEntry']
];
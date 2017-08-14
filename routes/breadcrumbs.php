<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Domů', url("/"));
});

// Home > About
Breadcrumbs::register('schools', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Školy', url('/skoly'));
});


// Home > Blog > [Category]
Breadcrumbs::register('school', function($breadcrumbs, $school)
{
    $breadcrumbs->parent('schools');
    $breadcrumbs->push($school->zkraceny_nazev, url('/skoly/' . $school->getUrl() ));
});

// Home > About
Breadcrumbs::register('register', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Registrace', url('/registrace'));
});

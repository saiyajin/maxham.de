<?php

get('blog/{page?}', 'BlogController@start')->where('page', '(.*)');
get('laravel/{page?}', 'BlogController@start')->where('page', '(.*)');

post('mail/sendContact', 'ContactController@sendmail');

// Not required!
//get('/{page?}', 'PageController@index')->where('page', '(.*)');


<?php
require_once "config.php";
ob_start();
$uri = $_SERVER["REQUEST_URI"];
$cleaned = explode("?", $uri)[0];

route('/', 'homeController');
route('/etlap', 'menuController');
route('/kassai-volgy', 'kassaiVolgyController');
route('/rendezvenyek', 'rendezvenyekController');
route('/panzio', 'panzioController');
route('/rolunk', 'aboutController');
route('/kapcsolat', 'contactController');


route('/administ', 'adminController');
route('/weekly-menu-recording', 'weeklyMenuRecordingController');
route('/menu-recording', 'menuRecordingController');
route('/events', 'eventsRecordingController');
route('/programmes', 'programmesRecordingController');

route('/programmeSubmit', 'programmeSubmitController', "POST");
route('/programmes/(?<id>[\d]+)/programmesdelete', 'programmesDeleteController', "POST");

route('/mondaySubmit', 'mondaySubmitController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/mondaydelete', 'mondayDeleteController', "POST");

route('/tuesdaySubmit', 'tuesdaySubmitController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/tuesdaydelete', 'tuesdayDeleteController', "POST");

route('/wednesdaySubmit', 'wednesdaySubmitController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/wednesdaydelete', 'wednesdayDeleteController', "POST");

route('/thursdaySubmit', 'thursdaySubmitController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/thursdaydelete', 'thursdayDeleteController', "POST");

route('/fridaySubmit', 'fridaySubmitController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/fridaydelete', 'fridayDeleteController', "POST");

route('/soupSubmit', 'soupSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/soupdelete', 'soupDeleteController', "POST");

route('/hungarianDishesSubmit', 'hungarianDishesSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/hungarianDishesdelete', 'hungarianDishesDeleteController', "POST");

route('/mainCoursesSubmit', 'mainCoursesSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/mainCoursesdelete', 'mainCoursesDeleteController', "POST");

route('/dessertsSubmit', 'dessertsSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/dessertsdelete', 'dessertsDeleteController', "POST");

route('/garnishesSubmit', 'garnishesSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/garnishesdelete', 'garnishesDeleteController', "POST");

route('/homemadePicklesSubmit', 'homemadePicklesSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/homemadePicklesdelete', 'homemadePicklesDeleteController', "POST");

route('/gallery-recording', 'galleryRecordingController');
route('/galleryRecordingSubmit', 'galleryRecordingSubmitController', "POST");

route('/kaposMenuSubmit', 'kaposMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/kaposMenudelete', 'kaposMenuDeleteController', "POST");

route('/familyMenuSubmit', 'familyMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/familyMenudelete', 'familyMenuDeleteController', "POST");

route('/kassaiMenuSubmit', 'kassaiMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/kassaiMenudelete', 'kassaiMenuDeleteController', "POST");

route('/zseleciMenuSubmit', 'zseleciMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/zseleciMenudelete', 'zseleciMenuDeleteController', "POST");

route('/meroMenuSubmit', 'meroMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/meroMenudelete', 'meroMenuDeleteController', "POST");

route('/vegetarianMenuSubmit', 'vegetarianMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/vegetarianMenudelete', 'vegetarianMenuDeleteController', "POST");

route('/classicMenuSubmit', 'classicMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/classicMenudelete', 'classicMenuDeleteController', "POST");

route('/weddingMenuSubmit', 'weddingMenuSubmitController', "POST");
route('/events/(?<id>[\d]+)/weddingMenudelete', 'weddingMenuDeleteController', "POST");

route('/drinksSubmit', 'drinksSubmitController', "POST");
route('/menu-recording/(?<id>[\d]+)/drinksdelete', 'drinksDeleteController', "POST");

route('/addImageSubmit', 'imageSubmitController', "POST");

route('/panzio-gallery-recording', 'panzioGalleryRecordingController');


list($view, $data) = dispatch($cleaned, 'notFoundController');
if (preg_match("%^redirect\:%", $view)) {
    $redirectTarget = substr($view, 9);
    header("Location:" . $redirectTarget);
    die;
}
extract($data);
ob_clean();
require_once "templates/layout.php";
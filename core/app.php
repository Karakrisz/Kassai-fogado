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
route('/szechenyi-2020', 'szechenyi2020Controller');
route('/kisfaludy', 'kisfaludyController');
route('/login', 'LoginFormController');
route('/login', 'LoginSubmitController', "POST");
route('/logout', 'LogoutSubmitController');


route('/administ', 'adminController');
route('/weekly-menu-recording', 'weeklyMenuRecordingController');
route('/menu-recording', 'menuRecordingController');
route('/events', 'eventsRecordingController');
route('/programmes', 'programmesRecordingController');

route('/programmeSubmit', 'programmeSubmitController', "POST");
route('/programmes/(?<id>[\d]+)/programmesdelete', 'programmesDeleteController', "POST");

route('/mondaySubmit', 'mondaySubmitController', "POST");
route('/monday(?<id>[\d]+)', 'singleMondayController');
route('/monday(?<id>[\d]+)/edit', 'singleMondayEditController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/mondaydelete', 'mondayDeleteController', "POST");

route('/tuesdaySubmit', 'tuesdaySubmitController', "POST");
route('/tuesday(?<id>[\d]+)', 'singleTuesdayController');
route('/tuesday(?<id>[\d]+)/edit', 'singleTuesdayEditController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/tuesdaydelete', 'tuesdayDeleteController', "POST");

route('/wednesdaySubmit', 'wednesdaySubmitController', "POST");
route('/wednesday(?<id>[\d]+)', 'singleWednesdayController');
route('/wednesday(?<id>[\d]+)/edit', 'singleWednesdayEditController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/wednesdaydelete', 'wednesdayDeleteController', "POST");

route('/thursdaySubmit', 'thursdaySubmitController', "POST");
route('/thursday(?<id>[\d]+)', 'singleThursdayController');
route('/thursday(?<id>[\d]+)/edit', 'singleThursdayEditController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/thursdaydelete', 'thursdayDeleteController', "POST");

route('/fridaySubmit', 'fridaySubmitController', "POST");
route('/friday(?<id>[\d]+)', 'singleFridayController');
route('/friday(?<id>[\d]+)/edit', 'singleFridayEditController', "POST");
route('/weekly-menu-recording/(?<id>[\d]+)/fridaydelete', 'fridayDeleteController', "POST");

route('/soupSubmit', 'soupSubmitController', "POST");
route('/soup(?<id>[\d]+)', 'singleSoupController');
route('/soup(?<id>[\d]+)/edit', 'singleSoupEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/soupdelete', 'soupDeleteController', "POST");

route('/hungarianDishesSubmit', 'hungarianDishesSubmitController', "POST");
route('/hungarianDishes(?<id>[\d]+)', 'singleHungarianDishesController');
route('/hungarianDishes(?<id>[\d]+)/edit', 'singleHungarianDishesEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/hungarianDishesdelete', 'hungarianDishesDeleteController', "POST");

route('/mainCoursesSubmit', 'mainCoursesSubmitController', "POST");
route('/mainCourses(?<id>[\d]+)', 'singleMainCoursesController');
route('/mainCourses(?<id>[\d]+)/edit', 'singleMainCoursesEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/mainCoursesdelete', 'mainCoursesDeleteController', "POST");

route('/dessertsSubmit', 'dessertsSubmitController', "POST");
route('/desserts(?<id>[\d]+)', 'singleDessertsController');
route('/desserts(?<id>[\d]+)/edit', 'singleDessertsEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/dessertsdelete', 'dessertsDeleteController', "POST");

route('/garnishesSubmit', 'garnishesSubmitController', "POST");
route('/garnishes(?<id>[\d]+)', 'singleGarnishesController');
route('/garnishes(?<id>[\d]+)/edit', 'singleGarnishesEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/garnishesdelete', 'garnishesDeleteController', "POST");

route('/homemadePicklesSubmit', 'homemadePicklesSubmitController', "POST");
route('/homemadePickles(?<id>[\d]+)', 'singleHomemadePicklesController');
route('/homemadePickles(?<id>[\d]+)/edit', 'singleHomemadePicklesEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/homemadePicklesdelete', 'homemadePicklesDeleteController', "POST");

route('/drinksSubmit', 'drinksSubmitController', "POST");
route('/drinks(?<id>[\d]+)', 'singleDrinksController');
route('/drinks(?<id>[\d]+)/edit', 'singleDrinksEditController', "POST");
route('/menu-recording/(?<id>[\d]+)/drinksdelete', 'drinksDeleteController', "POST");

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

route('/addImageSubmit', 'imageSubmitController', "POST");
route('/addPanzioImageSubmit', 'PanzioimageSubmitController', "POST");

route('/panzio-gallery-recording', 'panzioGalleryRecordingController');


list($view, $data) = dispatch($cleaned, 'notFoundController');
if (preg_match("%^redirect\:%", $view)) {
    $redirectTarget = substr($view, 9);
    header("Location:" . $redirectTarget);
    die;
}
extract($data);
$user = createUser();
ob_clean();
require_once "templates/layout.php";
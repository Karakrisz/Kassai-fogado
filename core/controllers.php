<?php

function homeController()
{

    $connection = getConnection();
    $getmonday = monday($connection);
    $gettuesday = tuesday($connection);
    $getwednesday = wednesday($connection);
    $getthursday = thursday($connection);
    $getfriday = friday($connection);
    $allImages = retrieveAllimages($connection);
    $getprogrammes = programmes($connection);

    return [
        "home",
        [
            "title" => "Kezdőlap",
            "getmonday" => $getmonday,
            "gettuesday" => $gettuesday,
            "getwednesday" => $getwednesday,
            "getthursday" => $getthursday,
            "getfriday" => $getfriday,
            "allImages" => $allImages,
            "getprogrammes" => $getprogrammes,
        ],
    ];

}

function menuController()
{

    $connection = getConnection();

    $getsoup = soup($connection);
    $gethungarianDishes = hungarianDishes($connection);
    $getmainCourses = mainCourses($connection);
    $getdesserts = desserts($connection);
    $getgarnishes = garnishes($connection);
    $gethomemadePickles = homemadePickles($connection);
    $getdrinks = drinks($connection);

    return [
        "etlap",
        [
            "title" => "Étlap",
            "getsoup" => $getsoup,
            "gethungarianDishes" => $gethungarianDishes,
            "getmainCourses" => $getmainCourses,
            "getdesserts" => $getdesserts,
            "getgarnishes" => $getgarnishes,
            "gethomemadePickles" => $gethomemadePickles,
            "getdrinks" => $getdrinks,
        ],
    ];

}

function aboutController()
{

    return [
        "rolunk",
        [
            "title" => "Rólunk",
        ],
    ];

}

function kassaiVolgyController()
{

    return [
        "kassai-volgy",
        [
            "title" => "Rólunk",
        ],
    ];

}

function rendezvenyekController()
{

    return [
        "rendezvenyek",
        [
            "title" => "Rendezvények",
        ],
    ];

}

function panzioController()
{

    $connection = getConnection();

    $PanzioAllImages = PanzioretrieveAllimages($connection);

    return [
        "panzio",
        [
            "title" => "Panzió",
            "PanzioAllImages" => $PanzioAllImages,
        ],
    ];

}

function contactController()
{

    return [
        "kapcsolat",
        [
            "title" => "Kapcsolat",
        ],
    ];

}

function szechenyi2020Controller()
{

    return [
        "szechenyi-2020",
        [
            "title" => "SZÉCHENYI 2020",
        ],
    ];

}

function kisfaludyController()
{

    return [
        "kisfaludy",
        [
            "title" => "Kisfaludy",
        ],
    ];

}

function LoginFormController()
{
    $containsError = array_key_exists("containsError", $_SESSION);
    unset($_SESSION["containsError"]);

    return [
        "login",
        [
            "title" => "Bejelentkezés",
            "containsError" => $containsError,
        ],
    ];

}

function LoginSubmitController()
{
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $user = LoginUser(getConnection(), $email, $password);
    if ($user != null) {
        $_SESSION["user"] = [
            "name" => $user["name"],
        ];
        $view = "redirect:/administ";
    } else {
        $_SESSION["containsError"] = 1;
        $view = "redirect:/login";
    }
    return [
        $view, [],
    ];
}

function LogoutSubmitController()
{
    unset($_SESSION["user"]);
    return [
        "redirect:/", [],
    ];
}

function galleryRecordingController()
{

    $connection = getConnection();

    $imgFixed = array_key_exists("imgFixed", $_SESSION);
    unset($_SESSION["imgFixed"]);

    $dataDelete = array_key_exists("dataDelete", $_SESSION);
    unset($_SESSION["dataDelete"]);

    return [
        "gallery-recording",
        [
            "title" => "Képek rögzítése",
            "imgFixed" => $imgFixed,
            "dataDelete" => $dataDelete,
        ],
    ];

}

function imageSubmitController()
{
    $filename = $_FILES["image"]["name"];
    $image_file = $_FILES["image"]["tmp_name"];
    $folder = __DIR__ . "/../imagesuploaded/";
    move_uploaded_file($image_file, $folder . $filename);
    $connection = getConnection();
    imageAppend($connection, $folder . $filename);

    $_SESSION["imgFixed"] = 1;

    return [
        "redirect:/gallery-recording", [],
    ];
}

function PanzioimageSubmitController()
{
    $filename = $_FILES["panzioimage"]["name"];
    $image_file = $_FILES["panzioimage"]["tmp_name"];
    $folder = __DIR__ . "/../Panzioimagesuploaded/";
    move_uploaded_file($image_file, $folder . $filename);
    $connection = getConnection();
    PanzioimageAppend($connection, $folder . $filename);

    $_SESSION["imgFixed"] = 1;

    return [
        "redirect:/panzio-gallery-recording", [],
    ];
}

function panzioGalleryRecordingController()
{

    $connection = getConnection();

    $imgFixed = array_key_exists("imgFixed", $_SESSION);
    unset($_SESSION["imgFixed"]);

    $dataDelete = array_key_exists("dataDelete", $_SESSION);
    unset($_SESSION["dataDelete"]);

    return [
        "panzio-gallery-recording",
        [
            "title" => "Panzió Képek rögzítése",
            "imgFixed" => $imgFixed,
            "dataDelete" => $dataDelete,
        ],
    ];

}

function adminController()
{

    if (array_key_exists("user", $_SESSION)) {
        $_SESSION["user"]["name"];
    } else {
        return [
            "redirect:/login", [],
        ];
    }

    return [
        "administ",
        [
            "title" => "Adminisztrációs felület",
        ],
    ];

}

function weeklyMenuRecordingController()
{
    $connection = getConnection();
    $getmonday = monday($connection);
    $gettuesday = tuesday($connection);
    $getwednesday = wednesday($connection);
    $getthursday = thursday($connection);
    $getfriday = friday($connection);

    $foodFixed = array_key_exists("foodFixed", $_SESSION);
    unset($_SESSION["foodFixed"]);

    $dataDelete = array_key_exists("dataDelete", $_SESSION);
    unset($_SESSION["dataDelete"]);

    return [
        "weekly-menu-recording",
        [
            "title" => "Heti menü rögzítése",
            "getmonday" => $getmonday,
            "gettuesday" => $gettuesday,
            "getwednesday" => $getwednesday,
            "getthursday" => $getthursday,
            "getfriday" => $getfriday,
            "foodFixed" => $foodFixed,
            "dataDelete" => $dataDelete,
        ],
    ];

}

function mondaySubmitController()
{

    $connection = getConnection();

    $monday_name = $_POST['monday_name'];
    $monday_characterization = $_POST['monday_characterization'];
    mondayAppend($connection, $monday_name, $monday_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/weekly-menu-recording", [],
    ];

}

function mondayDeleteController($params)
{
    $connection = getConnection();

    mondayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/weekly-menu-recording",
        [],
    ];

}

function singleMondayController($params)
{
    $connection = getConnection();
    $monday = getMondayById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-monday",
        [
            "title" => $monday["monday_name"],
            "monday" => $monday,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleMondayEditController($params)
{
    $connection = getConnection();
    
    $monday_name = $_POST["monday_name"];
    $monday_characterization = $_POST["monday_characterization"];
    $id = $params["id"];

    updateMonday($connection, $id, $monday_name, $monday_characterization);

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/monday$id",
        [
        ],
    ];
}

function tuesdaySubmitController()
{
    $connection = getConnection();

    $tuesday_name = $_POST['tuesday_name'];
    $tuesday_characterization = $_POST['tuesday_characterization'];
    tuesdayAppend($connection, $tuesday_name, $tuesday_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/weekly-menu-recording", [],
    ];

}

function tuesdayDeleteController($params)
{
    $connection = getConnection();

    tuesdayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/weekly-menu-recording",
        [],
    ];

}

function singleTuesdayController($params)
{
    $connection = getConnection();
    $tuesday = getTuesdayById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-tuesday",
        [
            "title" => $tuesday["tuesday_name"],
            "tuesday" => $tuesday,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleTuesdayEditController($params)
{
    $connection = getConnection();
    
    $tuesday_name = $_POST["tuesday_name"];
    $tuesday_characterization = $_POST["tuesday_characterization"];

    $id = $params["id"];

    updateTuesday($connection, $id, $tuesday_name ,$tuesday_characterization);

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/tuesday$id",
        [
        ],
    ];
}

function wednesdaySubmitController()
{
    $connection = getConnection();

    $wednesday_name = $_POST['wednesday_name'];
    $wednesday_characterization = $_POST['wednesday_characterization'];
    wednesdayAppend($connection, $wednesday_name, $wednesday_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/weekly-menu-recording", [],
    ];

}

function wednesdayDeleteController($params)
{
    $connection = getConnection();

    wednesdayDelete($connection, $params["id"]);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/weekly-menu-recording",
        [],
    ];

}

function singleWednesdayController($params)
{
    $connection = getConnection();
    $wednesday = getWednesdayById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-wednesday",
        [
            "title" => $wednesday["wednesday_name"],
            "wednesday" => $wednesday,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleWednesdayEditController($params)
{
    $connection = getConnection();
    
    $wednesday_name = $_POST["wednesday_name"];
    $wednesday_characterization = $_POST["wednesday_characterization"];

    $id = $params["id"];

    updateWednesday($connection, $id, $wednesday_name ,$wednesday_characterization);

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/wednesday$id",
        [
        ],
    ];
}

function thursdaySubmitController()
{
    $connection = getConnection();

    $thursday_name = $_POST['thursday_name'];
    $thursday_characterization = $_POST['thursday_characterization'];
    thursdayAppend($connection, $thursday_name, $thursday_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/weekly-menu-recording", [],
    ];

}

function thursdayDeleteController($params)
{
    $connection = getConnection();

    thursdayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/weekly-menu-recording",
        [],
    ];

}

function singleThursdayController($params)
{
    $connection = getConnection();
    $thursday = getThursdayById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-thursday",
        [
            "title" => $thursday["thursday_name"],
            "thursday" => $thursday,
            "foodUpdateFixed" => "$foodUpdateFixed"
        ],
    ];
}

function singleThursdayEditController($params)
{
    $connection = getConnection();
    
    $thursday_name = $_POST["thursday_name"];
    $thursday_characterization = $_POST["thursday_characterization"];

    $id = $params["id"];

    updateThursday($connection, $id, $thursday_name ,$thursday_characterization);

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/thursday$id",
        [
        ],
    ];
}

function fridaySubmitController()
{
    $connection = getConnection();

    $friday_name = $_POST['friday_name'];
    $friday_characterization = $_POST['friday_characterization'];
    fridayAppend($connection, $friday_name, $friday_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/weekly-menu-recording", [],
    ];

}

function fridayDeleteController($params)
{
    $connection = getConnection();

    fridayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/weekly-menu-recording",
        [],
    ];

}

function singleFridayController($params)
{
    $connection = getConnection();
    $friday = getFridayById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-friday",
        [
            "title" => $friday["friday_name"],
            "friday" => $friday,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleFridayEditController($params)
{
    $connection = getConnection();
    
    $friday_name = $_POST["friday_name"];
    $friday_characterization = $_POST["friday_characterization"];

    $id = $params["id"];

    updateFriday($connection, $id, $friday_name ,$friday_characterization);

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/friday$id",
        [
        ],
    ];
}

function menuRecordingController()
{
    $connection = getConnection();

    $getsoup = soup($connection);
    $gethungarianDishes = hungarianDishes($connection);
    $getmainCourses = mainCourses($connection);
    $getdesserts = desserts($connection);
    $getgarnishes = garnishes($connection);
    $gethomemadePickles = homemadePickles($connection);
    $getdrinks = drinks($connection);

    $foodFixed = array_key_exists("foodFixed", $_SESSION);
    unset($_SESSION["foodFixed"]);

    $dataDelete = array_key_exists("dataDelete", $_SESSION);
    unset($_SESSION["dataDelete"]);

    return [
        "menu-recording",
        [
            "title" => "Étlap rögzítése",
            "getsoup" => $getsoup,
            "gethungarianDishes" => $gethungarianDishes,
            "getmainCourses" => $getmainCourses,
            "getdesserts" => $getdesserts,
            "getgarnishes" => $getgarnishes,
            "gethomemadePickles" => $gethomemadePickles,
            "getdrinks" => $getdrinks,
            "foodFixed" => $foodFixed,
            "dataDelete" => $dataDelete,
        ],
    ];

}

function soupSubmitController()
{
    $connection = getConnection();

    $soup_name = $_POST['soup_name'];
    $soup_characterization = $_POST['soup_characterization'];
    $soup_price = $_POST['soup_price'];
    soupAppend($connection, $soup_name, $soup_characterization, $soup_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function soupDeleteController($params)
{
    $connection = getConnection();

    soupDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleSoupController($params)
{
    $connection = getConnection();
    $soup = getSoupById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-soup",
        [
            "title" => $soup["soup_name"],
            "soup" => $soup,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleSoupEditController($params)
{
    $connection = getConnection();
    
    $soup_name = $_POST["soup_name"];
    $soup_characterization = $_POST["soup_characterization"];
    $soup_price = $_POST['soup_price'];

    $id = $params["id"];

    updateSoup($connection, $id, $soup_name ,$soup_characterization, $soup_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/soup$id",
        [
        ],
    ];
}

function hungarianDishesSubmitController()
{
    $connection = getConnection();

    $hungarianDishes_name = $_POST['hungarianDishes_name'];
    $hungarianDishes_characterization = $_POST['hungarianDishes_characterization'];
    $hungarianDishes_price = $_POST['hungarianDishes_price'];
    hungarianDishesAppend($connection, $hungarianDishes_name, $hungarianDishes_characterization, $hungarianDishes_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function hungarianDishesDeleteController($params)
{
    $connection = getConnection();

    hungarianDishesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleHungarianDishesController($params)
{
    $connection = getConnection();
    $hungarianDishes = getHungarianDishesById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-hungarianDishes",
        [
            "title" => $hungarianDishes["hungarianDishes_name"],
            "hungarianDishes" => $hungarianDishes,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleHungarianDishesEditController($params)
{
    $connection = getConnection();
    
    $hungarianDishes_name = $_POST["hungarianDishes_name"];
    $hungarianDishes_characterization = $_POST["hungarianDishes_characterization"];
    $hungarianDishes_price = $_POST['hungarianDishes_price'];

    $id = $params["id"];

    updateHungarianDishes($connection, $id, $hungarianDishes_name ,$hungarianDishes_characterization, $hungarianDishes_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/hungarianDishes$id",
        [
        ],
    ];
}

function mainCoursesSubmitController()
{
    $connection = getConnection();

    $mainCourses_name = $_POST['mainCourses_name'];
    $mainCourses_characterization = $_POST['mainCourses_characterization'];
    $mainCourses_price = $_POST['mainCourses_price'];
    mainCoursesAppend($connection, $mainCourses_name, $mainCourses_characterization, $mainCourses_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function mainCoursesDeleteController($params)
{
    $connection = getConnection();

    mainCoursesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleMainCoursesController($params)
{
    $connection = getConnection();
    $mainCourses = getMainCoursesById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-mainCourses",
        [
            "title" => $mainCourses["mainCourses_name"],
            "mainCourses" => $mainCourses,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleMainCoursesEditController($params)
{
    $connection = getConnection();
    
    $mainCourses_name = $_POST["mainCourses_name"];
    $mainCourses_characterization = $_POST["mainCourses_characterization"];
    $mainCourses_price = $_POST['mainCourses_price'];

    $id = $params["id"];

    updateMainCourses($connection, $id, $mainCourses_name ,$mainCourses_characterization, $mainCourses_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/mainCourses$id",
        [
        ],
    ];
}


function dessertsSubmitController()
{
    $connection = getConnection();

    $desserts_name = $_POST['desserts_name'];
    $desserts_characterization = $_POST['desserts_characterization'];
    $desserts_price = $_POST['desserts_price'];
    dessertsAppend($connection, $desserts_name, $desserts_characterization, $desserts_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function dessertsDeleteController($params)
{
    $connection = getConnection();

    dessertsDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleDessertsController($params)
{
    $connection = getConnection();
    $desserts = getDessertsById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-desserts",
        [
            "title" => $desserts["desserts_name"],
            "desserts" => $desserts,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleDessertsEditController($params)
{
    $connection = getConnection();
    
    $desserts_name = $_POST["desserts_name"];
    $desserts_characterization = $_POST["desserts_characterization"];
    $desserts_price = $_POST['desserts_price'];

    $id = $params["id"];

    updateDesserts($connection, $id, $desserts_name ,$desserts_characterization, $desserts_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/desserts$id",
        [
        ],
    ];
}

function garnishesSubmitController()
{
    $connection = getConnection();

    $garnishes_name = $_POST['garnishes_name'];
    $garnishes_characterization = $_POST['garnishes_characterization'];
    $garnishes_price = $_POST['garnishes_price'];
    garnishesAppend($connection, $garnishes_name, $garnishes_characterization, $garnishes_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function garnishesDeleteController($params)
{
    $connection = getConnection();

    garnishesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleGarnishesController($params)
{
    $connection = getConnection();
    $garnishes = getGarnishesById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-garnishes",
        [
            "title" => $garnishes["garnishes_name"],
            "garnishes" => $garnishes,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleGarnishesEditController($params)
{
    $connection = getConnection();
    
    $garnishes_name = $_POST["garnishes_name"];
    $garnishes_characterization = $_POST["garnishes_characterization"];
    $garnishes_price = $_POST['garnishes_price'];

    $id = $params["id"];

    updateGarnishes($connection, $id, $garnishes_name ,$garnishes_characterization, $garnishes_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/garnishes$id",
        [
        ],
    ];
}

function homemadePicklesSubmitController()
{
    $connection = getConnection();

    $homemadePickles_name = $_POST['homemadePickles_name'];
    $homemadePickles_characterization = $_POST['homemadePickles_characterization'];
    $homemadePickles_price = $_POST['homemadePickles_price'];
    homemadePicklesAppend($connection, $homemadePickles_name, $homemadePickles_characterization, $homemadePickles_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function homemadePicklesDeleteController($params)
{
    $connection = getConnection();

    homemadePicklesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleHomemadePicklesController($params)
{
    $connection = getConnection();
    $homemadePickles = getHomemadePicklesById($connection, $params["id"]);
    
    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-homemadePickles",
        [
            "title" => $homemadePickles["homemadePickles_name"],
            "homemadePickles" => $homemadePickles,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleHomemadePicklesEditController($params)
{
    $connection = getConnection();
    
    $homemadePickles_name = $_POST["homemadePickles_name"];
    $homemadePickles_characterization = $_POST["homemadePickles_characterization"];
    $homemadePickles_price = $_POST['homemadePickles_price'];

    $id = $params["id"];

    updateHomemadePickles($connection, $id, $homemadePickles_name ,$homemadePickles_characterization, $homemadePickles_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/homemadePickles$id",
        [
        ],
    ];
}

function drinksSubmitController()
{
    $connection = getConnection();

    $drinks_name = $_POST['drinks_name'];
    $drinks_characterization = $_POST['drinks_characterization'];
    $drinks_price = $_POST['drinks_price'];
    drinksAppend($connection, $drinks_name, $drinks_characterization, $drinks_price);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/menu-recording", [],
    ];

}

function drinksDeleteController($params)
{
    $connection = getConnection();

    drinksDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/menu-recording",
        [],
    ];

}

function singleDrinksController($params)
{
    $connection = getConnection();
    $drinks = getDrinksById($connection, $params["id"]);

    $foodUpdateFixed = array_key_exists("foodUpdateFixed", $_SESSION);
    unset($_SESSION["foodUpdateFixed"]);

    return [
        "single-drinks",
        [
            "title" => $drinks["drinks_name"],
            "drinks" => $drinks,
            "foodUpdateFixed" => $foodUpdateFixed
        ],
    ];
}

function singleDrinksEditController($params)
{
    $connection = getConnection();
    
    $drinks_name = $_POST["drinks_name"];
    $drinks_characterization = $_POST["drinks_characterization"];
    $drinks_price = $_POST['drinks_price'];

    $id = $params["id"];

    updateDrinks($connection, $id, $drinks_name ,$drinks_characterization, $drinks_price );

    $_SESSION["foodUpdateFixed"] = 1;

    return [
        "redirect:/drinks$id",
        [
        ],
    ];
}

function eventsRecordingController()
{
    $connection = getConnection();

    $getkaposMenu = kaposMenu($connection);
    $getfamilyMenu = familyMenu($connection);
    $getkassaiMenu = kassaiMenu($connection);
    $getzseleciMenu = zseleciMenu($connection);
    $getmeroMenu = meroMenu($connection);
    $getvegetarianMenu = vegetarianMenu($connection);
    $getclassicMenu = classicMenu($connection);
    $getweddingMenu = weddingMenu($connection);

    $foodFixed = array_key_exists("foodFixed", $_SESSION);
    unset($_SESSION["foodFixed"]);

    $dataDelete = array_key_exists("dataDelete", $_SESSION);
    unset($_SESSION["dataDelete"]);

    return [
        "events",
        [
            "title" => "Rendezvényi ételek rögzítése",
            "foodFixed" => $foodFixed,
            "getkaposMenu" => $getkaposMenu,
            "getfamilyMenu" => $getfamilyMenu,
            "getkassaiMenu" => $getkassaiMenu,
            "getzseleciMenu" => $getzseleciMenu,
            "getmeroMenu" => $getmeroMenu,
            "getvegetarianMenu" => $getvegetarianMenu,
            "getclassicMenu" => $getclassicMenu,
            "getweddingMenu" => $getweddingMenu,
            "dataDelete" => $dataDelete,
        ],
    ];

}

function kaposMenuSubmitController()
{
    $connection = getConnection();

    $kaposMenu_name = $_POST['kaposMenu_name'];
    $kaposMenu_characterization = $_POST['kaposMenu_characterization'];
    kaposMenuAppend($connection, $kaposMenu_name, $kaposMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function kaposMenuDeleteController($params)
{
    $connection = getConnection();

    kaposMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function familyMenuSubmitController()
{
    $connection = getConnection();

    $familyMenu_name = $_POST['familyMenu_name'];
    $familyMenu_characterization = $_POST['familyMenu_characterization'];
    familyMenuAppend($connection, $familyMenu_name, $familyMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function familyMenuDeleteController($params)
{
    $connection = getConnection();

    familyMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function kassaiMenuSubmitController()
{
    $connection = getConnection();

    $kassaiMenu_name = $_POST['kassaiMenu_name'];
    $kassaiMenu_characterization = $_POST['kassaiMenu_characterization'];
    kassaiMenuAppend($connection, $kassaiMenu_name, $kassaiMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function kassaiMenuDeleteController($params)
{
    $connection = getConnection();

    kassaiMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function zseleciMenuSubmitController()
{
    $connection = getConnection();

    $zseleciMenu_name = $_POST['zseleciMenu_name'];
    $zseleciMenu_characterization = $_POST['zseleciMenu_characterization'];
    zseleciMenuAppend($connection, $zseleciMenu_name, $zseleciMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function zseleciMenuDeleteController($params)
{
    $connection = getConnection();

    zseleciMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function meroMenuSubmitController()
{
    $connection = getConnection();

    $meroMenu_name = $_POST['meroMenu_name'];
    $meroMenu_characterization = $_POST['meroMenu_characterization'];
    meroMenuAppend($connection, $meroMenu_name, $meroMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function meroMenuDeleteController($params)
{
    $connection = getConnection();

    meroMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function vegetarianMenuSubmitController()
{
    $connection = getConnection();

    $vegetarianMenu_name = $_POST['vegetarianMenu_name'];
    $vegetarianMenu_characterization = $_POST['vegetarianMenu_characterization'];
    vegetarianMenuAppend($connection, $vegetarianMenu_name, $vegetarianMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function vegetarianMenuDeleteController($params)
{
    $connection = getConnection();

    vegetarianMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function classicMenuSubmitController()
{
    $connection = getConnection();

    $classicMenu_name = $_POST['classicMenu_name'];
    $classicMenu_characterization = $_POST['classicMenu_characterization'];
    classicMenuAppend($connection, $classicMenu_name, $classicMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function classicMenuDeleteController($params)
{
    $connection = getConnection();

    classicMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function weddingMenuSubmitController()
{
    $connection = getConnection();

    $weddingMenu_name = $_POST['weddingMenu_name'];
    $weddingMenu_characterization = $_POST['weddingMenu_characterization'];
    weddingMenuAppend($connection, $weddingMenu_name, $weddingMenu_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/events", [],
    ];

}

function weddingMenuDeleteController($params)
{
    $connection = getConnection();

    weddingMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/events",
        [],
    ];

}

function programmesRecordingController()
{
    $connection = getConnection();

    $getprogrammes = programmes($connection);

    $foodFixed = array_key_exists("foodFixed", $_SESSION);
    unset($_SESSION["foodFixed"]);

    $dataDelete = array_key_exists("dataDelete", $_SESSION);
    unset($_SESSION["dataDelete"]);

    return [
        "programmes",
        [
            "title" => "Közelgő események",
            "getprogrammes" => $getprogrammes,
            "foodFixed" => $foodFixed,
            "dataDelete" => $dataDelete,
        ],
    ];

}

function programmeSubmitController()
{
    $connection = getConnection();

    $programmes_name = $_POST['programmes_name'];
    $programmes_date = $_POST['programmes_date'];
    $programmes_time = $_POST['programmes_time'];
    $programmes_characterization = $_POST['programmes_characterization'];
    programmesAppend($connection, $programmes_name, $programmes_date, $programmes_time, $programmes_characterization);

    $_SESSION["foodFixed"] = 1;

    return [
        "redirect:/programmes", [],
    ];

}

function programmesDeleteController($params)
{
    $connection = getConnection();

    programmesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;

    return [
        "redirect:/programmes",
        [],
    ];

}

function notFoundController()
{
    return [
        "404", [
            "title" => "A keresett oldal nem található.",
        ],
    ];

}
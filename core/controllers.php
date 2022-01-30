<?php

function homeController()
{

    $connection = getConnection();
    $getmonday = monday($connection);
    $gettuesday = tuesday($connection);
    $getwednesday = wednesday($connection);
    $getthursday = thursday($connection);
    $getfriday = friday($connection);

    return [
        "home",
        [
            "title" => "Kezdőlap",
            "getmonday" => $getmonday,
            "gettuesday" => $gettuesday,
            "getwednesday" => $getwednesday,
            "getthursday" => $getthursday,
            "getfriday" => $getfriday
        ]
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

    return [
        "etlap",
        [
            "title" => "Étlap",
            "getsoup" => $getsoup,
            "gethungarianDishes" => $gethungarianDishes,
            "getmainCourses" => $getmainCourses,
            "getdesserts" => $getdesserts,
            "getgarnishes" => $getgarnishes,
            "gethomemadePickles" => $gethomemadePickles
        ]
    ];
    
}

function aboutController()
{

    return [
        "rolunk",
        [
            "title" => "Rólunk"
        ]
    ];
    
}

function kassaiVolgyController()
{

    return [
        "kassai-volgy",
        [
            "title" => "Rólunk"
        ]
    ];
    
}

function panzioController()
{

    return [
        "panzio",
        [
            "title" => "Panzió"
        ]
    ];
    
}


function contactController()
{

    return [
        "kapcsolat",
        [
            "title" => "Kapcsolat"
        ]
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
            "imgFixed"=> $imgFixed,
            "dataDelete" => $dataDelete
        ]
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


function adminController()
{

    return [
        "administ",
        [
            "title" => "Adminisztrációs felület"
        ]
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
            "dataDelete" => $dataDelete
        ]
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
        "redirect:/weekly-menu-recording", []
    ];
    
}

function mondayDeleteController($params)
{
    $connection = getConnection();
    
    mondayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/weekly-menu-recording",
        []
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
        "redirect:/weekly-menu-recording", []
    ];
    
}

function tuesdayDeleteController($params)
{
    $connection = getConnection();
    
    tuesdayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/weekly-menu-recording",
        []
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
        "redirect:/weekly-menu-recording", []
    ];
    
}

function wednesdayDeleteController($params)
{
    $connection = getConnection();
    
    wednesdayDelete($connection, $params["id"]);
        
    $_SESSION["foodFixed"] = 1;
    
    return [
        "redirect:/weekly-menu-recording",
        []
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
        "redirect:/weekly-menu-recording", []
    ];

}

function thursdayDeleteController($params)
{
    $connection = getConnection();
    
    thursdayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/weekly-menu-recording",
        []
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
        "redirect:/weekly-menu-recording", []
    ];
    
}

function fridayDeleteController($params)
{
    $connection = getConnection();
    
    fridayDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/weekly-menu-recording",
        []
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
            "foodFixed" => $foodFixed,
            "dataDelete" => $dataDelete
        ]
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
        "redirect:/menu-recording", []
    ];
    
}

function soupDeleteController($params)
{
    $connection = getConnection();
    
    soupDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/menu-recording",
        []
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
        "redirect:/menu-recording", []
    ];
    
}

function hungarianDishesDeleteController($params)
{
    $connection = getConnection();
    
    hungarianDishesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/menu-recording",
        []
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
        "redirect:/menu-recording", []
    ];
    
}

function mainCoursesDeleteController($params)
{
    $connection = getConnection();
    
    mainCoursesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/menu-recording",
        []
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
        "redirect:/menu-recording", []
    ];
    
}

function dessertsDeleteController($params)
{
    $connection = getConnection();
    
    dessertsDelete($connection, $params["id"]);
    
    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/menu-recording",
        []
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
        "redirect:/menu-recording", []
    ];
    
}

function garnishesDeleteController($params)
{
    $connection = getConnection();
    
    garnishesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/menu-recording",
        []
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
        "redirect:/menu-recording", []
    ];
    
}

function homemadePicklesDeleteController($params)
{
    $connection = getConnection();
    
    homemadePicklesDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/menu-recording",
        []
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
            "dataDelete" => $dataDelete 
        ]
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
        "redirect:/events", []
    ];
    
}

function kaposMenuDeleteController($params)
{
    $connection = getConnection();
    
    kaposMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function familyMenuDeleteController($params)
{
    $connection = getConnection();
    
    familyMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function kassaiMenuDeleteController($params)
{
    $connection = getConnection();
    
    kassaiMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function zseleciMenuDeleteController($params)
{
    $connection = getConnection();
    
    zseleciMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function meroMenuDeleteController($params)
{
    $connection = getConnection();
    
    meroMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function vegetarianMenuDeleteController($params)
{
    $connection = getConnection();
    
    vegetarianMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function classicMenuDeleteController($params)
{
    $connection = getConnection();
    
    classicMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
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
        "redirect:/events", []
    ];
    
}

function weddingMenuDeleteController($params)
{
    $connection = getConnection();
    
    weddingMenuDelete($connection, $params["id"]);

    $_SESSION["dataDelete"] = 1;
    
    return [
        "redirect:/events",
        []
    ];
    
}



function notFoundController()
{
    return [
        "404", [
            "title" => "A keresett oldal nem található."
        ]
    ];
    
}
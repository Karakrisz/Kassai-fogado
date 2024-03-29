<?php

function logMessage($level, $message)
{
    $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 2)[0];

    $file = fopen('app.log', "a");

    fwrite($file, "[$level] " . date(DATE_ISO8601) . " " . $backtrace["file"] . ":" . $backtrace["line"] .
        " $message" . PHP_EOL);
    fclose($file);
}

function errorPage()
{
    include "tamplates/error.php";
    die();
}

$routes = [];

function route($action, $callable, $method = 'GET')
{
    global $routes;
    $pattern = "%^$action$%";
    $routes[strtoupper($method)][$pattern] = $callable;
}

function dispatch($action, $notFound)
{
    global $routes;
    $method = $_SERVER["REQUEST_METHOD"];
    if (array_key_exists($method, $routes)) {
        foreach ($routes[$method] as $pattern => $callable) {
            if (preg_match($pattern, $action, $matches)) {
                return $callable($matches);
            }
        }
    }
    return $notFound();
}

function esc($string)
{
    echo htmlspecialchars($string);
}

function getConnection()
{
    global $config;
    $connection = mysqli_connect($config['DB_HOST'], $config['DB_USER'], $config['DB_PASS'], $config['DB_NAME']);
    if (!$connection) {
        logMessage('ERROR', 'Connection error:' . mysqli_connect_error());
        errorPage();
    }
    return $connection;
}

function loginUser($connection, $email, $password)
{
    if ($statement = mysqli_prepare($connection, 'SELECT name, password FROM users WHERE email = ?')) {
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        $record = mysqli_fetch_assoc($result);
        if ($record != null && password_verify($password, $record["password"])) {
            $statement = mysqli_prepare($connection, 'UPDATE users SET last_login = ? WHERE email = ?');
            mysqli_stmt_bind_param($statement, 'ss', date("Y.m.d H:i:s"), $email);
            mysqli_stmt_execute($statement);
            return $record;
        } else {
            return null;
        }
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}


function createUser()
{
    $loggedIn = array_key_exists("user", $_SESSION);
    return [
        "loggedIn" => $loggedIn,
        "name" => $loggedIn ? $_SESSION["user"]["name"] : null
    ];
}

function programmesAppend($connection, $programmes_name, $programmes_date, $programmes_time, $programmes_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO programmes (programmes_name,programmes_date,programmes_time,programmes_characterization) VALUES (?,?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'ssss', $programmes_name, $programmes_date, $programmes_time, $programmes_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function programmes($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from programmes')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function programmesDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM programmes WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function mondayAppend($connection, $monday_name, $monday_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO monday (monday_name,monday_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $monday_name, $monday_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function monday($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from monday')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function mondayDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM monday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getMondayById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM monday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateMonday($connection, $id, $monday_name, $monday_characterization)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE monday SET monday_name = ?, monday_characterization = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "ssi", $monday_name, $monday_characterization, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function tuesdayAppend($connection, $tuesday_name, $tuesday_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO tuesday (tuesday_name,tuesday_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $tuesday_name, $tuesday_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function tuesday($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from tuesday')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function tuesdayDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM tuesday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getTuesdayById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM tuesday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateTuesday($connection, $id, $tuesday_name, $tuesday_characterization)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE tuesday SET tuesday_name = ?, tuesday_characterization = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "ssi", $tuesday_name, $tuesday_characterization, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function wednesdayAppend($connection, $wednesday_name, $wednesday_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO wednesday (wednesday_name,wednesday_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $wednesday_name, $wednesday_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function wednesday($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from wednesday')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function wednesdayDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM wednesday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getWednesdayById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM wednesday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateWednesday($connection, $id, $wednesday_name, $wednesday_characterization)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE wednesday SET wednesday_name = ?, wednesday_characterization = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "ssi", $wednesday_name, $wednesday_characterization, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function thursdayAppend($connection, $thursday_name, $thursday_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO thursday (thursday_name,thursday_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $thursday_name, $thursday_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function thursday($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from thursday')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function thursdayDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM thursday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getThursdayById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM thursday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateThursday($connection, $id, $thursday_name, $thursday_characterization)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE thursday SET thursday_name = ?, thursday_characterization = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "ssi", $thursday_name, $thursday_characterization, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function fridayAppend($connection, $friday_name, $friday_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO friday (friday_name,friday_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $friday_name, $friday_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function friday($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from friday')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function fridayDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM friday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getFridayById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM friday WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateFriday($connection, $id, $friday_name, $friday_characterization)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE friday SET friday_name = ?, friday_characterization = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "ssi", $friday_name, $friday_characterization, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function soupAppend($connection, $soup_name, $soup_characterization, $soup_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO soup (soup_name,soup_characterization,soup_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $soup_name, $soup_characterization, $soup_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function soup($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from soup')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function soupDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM soup WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getSoupById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM soup WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateSoup($connection, $id, $soup_name, $soup_characterization, $soup_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE soup SET soup_name = ?, soup_characterization = ?, soup_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $soup_name, $soup_characterization, $soup_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function hungarianDishesAppend($connection, $hungarianDishes_name, $hungarianDishes_characterization, $hungarianDishes_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO hungarianDishes (hungarianDishes_name,hungarianDishes_characterization,hungarianDishes_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $hungarianDishes_name, $hungarianDishes_characterization, $hungarianDishes_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function hungarianDishes($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from hungarianDishes')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function hungarianDishesDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM hungarianDishes WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getHungarianDishesById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM hungarianDishes WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateHungarianDishes($connection, $id, $hungarianDishes_name, $hungarianDishes_characterization, $hungarianDishes_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE hungarianDishes SET hungarianDishes_name = ?, hungarianDishes_characterization = ?, hungarianDishes_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $hungarianDishes_name, $hungarianDishes_characterization, $hungarianDishes_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function mainCoursesAppend($connection, $mainCourses_name, $mainCourses_characterization, $mainCourses_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO mainCourses (mainCourses_name,mainCourses_characterization,mainCourses_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $mainCourses_name, $mainCourses_characterization, $mainCourses_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function mainCourses($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from mainCourses')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function mainCoursesDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM mainCourses WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getMainCoursesById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM mainCourses WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateMainCourses($connection, $id, $mainCourses_name, $mainCourses_characterization, $mainCourses_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE mainCourses SET mainCourses_name = ?, mainCourses_characterization = ?, mainCourses_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $mainCourses_name, $mainCourses_characterization, $mainCourses_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}


function dessertsAppend($connection, $desserts_name, $desserts_characterization, $desserts_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO desserts (desserts_name,desserts_characterization,desserts_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $desserts_name, $desserts_characterization, $desserts_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function desserts($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from desserts')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function dessertsDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM desserts WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getDessertsById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM desserts WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateDesserts($connection, $id, $desserts_name, $desserts_characterization, $desserts_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE desserts SET desserts_name = ?, desserts_characterization = ?, desserts_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $desserts_name, $desserts_characterization, $desserts_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}


function garnishesAppend($connection, $garnishes_name, $garnishes_characterization, $garnishes_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO garnishes (garnishes_name,garnishes_characterization,garnishes_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $garnishes_name, $garnishes_characterization, $garnishes_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function garnishes($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from garnishes')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function garnishesDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM garnishes WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getGarnishesById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM garnishes WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateGarnishes($connection, $id, $garnishes_name, $garnishes_characterization, $garnishes_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE garnishes SET garnishes_name = ?, garnishes_characterization = ?, garnishes_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $garnishes_name, $garnishes_characterization, $garnishes_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function homemadePicklesAppend($connection, $homemadePickles_name, $homemadePickles_characterization, $homemadePickles_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO homemadePickles (homemadePickles_name,homemadePickles_characterization,homemadePickles_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $homemadePickles_name, $homemadePickles_characterization, $homemadePickles_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function homemadePickles($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from homemadePickles')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function homemadePicklesDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM homemadePickles WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getHomemadePicklesById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM homemadePickles WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateHomemadePickles($connection, $id, $homemadePickles_name, $homemadePickles_characterization, $homemadePickles_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE homemadePickles SET homemadePickles_name = ?, homemadePickles_characterization = ?, homemadePickles_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $homemadePickles_name, $homemadePickles_characterization, $homemadePickles_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function drinksAppend($connection, $drinks_name, $drinks_characterization, $drinks_price)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO drinks (drinks_name,drinks_characterization,drinks_price) VALUES (?,?,?)')) {
        mysqli_stmt_bind_param($statement, 'sss', $drinks_name, $drinks_characterization, $drinks_price);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function drinks($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from drinks')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function drinksDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM drinks WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function getDrinksById($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * FROM drinks WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "i", $id);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_assoc($result);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function updateDrinks($connection, $id, $drinks_name, $drinks_characterization, $drinks_price)
{

    if ($statement = mysqli_prepare($connection, 'UPDATE drinks SET drinks_name = ?, drinks_characterization = ?, drinks_price = ? WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, "sssi", $drinks_name, $drinks_characterization, $drinks_price, $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function kaposMenuAppend($connection, $kaposMenu_name, $kaposMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO kaposMenu (kaposMenu_name,kaposMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $kaposMenu_name, $kaposMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function kaposMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from kaposMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function kaposMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM kaposMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function familyMenuAppend($connection, $familyMenu_name, $familyMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO familyMenu (familyMenu_name,familyMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $familyMenu_name, $familyMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function familyMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from familyMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function familyMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM familyMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function kassaiMenuAppend($connection, $kassaiMenu_name, $kassaiMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO kassaiMenu (kassaiMenu_name,kassaiMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $kassaiMenu_name, $kassaiMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function kassaiMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from kassaiMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function kassaiMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM kassaiMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function zseleciMenuAppend($connection, $zseleciMenu_name, $zseleciMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO zseleciMenu (zseleciMenu_name,zseleciMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $zseleciMenu_name, $zseleciMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function zseleciMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from zseleciMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function zseleciMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM zseleciMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function meroMenuAppend($connection, $meroMenu_name, $meroMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO meroMenu (meroMenu_name,meroMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $meroMenu_name, $meroMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function meroMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from meroMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function meroMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM meroMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function vegetarianMenuAppend($connection, $vegetarianMenu_name, $vegetarianMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO vegetarianMenu (vegetarianMenu_name,vegetarianMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $vegetarianMenu_name, $vegetarianMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function vegetarianMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from vegetarianMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function vegetarianMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM vegetarianMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function classicMenuAppend($connection, $classicMenu_name, $classicMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO classicMenu (classicMenu_name,classicMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $classicMenu_name, $classicMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function classicMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from classicMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function classicMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM classicMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function weddingMenuAppend($connection, $weddingMenu_name, $weddingMenu_characterization)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO weddingMenu (weddingMenu_name,weddingMenu_characterization) VALUES (?,?)')) {
        mysqli_stmt_bind_param($statement, 'ss', $weddingMenu_name, $weddingMenu_characterization);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function weddingMenu($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT * from weddingMenu')) {
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        logMessage('ERROR', 'Query error: ' . mysqli_error($connection));
        errorPage();
    }
}

function weddingMenuDelete($connection, $id)
{
    if ($statement = mysqli_prepare($connection, 'DELETE FROM weddingMenu WHERE id = ?')) {
        mysqli_stmt_bind_param($statement, 'i', $id);
        mysqli_stmt_execute($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function imageAppend($connection, $image)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO image (image) VALUES (?)')) {
        $null = null;
        mysqli_stmt_bind_param($statement, 'b', $null);
        mysqli_stmt_send_long_data($statement, 0, file_get_contents($image));
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function retrieveAllimages($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT id, image  FROM image')) {
        $null = null;
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement, $id, $image);
        $images = [];
        while (mysqli_stmt_fetch($statement)) {
            $images[] = ["id" => $id, "image" => $image];
        }
        mysqli_stmt_close($statement);
        return $images;
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}


function PanzioimageAppend($connection, $image)
{
    if ($statement = mysqli_prepare($connection, 'INSERT INTO panzio_image (image) VALUES (?)')) {
        $null = null;
        mysqli_stmt_bind_param($statement, 'b', $null);
        mysqli_stmt_send_long_data($statement, 0, file_get_contents($image));
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}

function PanzioretrieveAllimages($connection)
{
    if ($statement = mysqli_prepare($connection, 'SELECT id, image  FROM panzio_image')) {
        $null = null;
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        mysqli_stmt_bind_result($statement, $id, $image);
        $images = [];
        while (mysqli_stmt_fetch($statement)) {
            $images[] = ["id" => $id, "image" => $image];
        }
        mysqli_stmt_close($statement);
        return $images;
    } else {
        logMessage('ERROR', 'Query error:' . mysqli_error($connection));
        errorPage();
    }
}
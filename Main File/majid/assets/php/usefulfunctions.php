<?php
// // SampleFunction(); // GetQueryData, CleanInput
// // $test_variable // $data, $locationNamem $isBool (boolean), $ID for Ids or UserID
// // password hashing for security
// $pass_hashed = password_hash($pass, PASSWORD_BCRYPT);
// // and for login
// if ($count == 1 && password_verify($pass, $row["password"])) 


$filesAllowed = ["png", "jpg", "jpeg", "webp", "jfif"];
function debug_to_console($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
        echo "<script>console.log('$output');</script>";
    }
    elseif (is_string($output)) echo '<script>console.log("'.$output.'");</script>';
	else echo "<script>console.log('$output');</script>";
}

function formatted_dump($obj, $print_to_console=FALSE) {
	if ($print_to_console) debug_to_console($obj);
	else echo "<pre>". var_dump($obj) ."</pre>";
}

function CleanInput($string) { // sanitize user input to prevent sql injection
    $new_string = trim($string);
    $new_string = strip_tags($new_string);
    $new_string = htmlspecialchars($new_string);
    return $new_string;
}

function CreateSelectDropDown($sql, $default = NULL, $get_column_type = FALSE) {
    global $db;
    $select_string = "<li>Status not available</li>";
    if ($get_column_type) {
        $result = $db->query($sql)->fetchArray();
        #echo gettype($result["Type"]);
        if (count($result) > 0 ) $option_array = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $result["Type"]));
        if (isset($option_array)) {
            $select_string = "";
            foreach($option_array as $option) {
                if ($option == $default) $select_string .= "<option selected value='{$default}'>".ucfirst($default)."</option>";
                else $select_string .= "<option value='$option'>".ucfirst($option)."</option>";
            }
        }
    } else {
        $rows = $db->query($sql)->fetchAll();
        $select_string = "";
        foreach ($rows as $row) {
            $select_string .= "<option value='".(int)$row["ID"]."'>".$row["name"]."</option>";
        }
    }

    return $select_string;
}


function GetQueryData($rows) {
    $data = new stdClass();
    $data->head = array();
    $data->body = array();
    $first = TRUE; // fill head only once
    $i = 0; // make sure we are on the right row
    foreach ($rows as $row) {
        $data->body[$i] = array();
        foreach ($row as $key => $value) {
            if ($first) $data->head[] = $key;
            $data->body[$i][$key] = $value;
        }
        $i++;
        $first = FALSE;
    }
    return $data;
}

function GetUserID() {
	if (isset($_SESSION['admin'])) return $_SESSION['admin'];
	else if (isset($_SESSION['user'])) return $_SESSION['user'];
	else if (isset($_SESSION['seller'])) return $_SESSION['seller'];
	else if (isset($_SESSION['delivery'])) return $_SESSION['delivery'];
	return NULL;
}


// TODO
function ConvertSQLToHTMLType($rows) {
    return FALSE;
}


function InRange($x, $lo, $hi) { return ($x >= $lo) && ($x <= $hi); }

function ValidatePhoneNumber($phone) {
    // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Remove "-" and "/" from number
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    $phone_to_check = str_replace("/", "", $filtered_phone_number);
    
    // Check the lenght of number
    if (InRange(strlen($phone_to_check), 10, 15)) return TRUE;
    return FALSE;
}

function ValidateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}


?>
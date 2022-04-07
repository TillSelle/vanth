<?php
//require_once "assets\common.php";
session_start();
$passwd = "";

function testInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

function IsANumber($input) {
    if (is_numeric($input)) {
        return true;
    } else {
        return false;
    }
}

function NotEmpty($input) {
    if (empty($input)) {
        return false;
    } else {
        return true;
    }
}

function P($param) {
    return $_POST[$param];
}

function Get($row) {
    if ($row) {
        return $row;
    }
    else {
        return array("error" => "No company with that id!");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["password"])) {
        $p = $_POST["password"];
        unset($_POST["password"]);
        if ($p == $passwd) {
            $_SESSION["Route"] = $p;
        }
    }
    
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/main.js"></script>
    <title>Manage trackers!</title>
</head>
<body>
    <div class="c">
        <?php 
        if (isset($_POST["view"]) && isset($_POST["id"]) && isset($_SESSION["Route"]) && $_SESSION["Route"] == $passwd) {
            unset($_POST["view"]);
            $id = testInput($_POST["id"]);
            unset($_POST["id"]);
            if (NotEmpty($id) && IsANumber($id)) {
                ?>
                <p id="returntextarea" class="returnarea"name = "_returnarea"><?php 
                include_once 'connector/mysqli.php';
                $sql = "SELECT * FROM emailtrackingdb WHERE id = " . $id . "";
                $result = mysqli_query($connection, $sql);
                $t = true;
                while ($row = mysqli_fetch_assoc($result)) {
                    if (!isset($row)) {
                        $t = false;
                    }
                    else {
                        $t = false;
                        echo "<br>ID:" . $row["id"] . "<br>Name: " . $row["company_name"] . "<br>IP: " . $row["ip"] . "<br>User Agent: " . $row["user_agent"] . "<br>Timestemp: " . $row["timestamp"] . "<br>";
                    }
                }
                if ($t) {
                    echo "Nothing Found!";
                }
                ?></p><?php
                }
            }
            
        }
    
        if (isset($_POST["delete"]) && isset($_POST["id"]) && isset($_SESSION["Route"]) && $_SESSION["Route"] == $passwd) {
            unset($_POST["delete"]);
            $id = testInput($_POST["id"]);
            unset($_POST["id"]);
            if (NotEmpty($id) && IsANumber($id)) {
                ?>
                <p id="returntextarea" class="returnarea"name = "_returnarea"><?php 
                include_once 'connector/mysqli.php';
                $sql = "DELETE FROM emailtrackingdb WHERE id = " . $id . "";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    echo "Successfully deleted!";
                } else {
                    echo "Error deleting!";
                }
                
            }
            ?></p><?php
        }

        if (isset($_POST["new"]) && isset($_POST["ID"]) && isset($_POST["name"]) && isset($_SESSION["Route"]) && $_SESSION["Route"] == $passwd) {
            $id = testInput($_POST["ID"]);
            unset($_POST["ID"]);
            $name = testInput($_POST["name"]);
            unset($_POST["name"]);
            if (NotEmpty($id) && IsANumber($id) && NotEmpty($name)) { 
                ?>
                <p id="returntextarea" class="returnarea"name = "_returnarea"><?php
                include_once 'connector/mysqli.php';
                $sql = "INSERT INTO companies (id, company_name) VALUES (" . $id . ", '" . $name . "')";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    echo "Successfully added!<br>Add it through following html code!<br><input class=\"returnarea\" type=\"text\" value='&lt;img src=\"https://vanth.xyz/Tracking/email/pixel.php?src=" . $id . "\"/&gt;' id=\"linkinput\"><br><button onclick=\"copyToClipboard('linkinput')\" class=\"button\">Copy to Clipboard</button>";
                } else {
                    echo "Error adding!";
                }
            }
            ?></p><?php
        }

if (isset($_SESSION["Route"]) || isset($p)) {
    if ($_SESSION["Route"] == $passwd || $p == $passwd) {
        ?>
        <h1>Welcome to the tracker management page!</h1>
        <p>Here you can delete, view and manage trackers!</p>
        <div class="flexcontainer">
            <form method="post" action="<?php echo htmlspecialchars(($_SERVER["PHP_SELF"])) ?>">
                <input type="text" name="id" placeholder="Tracker ID"/>
                <input type="submit" name="view" value="View" class="button" />
                <input type="submit" name="delete" value="Delete" class="button"/>
            </form>
        </div>
        <div class="flexcontainer">
            <form method="post" action="<?php echo htmlspecialchars(($_SERVER["PHP_SELF"])) ?>">
                <input type="text" name="ID" placeholder="Tracker ID"/>
                <input type="text" name="name" placeholder="Tacking Target Name"/>
                <input type="submit" name="new" value="New" class="button"/>
            </form>
        </div>
        <?php
    } else {
        echo "<h1>You are not allowed to access this page!</h1>";
    }
} else {
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <input type="text" name="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>
<?php
}
?>
    </div>
    <script src="assets/auto_grow.js"></script>
</body>
</html>

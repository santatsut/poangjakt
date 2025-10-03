<script src="/index.js"></script>

<?php
include_once 'AppHandler.php';
if (!App::$IsLoggedIn) {
    header('Location: adminLogin.php');
    exit;
}

// Handle marking tasks as done
include_once 'adminHandler.php';

// Handle adding tasks
if (isset($_POST['addTask'])) {
    include_once 'addTask.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Poäng Jakt Admin</title>
</head>
<nav id="bar"></nav>

<body>
    
    <link rel="stylesheet" href="AdminPage.css">
    <section><aside id="Navigator">
        <ul Folders>
            <li selected="true" class="NavigatorFolderItems"><img src="../../images/taskAdd.svg" alt=""></li>
            <li selected="false" class="NavigatorFolderItems"><img src="../../images/taskRemove.svg" alt=""></li>
            <li selected="false" class="NavigatorFolderItems"><img src="../../images/member.svg" alt=""></li>
            <li selected="false" class="NavigatorFolderItems"><img src="../../images/" alt=""></li>
        </ul>
    </aside>

    <div id="content">
        <div id="bottomSide">
            <form method="post">
                <input type="text" name="Uppgift" placeholder="Uppgift" required>
                <input type="text" name="Poäng" placeholder="Poäng" required>
                <input type="text" name="Lag" placeholder="Lag" required>
                <input type="submit" name="addTask" value="Lägg Till Uppgift">
            </form>

            <?php include_once 'Table.php'; ?>
        </div>
    </div></section>
    
    <script>
        loadForm();

        document.addEventListener("DOMContentLoaded",()=>{
            const Folders = document.querySelectorAll(".NavigatorFolderItems")
            Folders.forEach(element => {
                element.addEventListener("click",(e)=>{
                    Folders.forEach(el=>{
                        if (el.getAttribute("selected") === "true") {
                            el.setAttribute("selected",false)
                        }
                    })
                        element.setAttribute("selected",true)
                        
                })
            });
        })


    </script>
</body>

</html>
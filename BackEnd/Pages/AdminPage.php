<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';
if (!App::$IsLoggedIn) {
    header('Location:' . App::$_Redirect['PAGES'] . "adminLogin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/AdminPage.css">
    <title>Poäng Jakt Admin</title>
</head>

<body>
    <nav id="bar"></nav>

        <aside id="Navigator">
            <ul id="Folders">
                <li class="NavigatorFolderItems" data-page="AddTask">
                    <img src="../../images/taskAdd.svg" alt="Add Task">
                </li>
                <li class="NavigatorFolderItems" data-page="RemoveTask">
                    <img src="../../images/taskRemove.svg" alt="Remove Task">
                </li>
                <li class="NavigatorFolderItems" data-page="Members">
                    <img src="../../images/member.svg" alt="Members">
                </li>
                <li class="NavigatorFolderItems" data-page="Other">
                    <img src="../../images/placeholder.svg" alt="Other">
                </li>
            </ul>
        </aside>

 
           <div id="content">
            <div id="bottomSide">
                <iframe scrolling="no" id="contentFrame" src="" frameborder="0"></iframe>
            </div>
        </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const folders = document.querySelectorAll(".NavigatorFolderItems");
            const iframe = document.getElementById("contentFrame");

            folders.forEach(folder => {
                folder.addEventListener("click", () => {
                    // Remove old selection
                    folders.forEach(el => el.removeAttribute("selected"));
                    folder.setAttribute("selected", "true");

                    // Start fade-out
                    iframe.classList.add("hidden");

                    // Wait for fade-out, then change src and fade-in
                    setTimeout(() => {
                        const page = folder.getAttribute("data-page");
                        iframe.src = "../AdminPages/" + page + ".php";

                        // Fade-in after content reloads
                        iframe.onload = () => {
                            iframe.classList.remove("hidden");
                        };
                    }, 300); // match with transition time
                });
            });
        });
    </script>
</body>

</html>
<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/BackEnd/Handlers/AppHandler.php';

?>
<html>

<head>
    <link rel="stylesheet" href="RemoveTask.css">
</head>

<body>
    <div id="RemoveTaskContainer">
        <?php include_once App::$_Redirect['FUNCTIONS'].'Table.php'; ?>
        <script>
            const td = document.querySelectorAll('.FormTd');
            const th = document.querySelectorAll('.FormTh');
            th.forEach(element => {
                element.style.display = 'none';
            });

            td.forEach(element => {
                element.style.display = 'none';
            });
        </script>
        <form action="" method="post">
            <input type="text" name="TaskID" placeholder="ID" required>
            <button id="RemoveTask" type="submit" name="RemoveTaskSubmit">Remove Task</button>
        </form>

        <?php
        if (isset($_POST['RemoveTaskSubmit'])) {
            $List = DB::getData();

            // Ensure key 1 exists
            if (isset($List[1]) && is_array($List[1])) {
                foreach ($List[1] as $key => $task) {
                    if ($key === (int) $_POST['TaskID']) {
                        unset($List[1][$key]);
                        break; // remove only the first match
                    }
                }

                DB::WriteData($List);
            }

            // Redirect to avoid form resubmission
            header('Location: '.$_SERVER['PHP_SELF']);
            exit;
        }
?>
    </div>
</body>

</html>
<?php require_once 'app/views/templates/header.php' ?>

<?php
    function check_completed($reminderObj)
    {
        return(is_null($reminderObj["completed_at"]) == 0);
    }
    
    function check_not_completed($reminderObj)
    {
        return(is_null($reminderObj["completed_at"]) == 1);
    }
?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row pt-3">
            <div class="col-lg-12">
                <h1>Reminders</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
                <h5>Outstanding reminders</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Created</th>
                            <th style="width: 1%"></th>
                            <th style="width: 1%"></th>
                            <th style="width: 1%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach (array_filter($data['reminders'],"check_not_completed") as $reminder) {
                               
                                echo "<tr>";
                                echo "<td>" . $reminder['id'] . "</td>";
                                echo "<td>" . $reminder['subject'] . "</td>";
                                echo "<td>" . $reminder['created_at'] . "</td>";
                                
                                echo "<td>";
                                     echo "<form action='/reminders/edit' method='post'>";
                                    echo "<button class='btn btn-sm btn-outline-primary' type='submit' name='reminder_id' value='" . $reminder['id']  ."'>Edit</button>";
                                    echo "</form>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<form action='/reminders/delete' method='post'>";
                                    echo "<button class='btn btn-sm btn-outline-danger' type='submit' name='reminder_id' value='" . $reminder['id']  ."'>x</button>";
                                    echo "</form>";
                                echo "</td>";

                                echo "<td>";
                                    echo "<form action='/reminders/mark_complete' method='post'>";
                                    echo "<button class='btn btn-sm btn-outline-success' type='submit' name='reminder_id' value='" . $reminder['id']  ."'>&check;</button>";
                                    echo "</form>";
                                echo "</td>";
                                
                                echo "</tr>";
                                
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
                <h5>Completed Tasks</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Created</th>
                            <th>Completed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach (array_filter($data['reminders'],"check_completed") as $reminder) {
    
                                echo "<tr>";
                                echo "<td>" . $reminder['id'] . "</td>";
                                echo "<td>" . $reminder['subject'] . "</td>";
                                echo "<td>" . $reminder['created_at'] . "</td>";
                                echo "<td>" . $reminder['completed_at'] . "</td>";
    
                            }
                        ?>
                    </tbody>
                </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 py-3">
            <a href="/createreminder">
                <button class="btn btn-primary">New reminder</button>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-5 text-end">
            <p> <a href="/logout">Click here to logout</a></p>
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>

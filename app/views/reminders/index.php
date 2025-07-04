<?php require_once 'app/views/templates/header.php' ?>
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
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Created</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data['reminders'] as $reminder) {
                               
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
                                
                                echo "</tr>";
                                
                            }
                        ?>
                    </tbody>
                </table>
                <a href="/createreminder">
                    <button class="btn btn-primary">New reminder</button>
                </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mt-5">
            <p> <a href="/logout">Click here to logout</a></p>
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>

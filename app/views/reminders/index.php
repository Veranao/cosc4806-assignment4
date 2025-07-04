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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($data['reminders'] as $reminder) {
                                echo "<form action='/reminders/delete' method='post'>";
                                echo "<tr><td>" . $reminder['id'] . "</td><td>" . $reminder['subject'] . "</td><td>" . $reminder['created_at'] . "<td><button class='btn btn-sm btn-outline-danger' type='submit' name='reminder_id' value='" . $reminder['id']  ."'>x</button></td></tr>";
                                echo "</form>";
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

<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row pt-3">
            <div class="col-lg-12">
                <h1>Create new reminder</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
               <form action="/createreminder/create" method="post">
                   <input type="submit" name="subject"  />
                   <button class="btn btn-primary">Create reminder</button>
               </form>
        </div>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>

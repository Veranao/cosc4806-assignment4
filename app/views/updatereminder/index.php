<?php require_once 'app/views/templates/header.php' ?>
<div class="container py-3">
    <div class="page-header" id="banner">
        <div class="row pt-3">
            <div class="col-lg-12">
                <h1>Update reminder</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
               <form action="/createreminder/create" method="post">
                   <label for="subject">Subject</label>
                   <input type="text" class="form-control" name="subject"  />
                   <button class="btn btn-primary mt-2" type="submit">Save</button>
               </form>
        </div>
    </div>
</div>

<?php require_once 'app/views/templates/footer.php' ?>

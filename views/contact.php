<form action="" method="post">
    <h1>contact us</h1>
    <div class="form-group">
        <label>subject</label>
        <input type="text" name="subject" class="form-control">
    </div>

    <div class="form-group">
        <label>email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">submit</button>

</form>

<?php if(isset($subject)): ?>
<p>the submited data is : 
    1- subject --> <?= $subject ?>
    2- email   --> <?= $email   ?>
</p>
<?php endif ?>
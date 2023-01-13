<?php include_once 'include/header.php'; ?>




<div class="notice_area">
    <h2>Notice Panel</h2>
    <form action="" method="post">
        <div class="notice_form">
            <label for="notice">Give notice title : </label> <br>
            <input type="text" name="notice" id="notice">
        </div>

        <div class="notice_form">
            <label for="noticeDescription">Give notice description : </label> <br>
            <input type="text" name="noticeDescription" id="noticeDescription">
        </div>

        <div class="notice_form">
            <label for="submit">Click to submit : </label> <br>
            <input type="submit" name="submit" id="submit" value="Submit">
        </div>
    </form>
</div>








<?php include_once 'include/footer.php'; ?>
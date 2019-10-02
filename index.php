<?php
require_once ('src/database.php');
require_once ('src/form.php');
include('include/header.html');
?>
    <main>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label>
                <input type="text" name="firstName" maxlength="60" autocomplete="on" placeholder="first name *">
                <?= $formErrors['firstName'] ?>
            </label>
            <label>
                <input type="text" name="lastName"maxlength="60" autocomplete="on" placeholder="last name *">
                <?= $formErrors['lastName'] ?>
            </label>
            <label>
                <input type="email" name="email" maxlength="60" autocomplete="on" placeholder="@ *">
                <?= $formErrors['email'] ?>
            </label>
            <label>
                <input type="email" name="emailConfirm" maxlength="60" autocomplete="on" placeholder="Confirm your email *">
                <?= $formErrors['emailConfirm'] ?>
            </label>
            <label class="selectLabel">
                <select name="subject">
                    <option value="" selected >Select a subject *</option>
                    <option value="about">About the website</option>
                    <option value="interview">I would like an appointment</option>
                </select>
                <?= $formErrors['subject'] ?>
            </label>
            <label class="messageLabel">
                <textarea name="content" placeholder="Your message here *"></textarea>
                <small class="mandatory">* mandatory fields</small>
                <?= $formErrors['content'] ?>
            </label>
            <?= $youDidItJoe ?>
            <input name="submit" type="submit" value="send">
        </form>
    </main>

<?php
include('include/footer.html');
?>
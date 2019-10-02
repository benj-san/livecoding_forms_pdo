<?php
    include('include/header.html');
?>
    <main>
        <form action="form.php" method="post">
            <label>
                <input type="text" name="firstName" required maxlength="60" autocomplete="on" placeholder="first name *">
            </label>
            <label>
                <input type="text" name="lastName" required maxlength="60" autocomplete="on" placeholder="last name *">
            </label>
            <label>
                <input type="tel" name="phoneNumber" maxlength="10" autocomplete="on" placeholder="Phone">
            </label>
            <label>
                <input type="email" name="email" required maxlength="60" autocomplete="on" placeholder="@ *">
            </label>
            <label class="selectLabel">
                <select name="subject">
                    <option disabled value="">Select a subject *</option>
                    <option value="about">About the website</option>
                    <option value="interview">I would like an appointment</option>
                </select>
            </label>
            <label class="messageLabel">
                <textarea name="content" required placeholder="Your message here *"></textarea>
                <small>* mandatory fields</small>
            </label>
            <input type="submit" value="send">
        </form>
    </main>

<?php
include('include/footer.html');
?>
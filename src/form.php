<?php

// Init my errors
$formErrors = [
    'firstName' => '',
    'lastName' => '',
    'email' => '',
    'emailConfirm' => '',
    'subject' => '',
    'content' => ''
];

// Init a validation answer
$validateSentence = '';

//Init a validation --> false at the beginning
$validationForm = false;

// If I submit my form
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //We affect all the POST datas we get with the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $emailConfirm = $_POST['emailConfirm'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];


    // We test the firstName
    if( empty( $firstName ) ){
      $formErrors['firstName'] = '<small>please enter your first name</small>';
    } else {
        $formErrors['firstName'] = '';
    }

    // We test the lastName
    if( empty( $lastName ) ){
        $formErrors['lastName'] = '<small>please enter your last name</small>';
    } else {
        $formErrors['lastName'] = '';
    }

    // We test the email
    switch($email){
        case null :
            $formErrors['email'] = '<small>please enter your email</small>';
            break;
        case !filter_var($email, FILTER_VALIDATE_EMAIL) :
            $formErrors['email'] = '<small>Please enter a valid email</small>';
            break;
        default :
            $formErrors['email'] = '';
            break;
    }

    // We test the email confirmation
    switch($emailConfirm){
        case null :
            $formErrors['emailConfirm'] = '<small>please confirm your email</small>';
            break;
        case $emailConfirm != $email :
            $formErrors['emailConfirm'] = '<small>Email confirmation is not valid</small>';
            break;
        default :
            $formErrors['emailConfirm'] = '';
            break;
    }

    //We test the subject
    if( empty( $subject ) || $subject == '' ){
        $formErrors['subject'] = '<small>please select a subject</small>';
    } else {
        $formErrors['subject'] = '';
    }

    //We test the content
    if( empty( $content ) ){
        $formErrors['content'] = '<small>Could you please leave us a message</small>';
    } else {
        $formErrors['content'] = '';
    }

    //If the validation form pass all the errors
    if( '' == $formErrors['firstName'] && '' == $formErrors['lastName'] && '' == $formErrors['email'] && '' == $formErrors['emailConfirm'] && '' == $formErrors['subject'] && '' == $formErrors['content']){
        $validationForm = true;
    }

    //Once the form validation is true
    if($validationForm == true){

        //We insert all the values in the database
        $insertForm = 'INSERT INTO message (firstname, lastname, email, `subject`, content) VALUES (:firstname, :lastname, :email, :subject, :content)';
        //$dbh->exec($insertForm);

        //Or we prepare it ! TODO Put the placeholders instead of the concatained values
        $pushMe = $dbh->prepare($insertForm);
        //And we execute the program
        $pushMe->execute([
            ':firstname' => $firstName,
            ':lastname' => $lastName,
            ':email' => $email,
            ':subject' => $subject,
            ':content' => $content
        ]);

        $validateSentence = '<div>Thank you for your feedback, we\'ll answer it very quickly !</div>';
    }

}

//Test and debug $formErrors
/*var_dump($formErrors);
die;*/

//Test and debugs $posts
/*echo "Firstname : $firstName, Lastname : $lastName, Email : $email, EmailConfirm : $emailConfirm, Subject : $subject, Content : $content";
die;*/





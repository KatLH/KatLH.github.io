<?php
include '../sql/db_connect.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo '<form method="post" action="">
        First Name: <input type="text" name="firstname" />
        Last Name: <input type="text" name="lastname">
        E-mail: <input type="email" name="email">
        <input type="submit" value="Register" />
     </form>';
}
else
{
    $errors = array();

    if(isset($_POST['firstname']))
    {
        if(!ctype_alnum($_POST['firstname']))
        {
            $errors[] = 'First name can only contain letters and digits.';
        }
        if(strlen($_POST['lastname']) > 30)
        {
            $errors[] = 'First name cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'field must not be empty.';
    }


    if(isset($_POST['lastname']))
    {
        if(!ctype_alnum($_POST['lastname']))
        {
            $errors[] = 'Last name can only contain letters and digits.';
        }
        if(strlen($_POST['lastname']) > 30)
        {
            $errors[] = 'Last name cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'field must not be empty.';
    }

    if(!empty($errors))
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value)
        {
            echo '<li>' . $value . '</li>';
        }
        echo '</ul>';
    }

    else
    {
        $first = $_POST['firstname'];
        $last = $_POST['lastname'];
        $email = $_POST['email'];

        $sql = "INSERT INTO mailing_list (firstname, lastname, email)
                VALUES('$first','$last','$email')";

        $result = mysqli_query($connection, $sql);
        if(!$result)
        {

            echo 'Something went wrong while registering. Please try again later.';
            //echo mysqli_error($connection);
        }
        else
        {
            echo 'Successfully registered';
        }
    }
}

?>

<?php
session_start();

if (isset($_POST['email']))
{
    $register_valid = true;
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    if ((strlen($nick)<3) || (strlen($nick)>20))
    {
      $register_valid=false;
      $_SESSION['Sign_Nick_Err']="Nick's length must be between 2 and 21 characters!";
    }

    if (ctype_alnum($nick)==false)
    {
      $register_valid=false;
      $_SESSION['Sign_Nick_Err']="Nick can not contain special characters";
    }


    if (strlen($password1)<8)
    {
      $register_valid=false;
      $_SESSION['Sign_password_Err']="Password must be at least 8 characters long!";
    }

    if ($password1!=$password2)
    {
      $register_valid=false;
      $_SESSION['Sign_password_Err']="Given passwords are not the same!";
    }

    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    $secret = "6LdReFcUAAAAAFHgP9xmhcqASb6ugAOykoyWnhvP";
    $check_captcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $answer = json_decode($check_captcha);

    if ($answer->success==false)
		{
			$register_valid=false;
			$_SESSION['Sign_Captcha_Err']="Confirm, that you are not a bot!";
		}

    require_once "connectUsers.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try
		{
			$connection = new mysqli($host, $db_user, $db_password, $db_name);
			if ($connection->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				$result = $connection->query("SELECT ID FROM users WHERE email='$email'");

				if (!$result) throw new Exception($connection->error);

				$how_many_mails = $result->num_rows;
				if($how_many_mails>0)
				{
					$register_valid=false;
					$_SESSION['Sign_Email_Err']="There is an existing account associated with this email!";
				}

				//Czy nick jest już zarezerwowany?
				$result = $connection->query("SELECT ID FROM users WHERE nick='$nick'");

				if (!$result) throw new Exception($connection->error);

				$how_many_nicks = $result->num_rows;
				if($how_many_nicks>0)
				{
					$register_valid=false;
					$_SESSION['Sign_Nick_Err']="This nickname is already in use!";
				}

				if ($register_valid==true)
				{
          $verification_code = rand(1000,7000);
          $verification_code = password_hash($verification_code, PASSWORD_DEFAULT);
					if ($connection->query("INSERT INTO users VALUES (NULL, '$nick', '$email', '$password_hash', '$verification_code', 0, 1600)"))
					{
            $to = $email;
            $subject = 'ChessYes | Account activation';
            $message = 'Thanks for signing up!
                Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

                ------------------------
                Email: '.$email.'
                Password: '.$password.'
                ------------------------

                Please click this link to activate your account:
                http://www.chessyes.eu/ServerScripts/verify.php?email='.$email.'&hash='.$verification_code.'

                ';
            $headers = 'From:noreply@chessyes.com' . "\r\n";
            mail($to, $subject, $message, $headers);
            $_SESSION['acc_created'] = array(true, $email);
            header('Location: ../verify_email.php');
            exit();
					}
					else
					{
						throw new Exception($connection->error);
					}

				}
				$connection->close();
        header('Location: ../sign.php');
			}

		}
    catch(Exception $e)
		{
			echo '<span style="color:red;">Server Error! We are working on it. Please, try to sign up later!</span>';
			echo '<br />For developers: '.$e;
		}
}
else {
  header('Location: ../sign.php');
}
 ?>

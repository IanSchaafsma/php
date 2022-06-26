<?php
require 'functions.php';
$connection = dbConnect();

$name = '';
$email = '';
$phone = '';
$team = '';
$message = '';

// opslag variabelen array voor errors //
$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Gegevens opslaan
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $team = $_POST['team'];
    $message = $_POST['message'];
    $time = date('Y-m-d H:i:s');

    // fouten controlleren en valideren
    if( isEmpty($name) ){
        $errors['name'] = 'Please enter your Display Name';
    }
    if( isEmpty($email) ){
        $errors['email'] = 'Please enter your E-mail Adress';
    }
    if(!isValidEmail($email)){
        $errors['email'] = 'Please enter a valid E-mail Adress';
    }

    //print_r($errors);

    if( count($errors) == 0){
        $sql = "INSERT INTO `purchases` (`name`, `email`, `phone`, `team`, `message`, `date`)
        VALUES (:displayname, :email, :phone, :team, :messages, :whensend);";
        $statement = $connection->prepare($sql);
        $params = [
            'displayname' => $name,
            'email' => $email,
            'phone' => $phone,
            'team' => $team,
            'messages' => $message,
            'whensend' => $time,
        ];
        $statement->execute($params);

        // stuur bezoeker door naar bedankt pagina
        header('Location: ../index.php');
        exit;
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/form.css">
    <title>teambees</title>
</head>

<body>
    <form action="contact.php" method="POST" novalidate>
        <div>
            <label for="name">display name <p class="important tooltip">*</p></label>
            <input id="name" value="<?php echo $name ?>" type="text" name="name" placeholder="Display Name" required>

            <?php if(!empty($errors['name'])):?>
                <p class="form-error"><?php echo $errors['name'] ?></p>
            <?php endif;?>
        </div>
        <div>
            <label for="email">email <p class="important tooltip">*</p></label>
            <input id="email" value="<?php echo $email ?>" type="email" name="email" placeholder="Email" required>

            <?php if(!empty($errors['email'])):?>
                <p class="form-error"><?php echo $errors['email'] ?></p>
            <?php endif;?>
        </div>
        <div>
            <label for="phone">mobile phone</label>
            <input id="phone" value="<?php echo $phone ?>" type="text" name="phone" placeholder="Mobile Phone">
        </div>
        <div>
            <label for="team">team</label>
            <input id="team" value="<?php echo $team ?>" type="text" name="team" placeholder="Team name">
        </div>
        <div>
            <label for="message">message</label>
            <textarea id="message" name="message" class="bigText" class="vraag/opmerking" placeholder="My #TeamBees message is..."><?php echo $message ?></textarea>
        </div>
        <input class="sumbit" type="submit" value="Send">
    </form>
</body>

</html>


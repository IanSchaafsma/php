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
        $errors['name'] = 'Please enter your Display Name *';
    }
    if( isEmpty($email) ){
        $errors['email'] = 'Please enter your E-mail Adress *';
    }
    if(!isValidEmail($email)){
        $errors['email'] = 'Please enter a valid E-mail Adress *';
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
        header('Location: bedankt.html');
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
    <link rel="stylesheet" href="css/contact.css">
    <title>Form demo</title>
</head>

<body>
    <form action="contact.php" method="POST" novalidate>
        <div>
            <label for="name">display name</label>
            <input id="name" value="<?php echo $name ?>" type="text" name="name" placeholder="vul hier je naam in" required>

            <?php if(!empty($errors['name'])):?>
                <p class="form-error"><?php echo $errors['name'] ?></p>
            <?php endif;?>
        </div>
        <div>
            <label for="email">email</label>
            <input id="email" value="<?php echo $email ?>" type="email" name="email" placeholder="vul hier je email in" required>

            <?php if(!empty($errors['email'])):?>
                <p class="form-error"><?php echo $errors['email'] ?></p>
            <?php endif;?>
        </div>
        <div>
            <label for="phone">mobile phone</label>
            <input id="phone" value="<?php echo $phone ?>" type="text" name="phone" placeholder="vul hier je nummer in">
        </div>
        <div>
            <label for="team">team</label>
            <input id="team" value="<?php echo $team ?>" type="text" name="team" placeholder="vul hier je team naam in">
        </div>
        <div>
            <label for="message">message</label>
            <textarea id="message" name="message" class="bigText" class="vraag/opmerking" placeholder="zet hier een berichtje neer"><?php echo $message ?></textarea>
        </div>
        <input class="sumbit" type="submit" value="Verzenden">
    </form>
</body>

</html>


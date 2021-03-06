<?php
$error = array();
if($_POST['send']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $nachricht = $_POST['nachricht'];

    if(!$name) {
        $error['name'] = 'Bitte geben Sie Ihren Namen an!';
    }
    if(!$email) {
        $error['email'] = 'Bitte geben Sie Ihre E-Mail-Adresse an!';
    }
    if(!$nachricht) {
        $error['email'] = 'Bitte geben Sie eine Nachricht an!';
    }
    if(empty($error)) {
        $message = "Neue Anfrage:\n\n";
        $message.= "Name: ".$name."\n";
        $message.= "E-Mail: ".$email."\n";
        $message.= "Telefon: ".$telefon."\n\n";
        $message.= "Nachricht: ".$nachricht."\n";

        $mail = new rex_mailer();
        $mail->SetFrom($email);
        $mail->Subject = "Ferienwohnungen Drexel - Anfrage";
        $mail->Body    = nl2br($message);
        $mail->AltBody = $message;
        $mail->AddAddress("info@ferienwohnungen-drexel.at");
        $mail->Send();
        header("Location: ".seo42::getFullUrl(1));
        exit;

    }
}
?>

<?php if($error) { ?>
<div class="alert alert-danger" role="alert">
    <?php foreach($error as $e) { ?>
        <li><?php echo $e; ?></li>
    <?php } ?>
</div>
<?php } ?>

<form method="post" class="form-horizontal" role="form">
<div class="row">
    <div class="col-sm-12">
        <div class="form-group required">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $_POST['name']; ?>" />
            </div>
        </div>

        <div class="form-group required">
            <label for="email" class="col-sm-2 control-label">E-Mail</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $_POST['email']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="telefon" class="col-sm-2 control-label">Telefon</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="telefon" name="telefon" value="<?php echo $_POST['telefon']; ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="nachricht" class="col-sm-2 control-label">Nachricht</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="nachricht" name="nachricht" ><?php echo $_POST['nachricht']; ?></textarea>
            </div>
        </div>

        <div class="form-group" style="margin-top: 20px;">
            <div class="col-sm-10 text-right">
                <input type="submit" class="btn btn-default btn-fd" name="send" value="Anfrage senden" />
            </div>
        </div>
    </div>
</div>
</form>

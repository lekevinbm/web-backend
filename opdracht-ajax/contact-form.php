<?php
    session_start();

    $message = '';
    $email = '';
    $boodschap = '';
    $radio = '';
        
    if(isset($_SESSION['message']['notificatie']))
    {
        $message = $_SESSION['message']['notificatie'];
    }

    if(isset($_SESSION['mail']))
    {
        $email = $_SESSION['mail']['from'];
        $boodschap = $_SESSION['mail']['boodschap'];
        if ($_SESSION['mail']['kopie'])
        {
            $radio = 'checked';
        }
    }

    session_unset();
?>
<!DOCTYPE html>

<style>
    .message{
        color: white;
        background-color: red;
    }
</style>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<html>
    <body>
        <h1>Contacteer ons</h1>
        
        <p class='message'><?php echo $message ?></p>
        <div id="formdiv">
            <form action="contact.php" method="post" id="contactform">
                <ul>
                    <li>
                        <label for="email">E-mailadres</label>
                        <input type="email" name="from" id="from" value="<?php echo $email ?>">
                    </li>
                    <li>
                        <label for="boodschap">Boodschap</label>
                        <textarea id="boodschap" name="boodschap"><?php echo $boodschap ?></textarea>
                    </li>
                    <li>
                        <input type="radio" name="kopie" <?php echo $radio ?>>Stuur een kopie naar mezelf </input>
                    </li><br>
                    <input type="submit" value="Verzenden">
                </ul>
            </form>
        </div>
        
    

    
    
    <script>
        $(function() {
            $('#contactform').submit(function(){

				
				var formData = $('#contactform').serialize();
				

				// Een simpele ajax-request
				$.ajax({

					type: 'POST',
					url: 'contact-api.php',
					data: formData,
					success: function(data) {

							data	=	JSON.parse(data);
                        
                            console.log(data);

								if (data['type'] == 'succes')
                                {
                                    $('#contactform').fadeOut('slow', function(){
                                        $('#formdiv').append('<p>Bedankt! Uw bericht is goed verzonden!</p>').hide().fadeIn('slow');
                                        
                                    });
                                }
                                else
                                {
                                       $('#contactform').fadeOut('slow', function(){
                                        $('#formdiv').prepend('<p>Oeps, er ging iets mis. Probeer opnieuw!</p>').hide().fadeIn('slow');
                                        
                                    }); 
                                }

							}

				})

				// Zeker niet vergeten return false toe te passen, anders zal het formulier automatisch verstuurd worden.
				// Dit proberen we tegen te gaan
				return false;
			})
        });
        </script>
    </body>
</html>

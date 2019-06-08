<?php

//                                                              CREATED BY                                                           
//   .yyyyys/     `.-:::-``                                                         `````````````                                  +yyyyyy/             
//  :MMd///-  `+hNMMMMMMMmy:                                                      :MMMMMMMMMMMNN.                                 +yyydMMo             
//   /MMs     .mMMMMMMMMMMMMMh`                                                    :MMMMMMMMMMMdh`                                     /MM+             
//   /MMo     yMMMMMMMMMMMMms:       .:/-`      `......   `      `....``           :MMMMMMMMM            ```  ```        ```  ```      /MM+             
//   +MM+     yMMMMMMMMMMMMs.     -ohNMMMmhs+.  /NNNNNN-:sdo  .ohmNMMMNdo`         :MMMMMMMMMd/     `-+yhdddo:ddd   `-+yhdddo-ddd`     /MM+             
//   +MM/     .dMMMMMMMMMMMMNs`  oMMMMMNmMMMMN` oMMMMMMNMMMM`oNMMMMMMMMMMm.        :MMMMMMMMM      /dMMMMMMMMNMMM- /dMMMMMMMMNMMM:     +MM+             
//   oMM:      `omMMMMMMMMMMMMd``NMMMMy   dMMM: oMMMMMMMMMMd/MMMMMN  mMMMMd        :MMMMMMMMMMMMM /MMMMMMMNo+MMMM//MMMMMMMNs+MMMM+     +MM+             
//   sMM-       .+NMMMMMMMMMMMM:sMMMMM:   oMMMo oMMMMMMMmdo`yMMMMMs  sMMMMM:       :MMMMMMMMMMMMM hMMMMMMm   MMMMoyMMMMMMm   MMMMs     +MM/    ```      
//   sMM.     `hNMMMMMMMMMMMMMM:NMMMMMNdhdMMMMs sMMMMMMM`   oMMMMMNNMMMNmdh:       :MMMMMMMMMMMMM oMMMMMMMMNmMMMMo+MMMMMMMMNmMMMMs     +MM:  /hdmmdo.   
//   yMM`      /mMMMMMMMMMMMMMs dNMMMMMMMMMMMMo sMMMMMMM    `hMMMMMMMdo            :MMMMMMMMMMMMM `yMMMMMMMMMMMMM+`sMMMMMMMMMMMMMo     +MM: -MMMMMMMh   
//   hMM`       .odMMMMMMMMmy-  `.oNMMMMMMMNd+` yMMMMMMM`    `/hNMMMMMMNd:         :MMMMMMMMMMMMM   :ydNMMMMMMMMN.  -sdNMMMMMMMMM-     +MM: .NMMMMMN+   
//   hMN          `./ooo+/-`       .oyyhyo:.`   +sssssss`       .:+syhddy`         `/////////////     `.+dMMMMMN/     `.+dMMMMMN+      +MM:  .oyhyo-    
//   dMN                                                              ``                             .omMMMMMMh-     .omMMMMMMh-   ```.oMM-             
//   dMNyysso`                                                                                      oNMMMMMdo-      oNMMMMMdo-    .NNNNMMM.             
//   :///+++o`                                            HELLO@SOREEGG.COM.AU                     .yys+:`         .yys+:``       ``.....              
//														  HTTP://SOREEGG.COM.AU
//



$errors = '';
$myemail = 'maudeann@ymail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$nature_of_message = $_POST['nature-of-message'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Stretto Coffee Contact form submission: $name";
$email_body = "You have received a new message in regards to Stretto Coffee.".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Nature of Enquiry: $nature_of_message \n Message: \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: thank-you.html');
}
?>
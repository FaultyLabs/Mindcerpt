<?php 

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

class Mailer extends Model {
    private $mail;

    public function __construct () {
        parent::__construct();
        //Create a new PHPMailer instance
        $this->mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $this->mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->mail->SMTPDebug = 2;

        //Set the hostname of the mail server
        $this->mail->Host = 'smtp.gmail.com';

        // use
        // $this->mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $this->mail->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Username = EMAIL_ACCOUNT;
        
        //Password to use for SMTP authentication
        $this->mail->Password = EMAIL_PASSWORD;
    }

    public function sendMail($recepient) {    
        //Set who the message is to be sent from
        $this->mail->setFrom('unix1gl@gmail.com', 'Faulty Labs');

        //Set an alternative reply-to address
        // $this->mail->addReplyTo('unix1gl@gmail.com', 'First Last');

        //Set who the message is to be sent to
        $this->mail->addAddress($recepient, 'Nnamdi Aninye');

        //Set the subject line
        $this->mail->Subject = 'Welcome to Seuss';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $this->mail->msgHTML(file_get_contents('./mail/welcome.html'), __DIR__);
        
        //Replace the plain text body with one created manually
        // $this->mail->Body = 'This is a plain-text message body';

        //Attach an image file
        // $this->mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$this->mail->send()) {
            echo "Mailer Error: " . $this->mail->ErrorInfo;
            // return false;
        } else {
            // echo "Message sent!";
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            #if (save_mail($this->mail)) {
            #    echo "Message saved!";
            #}
            return true;
        }
    }

    //Section 2: IMAP
    //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
    //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
    //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
    //be useful if you are trying to get this working on a non-Gmail IMAP server.
    function save_mail($mail)
    {
        //You can change 'Sent Mail' to any other folder or tag
        $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";
        //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
        $imapStream = imap_open($path, $this->mail->Username, $this->mail->Password);
        $result = imap_append($imapStream, $path, $this->mail->getSentMIMEMessage());
        imap_close($imapStream);
        return $result;
    }
}
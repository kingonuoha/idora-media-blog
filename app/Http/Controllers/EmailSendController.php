<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\SMTP;
use App\Http\Livewire\UserHeader;
use App\Http\Livewire\AdminHeader;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Notifications\blogNotification;
use Illuminate\Support\Facades\Notification;

class EmailSendController extends Controller
{
    //
    private $emailTemplate;

    public function __construct()
    {
        $this->emailTemplate = new EmailTemplateController();
    }
    //
    public function sendWelcomeMsg()
    {


            //Load Composer's autoloader
            // require 'vendor/autoload.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host = env('EMAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('EMAIL_USERNAME');
                $mail->Password = env('EMAIL_PASSWORD');
                $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
                $mail->Port = env('EMAIL_PORT');                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom(env('EMAIL_USERNAME'), 'Dora Amaefula');
                $mail->addAddress('kingonuoha01@gmail.com', 'Kingsley Onuoha');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('info@idoramedia.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Idora Media | Welcome To Idora Media';
                $mail->Body    = $this->emailTemplate->welcomeMessage() ;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }
    public function sendNewBlogEmail(Post $post)
    {
        $admin = User::where('role', '!=', 0)->get();
        // return (new AdminHeader)->showToast("checking something", 'success');

        // $post = Post::find(1);
            //Load Composer's autoloader
            // require 'vendor/autoload.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                // $mail->SMTPAuth   = true;   
                $mail->SMTPKeepAlive = true; //SMTP connection will not close after each email sent, reduces SMTP overhead                                //Enable SMTP authentication
                $mail->Host = env('EMAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('EMAIL_USERNAME');
                $mail->Password = env('EMAIL_PASSWORD');
                $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
                $mail->Port = env('EMAIL_PORT');                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom(env('EMAIL_USERNAME'), 'Dora Amaefula');
                $mail->addAddress('kingonuoha01@gmail.com', 'Kingsley Onuoha');     //Add a recipient
                // $mail->addAddress('ellen@example.com');               //Name is optional
                $mail->addReplyTo('info@idoramedia.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Idora Media | New Blog Post';

                // All Users Role == 0
                $users = User::where('role', 0)->get();
                foreach ($users as $user) {
                    $mail->Body    = $this->emailTemplate->newBlog_email($post, $user) ;
                    //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
                     $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                    try {
                        $mail->addAddress($user->email, $user->name);
                        addLog("info", "Preparing to send email to". $user->email);
                    } catch (Exception $e) {
                        Notification::send($admin, new blogNotification([
                            'desc'=>' Invalid address skipped: ' . htmlspecialchars($user->email) . '<br> sending more...',
                            'blog_image' => '',
                            'title'=> 'Error Sending mail',
                            'time'=> now(),
                            'type' => 'danger'
                        ]));
                        // echo 'Invalid address skipped: ' . htmlspecialchars($user->email) . '<br>';
                        continue;
                    }
                    // if (!empty($user->photo)) {
                    //     //Assumes the image data is stored in the DB
                    //     $mail->addStringAttachment($user->photo, 'YourPhoto.jpg');
                    // }
                
                    try {
                        $mail->send();
                        addLog("success", "Email Successfully Sent to ". $user->email);
                        echo 'Message sent to :' . htmlspecialchars($user->name) . ' (' .
                            htmlspecialchars($user->email) . ')<br>';
                            Notification::send($admin, new blogNotification([
                                'desc'=>'Message sent to :' . htmlspecialchars($user->name) . ' (' .htmlspecialchars($user->email) . ')<br>',
                                'blog_image' => '',
                                'title'=> 'Email Sent!',
                                'time'=> now(),
                                'type' => 'success'
                            ]));
                        
                    } catch (Exception $e) {
                        // echo 'Mailer Error (' . htmlspecialchars($user->email) . ') ' . $mail->ErrorInfo . '<br>';
                        //Reset the connection to abort sending this message
                        //The loop will continue trying to send to the rest of the list
                        $mail->getSMTPInstance()->reset();
                    }
                    //Clear all addresses and attachments for the next iteration
                    $mail->clearAddresses();
                    $mail->clearAttachments();
                }
               

                // echo 'Message has been sent';
            } catch (Exception $e) {
                // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }


    public function sendContactUs(Request $req){
      $req->validate([
            'email' => 'required|email',
            'phone'=> 'required',
            'comments' => 'required',
            'name' => 'required'
        ]);
        $data = [
           'sender_email' => $req->email,
           'sender_name' => $req->name,
           'sender_comment' => $req->comments,
           'sender_phone' => $req->phone,
        ];
        $emails_to_send_to = [
            // send to Tech Assist
            [
                'email' => env('TECH_EMAIL_USERNAME'),
                'name'=> "Idora Media",
                // 'message'=> $this->emailTemplate->contactMessageAdmin($req),
                'message'=> view('emails.contact-admin', $data)->render(),
                'subject' => "Idora Media | A User Contacted you"
            ],
            // send to Miss Dora 

            [
                'email' => env('OWNER_PERSONAL_EMAIL_USERNAME'),
                'name'=> "Idora Media",
                // 'message'=> $this->emailTemplate->contactMessageAdmin($req),
                'message'=> view('emails.contact-admin', $data)->render(),
                'subject' => "Idora Media | A User Contacted you"
            ],
            // send to Official Email

            [
                'email' => env('EMAIL_USERNAME'),
                'name'=> "Idora Media",
                // 'message'=> $this->emailTemplate->contactMessageAdmin($req),
                'message'=> view('emails.contact-admin', $data)->render(),
                'subject' => "Idora Media | A User Contacted you"
            ],
            [
                'email' => $req->email,
                'name'=> $req->name,
                'message'=> $this->emailTemplate->contactMessageReciever($req->name, $req->email),
                'subject' => "Idora Media | Thank you for contacting Us!"

            ]
            ];

            $admin = User::where('role', '!=', 0)->get();
            // return (new AdminHeader)->showToast("checking something", 'success');
    
            // $post = Post::find(1);
                //Load Composer's autoloader
                // require 'vendor/autoload.php';
    
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
    
                try {
                    //Server settings
                    $mail->isSMTP();                                            //Send using SMTP
                    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    // $mail->SMTPAuth   = true;   
                    $mail->SMTPKeepAlive = true; //SMTP connection will not close after each email sent, reduces SMTP overhead                                //Enable SMTP authentication
                    $mail->Host = env('EMAIL_HOST');
                    $mail->SMTPAuth = true;
                    $mail->Username = env('EMAIL_USERNAME');
                    $mail->Password = env('EMAIL_PASSWORD');
                    $mail->SMTPSecure = env('EMAIL_ENCRYPTION');
                    $mail->Port = env('EMAIL_PORT');                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                    //Recipients
                    $mail->setFrom(env('EMAIL_USERNAME'), 'Dora Amaefula');
                    $mail->addAddress('kingonuoha01@gmail.com', 'Kingsley Onuoha');     //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    $mail->addReplyTo('info@idoramedia.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
    
                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    
                    // All Users Role == 0
                    $users = User::where('role', 0)->get();
                    foreach ($emails_to_send_to as $user) {
                        $mail->Subject = 'Idora Media | '.$user['subject'];
                        $mail->Body    =$user['message'] ;
                        //msgHTML also sets AltBody, but if you want a custom one, set it afterwards
                         $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                        try {
                            $mail->addAddress($user['email'], $user['name']);
                        addLog("success", "Preparing to send Contact us email to". $user['email']);

                        } catch (Exception $e) {
                            Notification::send($admin, new blogNotification([
                                'desc'=>' Invalid address skipped: ' . htmlspecialchars($user['email']) . '<br> sending more...',
                                'blog_image' => '',
                                'title'=> 'Error Sending mail',
                                'time'=> now(),
                                'type' => 'danger'
                            ]));
                            // echo 'Invalid address skipped: ' . htmlspecialchars($user->email) . '<br>';
                            continue;
                        }
                        // if (!empty($user->photo)) {
                        //     //Assumes the image data is stored in the DB
                        //     $mail->addStringAttachment($user->photo, 'YourPhoto.jpg');
                        // }
                    
                        try {
                            $mail->send();
                        addLog("success", "Email Successfully Sent to ". $user['email']);

                            // echo 'Message sent to :' . htmlspecialchars($user['name']) . ' (' .
                            //     htmlspecialchars($user['email']) . ')<br>';
                                Notification::send($admin, new blogNotification([
                                    'desc'=>'Message sent to :' . htmlspecialchars($user['name']) . ' (' .htmlspecialchars($user['email']) . ')<br>',
                                    'blog_image' => '',
                                    'title'=> 'Email Sent!',
                                    'time'=> now(),
                                    'type' => 'success'
                                ]));
                            
                        } catch (Exception $e) {
                            Notification::send($admin, new blogNotification([
                                'desc'=>'Mailer Error (' . htmlspecialchars($user['email']) . ') ' . $mail->ErrorInfo . '<br>',
                                'blog_image' => '',
                                'title'=> 'Error Sending mail',
                                'time'=> now(),
                                'type' => 'danger'
                            ]));
                            // echo 'Mailer Error (' . htmlspecialchars($user->email) . ') ' . $mail->ErrorInfo . '<br>';
                            //Reset the connection to abort sending this message
                            //The loop will continue trying to send to the rest of the list
                            $mail->getSMTPInstance()->reset();
                        }
                        //Clear all addresses and attachments for the next iteration
                        $mail->clearAddresses();
                        $mail->clearAttachments();
                    }
                   
    
                    // echo 'Message has been sent';
                } catch (Exception $e) {
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

}
    
}

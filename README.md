# Emailing template

**Composer command** 

composer require areeb/email-boiler-plate


#

**Publishing the configurations**

```
php artisan vendor:publish --tag=CC-Emails
```

#

**Installation command**

```
php artisan install:email
```
---

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`MAIL_MAILER`

`MAIL_HOST`

`MAIL_PORT`

`MAIL_USERNAME`

`MAIL_PASSWORD`

`MAIL_ENCRYPTION`

#

### After setting the environment variables, you can start your local development server and start sending mail by just clicking on the send button.

## Code snippets

#### You can send OTP numbers in your mail
```
class EmailController extends Controller
{
    public function index()
    {
        return view('emails.index');
    }

    public function sendEmail()
    {
        $otp = $this->generateOTP();
        $validator = [
            'sender' => 'sender@mail.com',
            'to' => 'receiver@mail.com',
            'subject' => 'some subject',
            'message' => 'A message from sender with OTP: ' . $otp,
        ];
        Mail::queue((new Emails($validator))->onQueue('emails'));
        return "mail has been sent";
    }

    public function generateOTP()
    {
        return random_int(0, 99999);
    }
}
```

#
#### Sending an attachment

```
public function build()
{
    $this->from($this->validator['sender'])
        ->subject($this->validator['subject'])
        ->to($this->validator['to'])
        ->attach(base_path('README.md'))
        ->markdown('emails.welcome');
    return $this;
}
```
#
#### Sending multiple attachments

```
public function sendEmail()
{
    $attachments = [
        base_path('composer.json'),
        base_path('README.md'),
        base_path('package.json'),
    ];

    $validator = [
        'sender' => 'sender@mail.com',
        'to' => 'receiver@mail.com',
        'subject' => 'some subject',
        'message' => 'A message from sender',
        'attachments' => $attachments
    ];
    Mail::queue((new Emails($validator))->onQueue('emails'));
    return "mail has been sent";
}
```

#### In the emails file

```
class Emails extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $validator;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $this->from($this->validator['sender'])
            ->subject($this->validator['subject'])
            ->to($this->validator['to'])
            ->markdown('emails.welcome');
            foreach ($this->validator['attachments'] as $attachment) {
                $this->attach($attachment);
            }
        return $this;
    }
```






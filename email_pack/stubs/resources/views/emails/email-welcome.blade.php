<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>
    {{-- some basic styles --}}

<style>
        body {
            background-color: whitesmoke;
        }
        /* The main body container */
        #main_form_container {
            display: grid;
            justify-content: center;
            border-radius: 5px;
            padding: 20px;
        }
        /* sms and email buttons */
        #sms_send_btn,
        #send_email_btn {
            width: 100%;
            font-size: large;
            background-color: #3852a0;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 30px;
            font-family: sans-serif;
        }
        /* sms and email buttons */
        #sms_send_btn:hover,
        #send_email_btn:hover {
            transition: 0.2s;
            background-color: forestgreen;
        }
        /* all input fields */
        #sms_receiver,
        #sender,
        #to,
        #subject,
        #sms_message,
        #message {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 20px;
            font-family: sans-serif;
        }
        #go_back_link {
            text-decoration: none;
            width: 100%;
            font-size: large;
            background-color: #3852a0;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-size: 30px;
            font-family: sans-serif;
        }
        /* All labels */
        .base_label {
            font-size: 20px;
            font-family: sans-serif;
        }
</style>
</head>
    <div id="main_heading">
        <h1>Welcome to the mailing template</h1>
    </div>

    <div id="main_body">
        <p>Welcome, <strong>{{ $validator['to'] }}</strong></p>
        <p>This is a test mail from <strong>{{ $validator['sender'] }}</strong></p>
        <p>over here we can use mailgun, mailtrap, sendgrid</p>
        <p><strong>Subject:</strong> {{ $validator['subject'] }}</p>
        <p><strong>Message:</strong> {{ $validator['message'] }}</p>
    </div>

    <div id="main_footer">
        <p>
            Thanks, <br>
            Cooperative Computing
        </p>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Job Application</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f9fa; padding: 20px; margin-bottom: 20px; border-radius: 5px;">
        <h2>New Job Application</h2>
    </div>

    <div style="background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <p style="margin-bottom: 15px;">
            <strong>Full Name:</strong> {{ $fullName }}
        </p>

        <p style="margin-bottom: 15px;">
            <strong>Contact Number:</strong> {{ $phone }}
        </p>

        @if($email)
        <p style="margin-bottom: 15px;">
            <strong>Email Address:</strong> {{ $email }}
        </p>
        @endif

        @if($userMessage)
        <div style="margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-radius: 5px;">
            <strong>Message:</strong><br>
            {{ $userMessage }}
        </div>
        @endif
    </div>

    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; font-size: 12px; color: #666;">
        <p>CV is attached to this email.</p>
        <p>This application was submitted through the Royal Jobs UAE website.</p>
    </div>
</body>
</html>
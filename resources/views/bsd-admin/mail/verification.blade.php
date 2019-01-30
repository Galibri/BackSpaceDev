<!DOCTYPE html>
<html lang="en">
<body>
    <div>
        <p>Dear {{ $user->name }},</p>
        <p>Your account has been created. Please click the following link to activate your account.</p>
        <a href="{{ route('user.email.verify', $user->email_verification_token) }}">Click here to activate your account</a>
        <br>
        <p>If you can't click the link, copy and paste the following link to your brwoser:</p>
    <p>{{ route('user.email.verify', $user->email_verification_token) }}</p>

        <br>
        <br>
        <p>Thanks!</p>
    </div>
</body>
</html>
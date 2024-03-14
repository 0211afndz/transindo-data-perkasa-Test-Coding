<h1>
    Hello Again! {{ $nama }}
</h1>
<p allign="justify">
    This is us! remember? we are send this email to you because you want to register yourself to us, and you need to confirm your email by the link below so you can access your account.
    <br>
    <br>
    <br>
    {{ url('register/confirm_to_us/'.encrypt($email)) }}
</p>
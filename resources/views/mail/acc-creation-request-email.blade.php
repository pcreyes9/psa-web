<strong>Dear Dr. {{ $name }},</strong>
<br><br>

You are receiving this email because we received an account creation request for your PSA member ID: {{ $member_id }}.<br><br>

<strong>Your PSA Code: {{ $password }}</strong><br>
Please use this code to complete your registration by clicking the button below.
<br><br>


<!-- Button -->
<a href="{{ route('register') }}" 
   style="display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">
    Complete Registration
</a>
<br><br>

If you did not request an account creation, no further action is required.
<br><br><br>

Regards, <br>
Paul Reyes | IT Specialist <br>
PSA Secretariat

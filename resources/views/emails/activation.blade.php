<h1>Hello,</h1>

<p>Please click the following link to activate your account,</p>
<a href="{{ env('APP_URL') }}/activate/{{$user->email}}/{{$code}}">activate account</a>

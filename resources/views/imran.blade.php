@php use Laravel\Socialite\Facades\Socialite;
    use App\Models\User;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
    //  $callBackUser = Socialite::driver('google')->stateless()->user();
    // if(!User::where('email',$callBackUser->email)->first()) {
        // $newUser=User::create([
        //     'name' =>$callBackUser->name,
        //     'email' =>$callBackUser->email
        // ]);
        // $deviceName = 'ipone13';              

        // return $newUser->createToken($deviceName)->plainTextToken;

    // }
    // else {
        $deviceName = 'ipone14';              

        // $user = User::where('email', $callBackUser->email)->first();

        // return $user->createToken($deviceName)->plainTextToken;
                // $token =$user->createToken($deviceName)->plainTextToken;


    }   
    @endphp
    <a href="exp://REPLACE_ME/">
        Go back with no params
      </a>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var links = document.querySelectorAll('a');
      var baseUri = 'exp://wg-qka.notbrent.app.exp.direct';

      // Take the uri from the params
      var qs = decodeURIComponent(document.location.search);
      if (qs) {
        baseUri = qs.split('?linkingUri=')[1];
      }

      // Update the link urls
      for (var i = 0; i < links.length; ++i) {
        links[i].href = links[i].href.replace('exp://REPLACE_ME/', baseUri);
        console.log(links[i].href);
      }

      var redirectInterval = setInterval(function() {
        var countdown = document.querySelector('.countdown');
        var t = parseInt(countdown.innerText, 10);
        t -= 1;

        countdown.innerText = t;

        if (t === 0) {
          clearInterval(redirectInterval);
          window.location.href = baseUri + 'message=' + encodeURIComponent('Redirected automatically by timer');
        }
      }, 1000);
    });
  </script>
</body>
</html>
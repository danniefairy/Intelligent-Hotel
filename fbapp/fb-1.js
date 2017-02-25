
        var fb_id;
        var fb_name;
        var fb_email;
        var fb_gender;
        function statusChangeCallback(response) {
          console.log('statusChangeCallback');
          console.log(response);

          if (response.status === 'connected') {
            testAPI();
          } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            window.location.reload();
          } else {

          }

        }

        function checkLoginState() {
          FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
          });
        }

        window.fbAsyncInit = function() {
        FB.init({
          appId      : '339043493157430',
          cookie     : true,  // enable cookies to allow the server to access
                              // the session
          xfbml      : true,  // parse social plugins on this page
          version    : 'v2.8' // use graph api version 2.8
        });


        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });

        };

        // Load the SDK asynchronously
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v2.8&appId=339043493157430";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Here we run a very simple test of the Graph API after login is
        // successful.  See statusChangeCallback() for when this call is made.
        function testAPI() {
          console.log('Welcome!  Fetching your information.... ');
          FB.api('/me?fields=name,gender,email', function(response) {
            console.log('Successful login for: ' + response.name);
            fb_id = response.id;
            fb_name = response.name;
            fb_email = response.email;
            fb_gender = response.gender;
            
            window.location = "http://danniehotel.azurewebsites.net/transfer.php?name="+fb_name+"&gender="+fb_gender+"&email="+fb_email;
          });
        }
        
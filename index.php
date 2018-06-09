<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lil B Quotes | Stay Based Folks</title>
    <meta name="description" content="May these quotes inspire you to become a better person." />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Lil B Quotes | Stay Based Folk">
    <meta name="twitter:description" content="May these quotes inspire you to become a better person.">
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="http://lilb.heardle.com/based_img/og-image.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="Lil B Quotes | Stay Based Folk" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://lilb.heardle.com/" />
    <meta property="og:image" content="http://lilb.heardle.com/based_img/og-image.png" />
    <meta property="og:description" content="May these quotes inspire you to become a better person." /> 
    <meta property="og:site_name" content="Lil B Quotes" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="based_css/based_style.css">
    <!-- Oleo Font -->
    <link href='https://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- ShareThis -->
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>

    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-83060035-1', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
  <body>
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col-md-4 col-md-offset-4">
              <h1>Lil B Quotes</h1>
              <a href="#" id="inspire">
                <img id="lil_b" src="based_img/lil_b_still.png" style="width:100%;max-width:512px;margin-left:0px;" class="floating"></a><br/>
                <!--
             <button id="inspire" class="btn btn-info btn-lg">Inspire Me, Based God!</button>-->
              <!-- Sound Element -->
              <p style="color:#fff;"><i>Tap the Based God...</i></p>
              <div id="element"></div>
            </div>
        </div>

    </div>


    <footer class="footer" style="background-color:#000;">
      <div class="container">
        <center>
          <p class="text-muted">Designed by <a href="http://www.shokodesigns.com" target="_blank">Shoko</a></p>
        </center>
      </div>
    </footer>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Audio Latency Fix -->
    <script src="js/lowLag.js"></script>
    <script src="js/soundmanager2.js"></script>


    <!-- List Sound Files -->
    <script type="text/javascript">
      $(document).ready(function(){
        <?php
          $dir = 'sounds/cut/';
          // $sounds = json_encode(array_diff(scandir($dir), array('..', '.')));

          $sounds = array_slice(scandir($dir), 2);
          $sounds = json_encode($sounds);

        ?>

        // Initialize Variables
        var img = $('img#lil_b').attr("src");

        // Convert php array to javascript array
        var sounds = <?php echo $sounds; ?>;
        var soundsLength = Object.keys(sounds).length;

        // Create an array of previously played songs
        var previouslyPlayed = [];

        // Local Directory
        var dir = 'sounds/cut/';

        // Initialize lowLag JS
        lowLag.init({'force':'sm2', 'urlPrefix':dir, 'audioTagTimeToLive':9000});

        console.log(sounds);

        // Load each individual song
        for(var i = 0; i < soundsLength; i++){
          lowLag.load(sounds[i]);
        }

        var everythingLoaded = setInterval(function() {
          if (/loaded|complete/.test(document.readyState)) {
            clearInterval(everythingLoaded);
            // Wait an extra 2 seconds
            setTimeout(function(){
              $('#overlay').fadeOut();
            }, 2000)
          }
        }, 10);


        // Live Directory 
        // var dir = 'http://www.heardle.com/lilb/sounds/cut/';

        // Once the image is clicked ...
        $('a#inspire').unbind().click(function(){
            // Stop any currently plagin sound
            soundManager.stopAll();

            // Select a random index from the sounds array
            var index = Math.floor(Math.random() * (soundsLength));
            thisSound = sounds[index];


            // Current Song
            var currentSong = thisSound;

            // If song was never played before
            if(previouslyPlayed.indexOf(currentSong) == -1){

              // add to previously played list & play song
              previouslyPlayed.push(currentSong);

              soundManager.play(currentSong, {
                onfinish: function(){
                  // Once done, return to still image
                  $('img#lil_b').attr("src", 'based_img/lil_b_still.png');
                }
              });
              console.log("Now Playing: " + dir + thisSound);


            }else{
              // If the song has already been played
              console.log(dir + thisSound + " has already been played");

              while(previouslyPlayed.indexOf(currentSong) != -1){
                // Pick another random song
                var index = Math.floor(Math.random() * (soundsLength));
                thisSound = sounds[index];

                // Add new song to current queue
                currentSong = thisSound;

                // If all songs have been played, reset the previouslyPlayed array
                if(Object.keys(sounds).length == Object.keys(previouslyPlayed).length){
                  // Clear the 'previouslyPlayed' array
                  previouslyPlayed = [];
                  console.log("All songs have been played!");
                }

              } // while()
              // Loop until new song is found, then play it


              // add to previously played list & play song
              previouslyPlayed.push(currentSong);
              soundManager.play(currentSong, {
                onfinish: function(){
                  // Once done, return to still image
                  $('img#lil_b').attr("src", 'based_img/lil_b_still.png');
                }

              });
              console.log("Now Playing: " + dir + thisSound);

            } // else
            console.log("History: " + previouslyPlayed);

            // Animate lil B
            $('img#lil_b').attr("src", 'based_img/lil_b_talk.gif');
        });
      });
    </script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  
    <!-- Share This -->
    <script type="text/javascript">stLight.options({publisher: "bd7be731-af50-4c2b-9c47-f69dde21130b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <script>
    var options={ "publisher": "bd7be731-af50-4c2b-9c47-f69dde21130b", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}};
    var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
    </script>

  </body>
</html>
<?php 
    session_start();
    require "/events/load_events.php";
    //1.we will need to grab the event ID
    global $eventID;
    if (isset($_GET["id"]))
    {
        $eventID = $_GET["id"];
    }
    //2.query our database for that event -
    $singleventproperty = geteventinfo($eventID);
    
    //3.fill in all info based on the database
    // reminder - use POST method (youtube style - url/event?=(insert id here))
    //which will include:
    // -Title (Farhan) 
    // -Author (Sam)
    // -Date (Sam)
    // -Attendees (Elvis)
    // -Location(LONG,LAT) (Farhan)
    // -Promo Pic (Sam)
    // I almost forgot - button for apply to join/leave (Sam) - I'll also deal with the functionality as well
    
    ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Building Bridges @ UofA - <?php print_r($singleventproperty[0]['DESCRIPTION']); ?></title>
<link rel="shortcut icon" href="Assets/favicon.ico" />
<meta name="keywords" content="building bridges,b squared,b^2,uofa,u of a,university,of,alberta" />
<meta name="description" content="B squared is a service provided by the University of Alberta Bridge Builder team to connect new/isolated students with each other." />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="css/metro-bootstrap.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #3CB6CE;
    color: #FFFFFF;
}
</style>

	<link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>
    <script src="js/holder/holder.js"></script>
    <script src="js/page_scripts/HERE_utilities.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
    <script src="js/herescript.js"></script>
    <link rel="stylesheet" type="text/css" href="http://js.api.here.com/v3/3.0/mapsjs-ui.css" />
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    <script type="text/javascript"  charset="UTF-8" src="http://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>

    <!-- Load script specific for index page-->
    
    <?php
        echo
        "<script  type='text/javascript' charset='UTF-8'>";
        echo
        "function display_event() {
    if (edit == true) {
        removeClickListener();
        edit = false;
    }

    //we need to somehow delete the existing group in the map object and load the right group
    map.removeObject(currentgroup);
    currentgroup = groupfun;
    currenticon = funmark;
    map.addObject(currentgroup);
    addMarkerToGroup(groupfun, { lat:";
    print_r($singleventproperty[0]['LAT']);
    
    echo", lng: ";print_r($singleventproperty[0]['LONGt']); 
    
    echo"},
      '<div><a>Location:(*Is this shit loaded?)</a>');
    return false;
}";
    echo"</script>";
?>
    <script src="js/page_scripts/events/event_script.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
	<body class="metro">
	    <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="grid">
            <div id="row0" class="row" >
                <div class="span4 offset_special">
                        <a href="index.php"><img src="Assets/logo.png" alt="U of A B² - Connecting you with a _?"></a>
                </div>
            </div>
            <div id="row1" class="row" >
                <div class="span_navbar_special">
                </div>
                <div class="span12 offset_special">
                    <header class="bg-dark" data-load="topbar.php"></header>
                </div>
                <div id="row2" class="row">
                    <div class="span3">
                    </div>
                    <div class="span3">
                        <nav class="vertical-menu">
                            <ul>
                                <li><a href="index.php"><i class="icon-arrow-left-3 fg-white"></i></a></li>
                                <li class="title" style="color: white;">Options</li>
                                <li><a style="color: white;"><?php echo "Event ID:".$eventID;?>
                                    </a></li>
                                <li><a style="color: white;" onclick="join()" id="join" href="#Join">Join
                                    <i class="icon-plus-2 on-right"></i></a></li>
                                <li><a style="color: white;" onclick="leave()" id="leave" href="#Leave">Leave
                                    <i class="icon-cancel-2 on-right"></i></a></li>
                                <div class="fb-share-button" data-href="localhost/event.php?id=$eventID" data-layout="button_count"></div>
                                <div class="g-plusone"  data-annotation="inline" data-width="300"></div>    <!--- making changes here--->
                                <a href="http://twitter.com/share?url=http://localhost/event.php?id=$eventID" class="twitter-follow-button" data-show-count="false">Follow @twitter</a> <!--- https://twitter.com/twitter--->
                            </ul>
                        </nav>
                    </div>
                    <div class= "span5" id ="content">
                        <div id ="info_row_1" class = "row">
                            <div class="tile bg-darkPink">
                                <div class="tile-status">
                                    <div class="brand bg-black">
                                        
                                        <span class="name fg-white"><img src='Assets/default_user.png'/><br>Created By:
                                        <?php 
                                        $mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");
                                        $authid = $singleventproperty[0]['authID'];
                                        //grab the latest 4 events from database
                                        $query = mysqli_query($mysqli,"SELECT username FROM user where id='$authid'");
                                        $stuff = resultToArray($query);
                                        print_r($stuff[0]['username']);
                                        ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tile bg-amber">
                                <div class="tile-status">
                                    <div class="brand bg-black">
                                        
                                        <span class="name fg-white"> <?php print_r($singleventproperty[0]['TIME']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div id ="info_row_2" class = "row"> 
                            <div class="tile bg-red">
                                <div class="tile-content image-container">
                                    <div class="image-container">
                                        <div class="frame">
                                            <?php   echo '<img src="data:image/jpeg;base64,'.base64_encode($singleventproperty[0]['thumbnail'] ).'"/>';  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tile bg-green">
                                <div class="tile-status">
                                    <div class="brand bg-black">
                                        <span class="name fg-white">Attendees:</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="span4" id="map" style="width: 100%; height: 400px; background: grey" />   
                               
                </div>  
                    
                    
                    
            </div>
            <div class="span12 offset_special tertiary-text bg-dark fg-white" style="padding: 20px">
                Developed using <a href="http://metroui.org.ua/" class="fg-yellow">Metro UI CSS Template</a> and <a href="http://developer.here.com/api-explorer" class="fg-yellow">Nokia Here Maps</a> by Tech Branch of Bsquared.
                <br><br> <a href="mailto:UABsquared@gmail.com" class="fg-yellow">Email </a> Us
                <br><br> Visit Us On <a href="https://github.com/orgs/BsquaredatUofA/" class="fg-yellow">GitHub</a>
                </div>
                </div>
                </div>
                </div>
                </div>
        <script type="text/javascript" charset="UTF-8">
            //intialize all script operation,defined in parties_script.js
            //mappackage = map+ui
            var mappackage = setupbasicmap();
        
            var map = mappackage.map;
            var ui = mappackage.ui;
        
            var groupfun = groupfactory(ui);
            var groupstudy = groupfactory(ui);
            var groupcustom = groupfactory(ui);
            var currentgroup = groupfun;
            var edit = false;
            //a blue square for study
            var studymark = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><rect stroke="white" fill="#1b468d" x="1" y="1" width="22" height="22" /></svg>';
            //a green square for fun
            var funmark = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><rect stroke="white" fill="#7fff00" x="1" y="1" width="22" height="22" /></svg>';
            //a cyan square for custom
            var custommark = '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><rect stroke="white" fill="#ba00ff" x="1" y="1" width="22" height="22" /></svg>';
        
            var currenticon = funmark;
        
            main();
        
        
        </script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        <script  type="text/javascript" charset="UTF-8" >
            $(function () {
                $("#login").on('click', function () {
                    $.Dialog({
                        shadow: true,
                        overlay: false,
                        draggable: true,
                        icon: '<img src="Assets/default_user.png">',
                        title: 'Draggable window',
                        width: 'auto',
                        padding: 10,
                        content: 'This Window is draggable by caption.',
                        onShow: function () {
                            var content = '<form id="login-form-1" action="account/login.php/" method ="POST">' +
                                    '<p>Login</p>' +
                                    '<div class="input-control text"><input type="text" name="login"><button class="btn-clear"></button></div>' +
                                    '<p>Password</p>' +
                                    '<div class="input-control password"><input type="password" name="password"><button class="btn-reveal"></button></div>' +
                                    '<div class="input-control checkbox"><p>Remember Me <input type="checkbox" name="c1" checked/><span class="check"></span></p></div>' +
                                    '<div class="form-actions">' +
                                    '<button class="button primary">Login to...</button>&nbsp;' +
                                    '<button class="button warning" type="button"><a href="account/registration.php">Register</a></button>&nbsp;' +
                                    '<button class="button" type="button" onclick="$.Dialog.close()">Cancel</button> ' +
                                    '</div>' +
                                    '</form>';

                            $.Dialog.title("User login");
                            $.Dialog.content(content);
                        }

                    });
                });

                
            });
            
      
        </script>
    <?php
        echo" <script  type='text/javascript' charset='UTF-8' >        
        $('#attendees').on('click', function(){
           $.Dialog({
               overlay: true,
               shadow: true,
               flat: true,
               icon: '<img src='Assets/default_user.png'>',
               title: 'Attendees',
               content: '',
               padding: 10,
               onShow: function(){
                    var content =";
            $mysqli = new mysqli("localhost", "root", "goodtogo", "bsquared_user");
            $query = mysqli_query($mysqli,"SELECT userID FROM attendees WHERE EVENTID = '$eventID'");
            $attendeeslist = resultToArray($query);
            $length = count($attendeeslist);
            for ($i = 0; $i < $length; $i++) 
            {
                $namedata = mysqli_query($mysqli,"SELECT username FROM user WHERE id = '$attendeeslist[0]['name']'");
                $name = resultToArray($namedata);
                print_r($name[0]['username']);
                echo" /n";
            }
            
        
        echo"
         
                    $.Dialog.title('Attendees');
                    $.Dialog.content(content);
                    $.Metro.initInputs();
                }
            });
        });
    </script>";
    ?>
        
        
             
    </body>
</html>

 

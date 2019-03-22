
<!doctype html>
<html lang="fr" style="height: 100%;">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Tweets Analyzer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css-circular-prog-bar.css" type="text/css" />
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:700);
        *,
        *:before,
        *:after {
          box-sizing: border-box;
        }
        
        html,
        body {
          background: #ecf0f1;
          color: #444;
          font-family: 'Lato', Tahoma, Geneva, sans-serif;
          font-size: 16px;
          padding: 10px;
        }
        
        .set-size {
          font-size: 10em;
        }
        
        .charts-container:after {
          clear: both;
          content: '';
          display: table;
        }
        
        .pie-wrapper {
          height: 1em;
          width: 1em;
          float: left;
          margin: 15px;
          position: relative;
        }
        .pie-wrapper:nth-child(3n + 1) {
          clear: both;
        }
        .pie-wrapper .pie {
          height: 100%;
          width: 100%;
          clip: rect(0, 1em, 1em, 0.5em);
          left: 0;
          position: absolute;
          top: 0;
        }
        .pie-wrapper .pie .half-circle {
          height: 100%;
          width: 100%;
          border: 0.1em solid #3498db;
          border-radius: 50%;
          clip: rect(0, 0.5em, 1em, 0);
          left: 0;
          position: absolute;
          top: 0;
        }
        .pie-wrapper .label {
          background: #34495e;
          border-radius: 50%;
          bottom: 0.4em;
          color: #ecf0f1;
          cursor: default;
          display: block;
          font-size: 0.25em;
          left: 0.4em;
          line-height: 2.8em;
          position: absolute;
          right: 0.4em;
          text-align: center;
          top: 0.4em;
        }
        .pie-wrapper .label .smaller {
          color: #bdc3c7;
          font-size: .45em;
          padding-bottom: 20px;
          vertical-align: super;
        }
        .pie-wrapper .shadow {
          height: 100%;
          width: 100%;
          border: 0.1em solid #bdc3c7;
          border-radius: 50%;
        }
        .pie-wrapper.style-2 .label {
          background: none;
          color: #7f8c8d;
        }
        .pie-wrapper.style-2 .label .smaller {
          color: #bdc3c7;
        }
        .pie-wrapper.progress-30 .pie .half-circle {
          border-color: #3498db;
        }
        .pie-wrapper.progress-30 .pie .left-side {
          -webkit-transform: rotate(108deg);
                  transform: rotate(108deg);
        }
        .pie-wrapper.progress-30 .pie .right-side {
          display: none;
        }
        .pie-wrapper.progress-60 .pie {
          clip: rect(auto, auto, auto, auto);
        }
        .pie-wrapper.progress-60 .pie .half-circle {
          border-color: #9b59b6;
        }
        .pie-wrapper.progress-60 .pie .left-side {
          -webkit-transform: rotate(216deg);
                  transform: rotate(216deg);
        }
        .pie-wrapper.progress-60 .pie .right-side {
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
        }
        .pie-wrapper.progress-90 .pie {
          clip: rect(auto, auto, auto, auto);
        }
        .pie-wrapper.progress-90 .pie .half-circle {
          border-color: #e67e22;
        }
        .pie-wrapper.progress-90 .pie .left-side {
          -webkit-transform: rotate(324deg);
                  transform: rotate(324deg);
        }
        .pie-wrapper.progress-90 .pie .right-side {
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
        }
        .pie-wrapper.progress-45 .pie .half-circle {
          border-color: #1abc9c;
        }
        .pie-wrapper.progress-45 .pie .left-side {
          -webkit-transform: rotate(162deg);
                  transform: rotate(162deg);
        }
        .pie-wrapper.progress-45 .pie .right-side {
          display: none;
        }
        .pie-wrapper.progress-75 .pie {
          clip: rect(auto, auto, auto, auto);
        }
        .pie-wrapper.progress-75 .pie .half-circle {
          border-color: #8e44ad;
        }
        .pie-wrapper.progress-75 .pie .left-side {
          -webkit-transform: rotate(270deg);
                  transform: rotate(270deg);
        }
        .pie-wrapper.progress-75 .pie .right-side {
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
        }
        .pie-wrapper.progress-95 .pie {
          clip: rect(auto, auto, auto, auto);
        }
        .pie-wrapper.progress-95 .pie .half-circle {
          border-color: #e74c3c;
        }
        .pie-wrapper.progress-95 .pie .left-side {
          -webkit-transform: rotate(342deg);
                  transform: rotate(342deg);
        }
        .pie-wrapper.progress-95 .pie .right-side {
          -webkit-transform: rotate(180deg);
                  transform: rotate(180deg);
        }
        
        .pie-wrapper--solid {
          border-radius: 50%;
          overflow: hidden;
        }
        .pie-wrapper--solid:before {
          border-radius: 0 100% 100% 0 / 50%;
          content: '';
          display: block;
          height: 100%;
          margin-left: 50%;
          -webkit-transform-origin: left;
                  transform-origin: left;
        }
        .pie-wrapper--solid .label {
          background: transparent;
        }
        .pie-wrapper--solid.progress-65 {
          background: linear-gradient(to right, #e67e22 50%, #34495e 50%);
        }
        .pie-wrapper--solid.progress-65:before {
          background: #e67e22;
          -webkit-transform: rotate(126deg);
                  transform: rotate(126deg);
        }
        .pie-wrapper--solid.progress-25 {
          background: linear-gradient(to right, #9b59b6 50%, #34495e 50%);
        }
        .pie-wrapper--solid.progress-25:before {
          background: #34495e;
          -webkit-transform: rotate(-270deg);
                  transform: rotate(-270deg);
        }
        .pie-wrapper--solid.progress-88 {
          background: linear-gradient(to right, #3498db 50%, #34495e 50%);
        }
        .pie-wrapper--solid.progress-88:before {
          background: #3498db;
          -webkit-transform: rotate(43.2deg);
                  transform: rotate(43.2deg);
        }

    </style>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      
      .bg-light {
          background-color: #45c0fd!important;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .progress {
                height: 300px;
            }
            .progress > svg {
                height: 100%;
                display: block;
            }
    </style>
    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">
  </head>
  <body class="bg-light" style="height: 100%;">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0" href="#">Tweet Analyzer</a>
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2 input_search" type="text" placeholder="Search" aria-label="Search">
      <button id="search" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="nav-scroller bg-white shadow-sm">
  <nav class="nav nav-underline">
    <a class="nav-link active" href="#">Dashboard</a>
    <a class="nav-link" href="#">
      Friends
      <span class="badge badge-pill bg-light align-text-bottom">27</span>
    </a>
    <a class="nav-link" href="#">Explore</a>
    <a class="nav-link" href="#">Suggestions</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
    <a class="nav-link" href="#">Link</a>
  </nav>
</div>

<main role="main" class="container" style="margin-top : 75px">
    
  <div class="alert alert-dark" role="alert" style="background-color: #45c0fd; border-color: #45c0fd">
      <br>
      <h1 style="color : white">Rechercher un sujet sur Twitter </h1>
      <div class="row">
        <div class="input-group input-group-sm mb-3 col-md-10">
          <input type="text" name="YourSearch" placeholder="Entrer un sujet à rechercher ici" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="col-md-2">
            <button id="search" type="button" class="btn btn-warning">Rechercher</button>
        </div>

      </div>
      
    </div>

 <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Taux de satisfaction</h6>
        <br>
        <div class="container">
         
        <div class="progress" style="height : 20px; color: black">
         
          <div name="progress_happy" class="progress-bar" style="width:5%; background-color: #28a745" role="progressbar">0%</div>
         
        </div>
        
        </div>
        <br>
     <h6 class="border-bottom border-gray pb-2 mb-0">Taux d'insatisfaction</h6>
        <br>
        <div class="container">
         
        <div class="progress" style="height : 20px; color: black">
         
          <div name="progress_angry" class="progress-bar" style="width:4%; background-color : red" role="progressbar">0%</div>
         
        </div>
         
        </div>
    <small class="d-block text-right mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div> 
  <div id="listTweets" class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Resultats des tweets</h6>
    <!--<div class="pie-wrapper pie-wrapper--solid progress-88" style="transform : scale(4.5)"><span class="label">88<span class="smaller">%</span></span></div>-->
  </div>
</main>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/offcanvas/">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="circle-progress.js"></script>
    
<script>
$(document).ready(function () {
  console.log( "ready!" );
        $('#search').click(function()
            {
                console.log('button clicked');
            }
        );
        $('.btn').click(function()
            {
                console.log($('input[name=YourSearch]').val());
                $('div').remove('.row_answer');
                //$('.zone').append(      $('#local-SQY, #gg-SQY')[0]); 
                var requestTranslateAndGetUrl = $.ajax({
                  url: "https://twitter-boysband98.c9users.io/tweet_analyze.php?param="+$('input[name=YourSearch]').val(),
                  dataType: 'json',
                  type: 'get',
                  contentType: 'application/json',
                  //data: JSON.stringify( { "param": $('#input_search').val()} ),
                  processData: false,
                  success: function( data, textStatus, jQxhr ){
                      //console.log(data);
                      console.log('success');
                      let somme = 0;
                      let nbOccurences = 0;
                      $.each(data.documents, function(k, v) {
                            //console.log(v);
                             $( "#listTweets" ).append('<div class="row row_answer"><div class="media text-muted pt-3 col-md-10"><img src="'+v.photo+'" width="40" height="40"/><p style="margin-left: 20px;"class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"><strong class="d-block text-gray-dark">'+v.username+'</strong>'+v.text+'</p></div><div class="col-md-2"><!--<div class="set-size charts-container">--><div class="pie-wrapper pie-wrapper--solid progress-'+parseInt(v.happy_note*100)+'" style="transform : scale(4.5); top : 25%;"><span class="label">'+parseInt(v.happy_note*100)+'<span class="smaller">%</span></span></div><!--</div>--></div></div>');
                             somme += parseInt(v.happy_note*100);
                             nbOccurences++;
                             
                        });
                        
                        console.log(somme);
                        console.log(nbOccurences);
                        let moyenne = somme/nbOccurences;
                        $('div[name=progress_angry]').css("width",(100-moyenne)+"%")
                        $('div[name=progress_happy]').css("width",moyenne+"%");
                        $('div[name=progress_happy]').empty()
                        $('div[name=progress_happy]').append(moyenne+"%");
                        $('div[name=progress_angry]').empty()
                        $('div[name=progress_angry]').append((100-moyenne)+"%");
                  },
                  error: function( jqXhr, textStatus, errorThrown ){
                      console.log('error');
                      console.log(jqXhr.responseText);
                    //   jqXhr.responseText.each(function(){
                    //       console.log('ok')
                    //   })
                    //   $.each(jqXhr, function(k, v) {
                    //         console.log(data);
                    //     });
                        //   $( "#listTweets" ).append('<div class="media text-muted pt-3"><svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg><p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"><strong class="d-block text-gray-dark">@username</strong>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p></div>');
                 
                  },
                });
            }
        );
});
    $( document ).ready(function() {
        /* Examples */
(function($) {
  /*
   * Example 1:
   *
   * - no animation
   * - custom gradient
   *
   * By the way - you may specify more than 2 colors for the gradient
   */
  $('.first.circle').circleProgress({
    value: 0.35,
    animation: false,
    fill: {gradient: ['#ff1e41', '#ff5f43']}
  });

  /*
   * Example 2:
   *
   * - default gradient
   * - listening to `circle-animation-progress` event and display the animation progress: from 0 to 100%
   */
  $('.second.circle').circleProgress({
    value: 0.6
  }).on('circle-animation-progress', function(event, progress) {
    $(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
  });

  /*
   * Example 3:
   *
   * - very custom gradient
   * - listening to `circle-animation-progress` event and display the dynamic change of the value: from 0 to 0.8
   */
  $('.third.circle').circleProgress({
    value: 0.75,
    fill: {gradient: [['#0681c4', .5], ['#4ac5f8', .5]], gradientAngle: Math.PI / 4}
  }).on('circle-animation-progress', function(event, progress, stepValue) {
    $(this).find('strong').text(stepValue.toFixed(2).substr(1));
  });

  /*
   * Example 4:
   *
   * - solid color fill
   * - custom start angle
   * - custom line cap
   * - dynamic value set
   */
  var c4 = $('.forth.circle');

  c4.circleProgress({
    startAngle: -Math.PI / 4 * 3,
    value: 0.5,
    lineCap: 'round',
    fill: {color: '#ffa500'}
  });

  // Let's emulate dynamic value update
  setTimeout(function() { c4.circleProgress('value', 0.7); }, 1000);
  setTimeout(function() { c4.circleProgress('value', 1.0); }, 1100);
  setTimeout(function() { c4.circleProgress('value', 0.5); }, 2100);

  /*
   * Example 5:
   *
   * - image fill; image should be squared; it will be stretched to SxS size, where S - size of the widget
   * - fallback color fill (when image is not loaded)
   * - custom widget size (default is 100px)
   * - custom circle thickness (default is 1/14 of the size)
   * - reverse drawing mode
   * - custom animation start value
   * - usage of "data-" attributes
   */
  $('.fifth.circle').circleProgress({
    value: 0.7
    // all other config options were taken from "data-" attributes
    // options passed in config object have higher priority than "data-" attributes
    // "data-" attributes are taken into account only on init (not on update/redraw)
    // "data-fill" (and other object options) should be in valid JSON format
  });
})(jQuery);
    });
    
</script>
</body>
</html>
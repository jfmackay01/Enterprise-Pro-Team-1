<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<!---general header---->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>
    <?php
    require 'header.php';
    ?>
    <!-- css link -->
    <link rel="stylesheet" href="../css/standard.css">

</head>

<body>
    <div class="container4">
                    <!-- back button -->
                    <a class="back-btn" href="home.php" >Back</a>
            <h2>Dashboard</h2>
    </div>
    <!-----embedded Tableau dashboard code from Tableau public to display dashboard ----->

    <div class='tableauPlaceholder' id='viz1682904260188' style='position: relative'>
        <noscript>
            <a href='#'>
                <img alt='Evidence Impact Platform  ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ev&#47;EvidenceImpactPlatform&#47;EvidenceImpactPlatform&#47;1_rss.png' style='border: none' />
            </a>
        </noscript>
        <object class='tableauViz'  style='display:none;'>
            <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> 
            <param name='embed_code_version' value='3' /> 
            <param name='site_root' value='' />
            <param name='name' value='EvidenceImpactPlatform&#47;EvidenceImpactPlatform' />
            <param name='tabs' value='no' />
            <param name='toolbar' value='no' />
            <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ev&#47;EvidenceImpactPlatform&#47;EvidenceImpactPlatform&#47;1.png' /> 
            <param name='animate_transition' value='yes' />
            <param name='display_static_image' value='yes' />
            <param name='display_spinner' value='yes' />
            <param name='display_overlay' value='yes' />
            <param name='display_count' value='yes' />
            <param name='language' value='en-GB' />
            <param name='filter' value='publish=yes' />
            <param name='showShareOptions' value='false'/>
        </object>
    </div>     

    <!------ensure Tableau dashboard fits within the webpage----->
    <script type='text/javascript'>                    
        var divElement = document.getElementById('viz1682904260188');                    
        var vizElement = divElement.getElementsByTagName('object')[0];                    
        if ( divElement.offsetWidth > 800 ) { vizElement.style.width='1366px';vizElement.style.height='795px';} 
        else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='1366px';vizElement.style.height='795px';} 
        else { vizElement.style.width='100%';vizElement.style.height='1377px';}                     
        var scriptElement = document.createElement('script');                    
        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                   
        vizElement.parentNode.insertBefore(scriptElement, vizElement);                
    </script>
</body>

<!---footer--->
<div class="footer">
    <div class="container">
        <br><br><br>
        <hr>
        <p class="creator">Team 1 Enterprise Pro 2023 - University of Bradford</p>
    </div>
</div>
</html>

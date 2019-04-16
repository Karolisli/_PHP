<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP lydes ir <?php $d=strtotime('tomorrow'); print date('d', $d) ;?></title>
    </head>
    <body>
        <h1>Karolis</h1> PHP su manim buvo ir 
            <?php $d=strtotime('-1 hour'); print date('h', $d) ;?> valanda!
        <p><?php $d=strtotime('+1 year'); echo date('Y', $d) ;?> uz kalnu!</p>
    </body>
</html> 

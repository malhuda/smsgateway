<?php
    /*
     * Flot API */
    $type = $_GET["type"];

    /* bar chart */
    if($type == "bar") {
        sleep(2);

        // generate score
        $score = "";
        for ($i=1; $i <= 12; $i++) { 
            $month = DateTime::createFromFormat("!m", $i);
            $score .= '["'.$month->format("M").'", '.rand(10 , 100).'],';
        }

        $data = '{';
        $data .= '"label" : "Population",';
        $data .= '"color" : "#00B1E1",';
        $data .= '"data": ['.rtrim($score, ",").']';
        $data .= '},';

        echo '[';
        echo rtrim($data, ",");
        echo ']';
    }

    /* stacked bar chart */
    if($type == "barstacked") {
        sleep(2);

        // generate score
        $score1 = "";
        $score2 = "";

        for ($i=1; $i <= 12; $i++) { 
            $month = DateTime::createFromFormat("!m", $i);
            $score1 .= '["'.$month->format("M").'", '.rand(10 , 100).'],';
            $score2 .= '["'.$month->format("M").'", '.rand(10 , 150).'],';
        }

        $data = '{';
        $data .= '"label" : "Facebook",';
        $data .= '"color" : "#3b5998",';
        $data .= '"data" : ['.rtrim($score2, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Twitter",';
        $data .= '"color" : "#55acee",';
        $data .= '"data" : ['.rtrim($score1, ",").']';
        $data .= '}';

        echo '[';
        echo $data;
        echo ']';
    }

    /* area chart */
    if($type == "area") {
        sleep(2);

        // generate score
        $score1 = "";
        $score2 = "";

        for ($i=1; $i <= 7; $i++) { 
            $month = DateTime::createFromFormat("!m", $i);
            $score1 .= '["'.$month->format("M").'", '.rand(10 , 100).'],';
            $score2 .= '["'.$month->format("M").'", '.rand(10 , 150).'],';
        }

        $data = '{';
        $data .= '"label" : "Visits",';
        $data .= '"color" : "#7CA951",';
        $data .= '"data" : ['.rtrim($score2, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Hit",';
        $data .= '"color" : "#46C8C8",';
        $data .= '"data" : ['.rtrim($score1, ",").']';
        $data .= '}';

        echo '[';
        echo $data;
        echo ']';
    }

    /* spline area chart */
    if($type == "areaspline") {
        sleep(2);

        // generate score
        $score1 = "";
        $score2 = "";
        
        for ($i=1; $i <= 7; $i++) { 
            $month = DateTime::createFromFormat("!m", $i);
            $score1 .= '["'.$month->format("M").'", '.rand(10 , 100).'],';
            $score2 .= '["'.$month->format("M").'", '.rand(10 , 150).'],';
        }

        $data = '{';
        $data .= '"label" : "Visits",';
        $data .= '"color" : "#DC554F",';
        $data .= '"data" : ['.rtrim($score2, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Hit",';
        $data .= '"color" : "#9365B8",';
        $data .= '"data" : ['.rtrim($score1, ",").']';
        $data .= '}';

        echo '[';
        echo $data;
        echo ']';
    }

    /* line chart */
    if($type == "line") {
        sleep(2);

        // generate score
        $score1 = "";
        $score2 = "";
        $score3 = "";
        
        for ($i=1; $i <= 9; $i++) { 
            $month = DateTime::createFromFormat("!m", $i);
            $score1 .= '["'.$month->format("M").'", '.rand(80 , 110).'],';
            $score2 .= '["'.$month->format("M").'", '.rand(120 , 170).'],';
            $score3 .= '["'.$month->format("M").'", '.rand(180 , 210).'],';
        }

        $data = '{';
        $data .= '"label" : "Return",';
        $data .= '"color" : "#ac92ed",';
        $data .= '"data" : ['.rtrim($score3, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Visits",';
        $data .= '"color" : "#ed5466",';
        $data .= '"data" : ['.rtrim($score2, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Hit",';
        $data .= '"color" : "#4fc0e8",';
        $data .= '"data" : ['.rtrim($score1, ",").']';
        $data .= '}';

        echo '[';
        echo $data;
        echo ']';
    }

    /* spline line chart */
    if($type == "linespline") {
        sleep(2);

        // generate score
        $score1 = "";
        $score2 = "";
        $score3 = "";
        
        for ($i=1; $i <= 9; $i++) { 
            $month = DateTime::createFromFormat("!m", $i);
            $score1 .= '["'.$month->format("M").'", '.rand(80 , 110).'],';
            $score2 .= '["'.$month->format("M").'", '.rand(120 , 170).'],';
            $score3 .= '["'.$month->format("M").'", '.rand(180 , 210).'],';
        }

        $data = '{';
        $data .= '"label" : "Return",';
        $data .= '"color" : "#ac92ed",';
        $data .= '"data" : ['.rtrim($score3, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Visits",';
        $data .= '"color" : "#ed5466",';
        $data .= '"data" : ['.rtrim($score2, ",").']';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Hit",';
        $data .= '"color" : "#4fc0e8",';
        $data .= '"data" : ['.rtrim($score1, ",").']';
        $data .= '}';

        echo '[';
        echo $data;
        echo ']';
    }

    /* pie chart */
    if($type == "pie") {
        sleep(2);

        $data = '{';
        $data .= '"label" : "United States",';
        $data .= '"color" : "#00B1E1",';
        $data .= '"data" : 10';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Indonesia",';
        $data .= '"color" : "#91C854",';
        $data .= '"data" : 30';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "India",';
        $data .= '"color" : "#63D3E9",';
        $data .= '"data" : 90';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "United Kingdom",';
        $data .= '"color" : "#FFD66A",';
        $data .= '"data" : 70';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Mexico",';
        $data .= '"color" : "#ED5466",';
        $data .= '"data" : 80';
        $data .= '},';

        $data .= '{';
        $data .= '"label" : "Spain",';
        $data .= '"color" : "#6BCCB4",';
        $data .= '"data" : 110';
        $data .= '}';

        echo '[';
        echo $data;
        echo ']';
    }
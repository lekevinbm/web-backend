<?php
    $text = file_get_contents('./text-file.txt');
    $textChars = str_split($text);
    rsort($textChars);
    
    $SortedText = array_reverse($textChars);

        $tellerArray = array();

        foreach($SortedText as $value)
        {
            if ( isset ( $tellerArray[ $value ] ) )
            {
                $tellerArray[ $value ]++;
            }
            else
            {
                $tellerArray[ $value ] = 1;
            }

        }
?>
<!DOCTYPE html>

<html>
    <body>
        <p>
        <pre><?php  //var_dump($textChars) ?></pre>
        <<pre><?php var_dump($SortedText) ?></pre>
        <pre><?php //var_dump($tellerArray) ?></pre>
        </p>
    </body>
</html>
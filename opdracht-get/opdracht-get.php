<?php
    $artikels = array( array ('titel' =>'Malaria-eiwit effectief in bestrijding kanker',
                              'datum' =>'13/10/15','inhoud' =>'Onderzoekers van de Deense Universiteit van Kopenhagen en van de Canadese Universiteit van British Columbia hebben een baanbrekende ontdekking gedaan die kan helpen bij de ontwikkeling van nieuwe behandelingen van kanker. Daarbij schakelen ze een eiwit van de malariaparasiet in om kankercellen aan te vallen.',  
                              'afbeelding' => 'img/artikel1.jpg',
                              'afbeeldingbeschrijving' => 'Een rode bloedcel geïnfecteerd met malaria'),
                      array('titel' => 'U2 pakt uitverkocht Sportpaleis in met knalprestatie',
                            'datum' => '14/10/15',
                            'inhoud' =>'In het Antwerpse Sportpaleis heeft U2 gisterenavond zijn eerste van twee al sinds vorig jaar hopeloos uitverkochte concertavonden afgewerkt. De Ierse rockband deed zijn live- én showreputatie alle eer aan met een oorverdovende set en indrukwekkende video-effecten, maar liet naar goede gewoonte niet na stil te staan bij zwaarwichtige themas als de Europese vluchtelingencrisis.',
                            'afbeelding'=>'img/artikel2.jpg', 
                            'afbeeldingbeschrijving' => 'De band U2 op het podium'),
                      array('titel' =>'Rapport: De Bruyne blinkt uit, Lukaku valt tegen',
                            'datum' => '13/10/15','inhoud' => 'De Rode Duivels verdienden voor hun historische 3-1 overwinning tegen Israël een dikke 7 voor de gave collectieve prestatie. Maar wie waren de uitblinkers en wie viel tegen? Uitblinker was nog maar eens goudhaantje Kevin De Bruyne die een oververdiende 8 oogstte. Romelu Lukaku van zijn kant kon weer niet overtuigen bij de Duivels en kwam niet verder dan een povere 5.',
                            'afbeelding' => 'img/artikel3.jpg', 
                            'afbeeldingbeschrijving' => 'Kevin De Bruyne verdiende een 8'));
 
$invidueel = false;
    
 if ( isset($_GET[ 'id' ] ) )
    {
        
     $id = $_GET['id'];
     
     $invidueeel = true;
     $artikels 			= 	array( $artikels[$id] );
        
    }
        
?>
<!DOCTYPE html>
<html>
    <?php if(!$invidueel): ?>    
    <title>krantjeeuuh </title>
    <?php else : ?>
    <title>Artikel: <?php echo $artikel['titel'] ?></title>
    <?php endif ?>
    
    <style>
        img{
            width : 100%;  
        }
        
        article{
            text-overflow: ellipsis;
            width: 400px;
            padding: 10px;
            float:left;
            
            
        }
    </style>
    
    <body>
        <h1>Krantjeeeuh</h1>
        
        <div>
            <?php foreach ($artikels as $id => $artikel): ?>
            <article>
                <h2> <?php echo $artikel['titel'] ?> </h2>
                <p> <?php  echo $artikel['datum'] ?></p>
                <img src=" <?php echo $artikel['afbeelding'] ?> ">
                <p> <?php echo substr($artikel['inhoud'],0,50).'...' ?> </p>
                <a href="opdracht-get.php?<?php echo $id ?>=0">lees meer</a>
            </article>
            <?php endforeach ?>
    </body>
</html>
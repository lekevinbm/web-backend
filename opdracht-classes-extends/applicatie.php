<?php
    function __autoload($classname){
        include 'classes/'.$classname.'.php';
    }

    $dier1 = new Animal('koe','man',50);
    $dier2 = new Animal('paard','vrouw',70);
    $dier3 = new Animal('hond','man',35);
    $dier3->changeHealth(10);

    $dier4 = new Lion('Simba','man',100,'Congo Lion');
    $dier5 = new Lion('Scar','man',100,'Kenya Lion');
    $dier6 = new Zebra('Zeke','man',100,'Quagga');
    $dier7 = new Zebra('Zana','man',100,'Selous');
    
?>
<!DOCTYPE html>
<html>
    <body>
        <h2>Animal klasse</h2>
        <table>
            <tr>
                <td>Name</td>
                <td>Gender</td>
                <td>Health</td>
                <td>move</td>
            </tr>
            <tr>
                <td><?php echo $dier1->getName() ?></td>
                <td><?php echo $dier1->getGender() ?></td>
                <td><?php echo $dier1->getHealth() ?></td>
            </tr>
            <tr>
                <td><?php echo $dier2->getName() ?></td>
                <td><?php echo $dier2->getGender() ?></td>
                <td><?php echo $dier2->getHealth() ?></td>
            </tr>
            <tr>
                <td><?php echo $dier3->getName() ?></td>
                <td><?php echo $dier3->getGender() ?></td>
                <td><?php echo $dier3->getHealth() ?></td>
                <td><?php echo $dier3->doSpecialMove() ?></td>
            </tr>
        </table>
        
        <h2>Lion klasse</h2>
        <table>
            <tr>
                <td>Name</td>
                <td>soort</td>
                <td>move</td>
            </tr>
            <tr>
                <td><?php echo $dier4->getName() ?></td>
                <td><?php echo $dier4->getSpecies() ?></td>
                <td><?php echo $dier4->doSpecialMove() ?></td>
            </tr>
            <tr>
                <td><?php echo $dier5->getName() ?></td>
                <td><?php echo $dier5->getSpecies() ?></td>
                <td><?php echo $dier5->doSpecialMove() ?></td>
            </tr>
        </table>
            <h2>Zebra klasse</h2>
        <table>
            <tr>
                <td>Name</td>
                <td>soort</td>
                <td>move</td>
            </tr>
            <tr>
                <td><?php echo $dier6->getName() ?></td>
                <td><?php echo $dier6->getSpecies() ?></td>
                <td><?php echo $dier6->doSpecialMove() ?></td>
            </tr>
            <tr>
                <td><?php echo $dier7->getName() ?></td>
                <td><?php echo $dier7->getSpecies()  ?></td>
                <td><?php echo $dier7->doSpecialMove() ?></td>
            </tr>
        </table>
    </body>
</html>
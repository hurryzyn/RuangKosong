<table class="table">
    <thead>
    <tr>
        <?php 
        if ($selectedMenu == "home"){
            echo $homeHeaderTable;
        } else {
            echo $officeSpaceHeaderTable;
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php 
        echo $tableContent;
    ?>
    </tbody>
</table>
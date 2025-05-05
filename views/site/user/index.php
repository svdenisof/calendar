<?php
use app\models\Month;

/** @var app\models\Month $month */
?>

<h4><span class="badge text-bg-light"><?=Month::getMonthMap($month['month']);?></span></h4>

<div class="container text-center">
    <?php
        $point = 1;
        $monthDay = 1;
        for($i = 1; $i <= $month['weeks']; $i++):
    ?>
    <div class="row">
        <?php for($j = 1; $j <= 7; $j++):
            $validMonthDay = $point >= $month['first_day'] && $point <= $month['last_day'];
            ?>
        <div class="col<?php
            if($validMonthDay) {
                print ' bg-secondary-subtle"';
                print ' data-id="'. 'day-' . $month['month'] . '-' . $monthDay . '"';
            }
            else
            {
                print '"';
            }
            ?>>
            <?php
                if($validMonthDay){
                    print "<p>" . $monthDay++ . "</p>";

                }
            ?>
        </div>
        <?php
            $point++;
            endfor;
            ?>
    </div>
    <?php
endfor;?>
</div>
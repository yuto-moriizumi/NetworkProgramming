
{
<?php foreach ($wcResults as $line):?>
    <?=$line->team_id0?>:"<?=$line->wc_team0_name?>",
    <?=$line->team_id1?>:"<?=$line->wc_team1_name?>",
<?php endforeach;?>
}
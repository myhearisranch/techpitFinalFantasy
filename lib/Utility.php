<!--プロジェクト全体で使えそうな関数などをここで定義し、読み込む-->

<?php

function isFinish($objects)
{
    $deathCnt = 0;
    foreach ($objects as $object) {
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    
    if($deathCnt === count($objects)) {
        return true;
    }
}
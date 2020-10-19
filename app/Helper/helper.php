

<?php

function categorySeperator( $string = '', $size ) {
for ( $i = 2; $i < $size; $i ++ ) {
$string .= $string;
}

return $string;
}

function deal_date($date)
{
$deal=App\Model\Deal::where('id','=',1)->first();
if ($deal != null)
{
    return $deal->date;
}
return null;

}
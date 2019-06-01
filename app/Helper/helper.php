

<?php

function categorySeperator( $string = '', $size ) {
for ( $i = 2; $i < $size; $i ++ ) {
$string .= $string;
}

return $string;
}
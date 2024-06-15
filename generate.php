<?php
// if (isset($_POST['generate'])) {
$code = 'abcder';
echo "<center>
		<a download href='barcode.php?codetype=Code39&size=50&text=" . $code . "&print=true'>
		download
		</a>
		<img alt='testing' src='barcode.php?codetype=Code39&size=50&text=" . $code . "&print=true'/></center>";
// }

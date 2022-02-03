<?php
require_once '../pdf/dompdf_config.inc.php';
$html = '
<html>
<head>
  <style>
    @page { margin: 180px 50px; }
    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: lightblue; }
    #footer .page:after { content: counter(page, upper-roman); }
  </style>
<body>
  <div id="header">
    <h1>ibmphp.blogspot.com</h1>
  </div>
  <div id="footer">
    <p class="page"><a href="ibmphp.blogspot.com"></a></p>
  </div>
  <div id="content">
    <p><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
    <p style="page-break-before: always;"><a href="ibmphp.blogspot.com">ibmphp.blogspot.com</a></p>
  </div>
</body>
</html>
';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("paulsmith.pdf");
?>
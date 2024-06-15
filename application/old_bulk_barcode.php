


<section style = "margin-left:10% !important;">




<button onclick="printDiv('my-node')" class="btn btn-danger">
    Print
</button>
<?php

$i = 1;

?>

<div class=" bg-light mb-3" style="max-width: 18rem;" id="my-node">
    <div  style="font-weight: bold;">

        <?php
       
        if ($barcode_array) {
            foreach ($barcode_array as $po) {
                // echo $poo->part_number;
                $parts = $this->Crud->get_data_by_id("parts", $po["part_id"], "id");





        ?>



                <p  style="font-size:20px; margin-bottom:50px;">Part No :<?php echo $parts[0]->part_number; ?>
                    <br>
                    Qty : <?php echo $po["part_qty"]; ?>
                    <br>
                    Pkg Date : <?php echo $po["created_time"]; ?>
                    <br>
                    Bar Code: <?php echo $po["barcode"]; ?>
                    <br>
                    <?php
                    $code = $po["barcode"];
                    require 'vendor/autoload.php';
                    $code = $po["barcode"];
                    // This will output the barcode as HTML output to display in the browser
                    // $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                    // echo $generator->getBarcode($code, $generator::TYPE_CODE_128);
                    // echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode('081231723897', $generator::TYPE_CODE_128)) . '">';
                   // $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    //echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';

                    ?>
                   
                    <svg class = "barcode<?php echo $i?>"></svg>
                    <span class ="qrcode<?php echo $i;?>">




                    <!-- <span style="font-size:12px">
                        Talbros Automotive Components Ltd. Pune
                    </span> -->
                </p>
                <script>
                    function printDiv(id) {
                        var divContents = document.getElementById(id).innerHTML;
                        var a = window.open('', '', 'height=500, width=500');
                        a.document.write('<html>');
                        a.document.write('<body >');
                        a.document.write(divContents);
                        a.document.write('</body></html>');
                        a.document.close();
                        a.print();
                    }
                </script>

                <!-- <script>
                    var node = document.getElementById('my-node');
                    var btn = document.getElementById('foo<?php echo $i ?>');
                    btn.onclick = function() {
                        // node.innerHTML = "I'm an image now."
                        domtoimage.toBlob(document.getElementById('my-node<?php echo $i ?>')).then(function(blob) {
                            window.saveAs(blob, '<?php echo $parts[0]->part_number; ?>.png');
                        });
                    }
                </script> -->
                <script>
                    JsBarcode(".barcode<?php echo $i;?>","12345" , {
                                                               
                        lineColor: "black",
                        height:40,
                        displayValue: false
                    });

                    var qrData = 'part no : <?php echo $parts[0]->part_number;?>' + "\n" +  'Quantity : <?php echo $po["part_qty"];?>' + "\n" + 'Date : <?php echo $po["created_time"];?>'+ "\n" + 'Part Description :<?php echo  $parts[0]->part_description;?>' + "\n" + 'Vendor Code : <?php echo  $parts[0]->vendor_code;?>'; 
                    //  this is for generation of qr code
                    var qrcode = new QRCode(document.querySelector(".qrcode<?php echo $i;?>"), {
                        text: qrData,
                        width: 128,
                        height: 128,
                        colorDark : "#5868bf",
                        colorLight : "#ffffff",
                        correctLevel : QRCode.CorrectLevel.H
                    });






                </script>












        <?php
                $i++;
            }
        }
        ?>

    </div>
</div>
</section>


<!-- <button id="foo<?php //echo $i ?>" class="btn btn-info">
    Download
</button> -->
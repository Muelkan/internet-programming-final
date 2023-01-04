<?php
$kur = simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");

foreach ($kur -> Currency as $cur) {
	if ($cur["Kod"] == "USD") {
		$usdAlis  = $cur -> ForexBuying;
		$usdSatis = $cur -> ForexSelling;
	}

	if ($cur["Kod"] == "EUR") {
		$eurAlis  = $cur -> ForexBuying;
		$eurAlis = $cur -> ForexSelling;
	}
  if ($cur["Kod"] == "AUD") {
		$audAlis  = $cur -> ForexBuying;
		$audAlis = $cur -> ForexSelling;
	}
  if ($cur["Kod"] == "GBP") {
		$gbpAlis  = $cur -> ForexBuying;
		$gbpAlis = $cur -> ForexSelling;
	}
  if ($cur["Kod"] == "GBP") {
		$gbpAlis  = $cur -> ForexBuying;
		$gbpAlis = $cur -> ForexSelling;
	}
  if ($cur["Kod"] == "KWD") {
		$kwdAlis  = $cur -> ForexBuying;
		$kwdAlis = $cur -> ForexSelling;
	}
}
?>


<div style=width:15%>
            <h3>Döviz Kuru</h3>
            <hr>
            <b>USD Alış: </b> <?php echo $usdAlis; ?> <br>
            <b>USD Satış: </b> <?php echo $usdSatis; ?>
            <hr>
            <b>EURO Alış: </b> <?php echo $eurAlis; ?> <br>
            <b>EURO Satış: </b> <?php echo $eurAlis; ?>
            <hr>
            <b>AUD Alış: </b> <?php echo $audAlis; ?> <br>
            <b>AUD Satış: </b> <?php echo $audAlis; ?>
            <hr>
	          <b>GBP Alış: </b> <?php echo $gbpAlis; ?> <br>
	          <b>GBP Satış: </b> <?php echo $gbpAlis; ?>
            <hr>
           <b>KWD Alış: </b> <?php echo $kwdAlis; ?> <br>
	         <b>KWD Satış: </b> <?php echo $kwdAlis; ?>
           
                 </div>
          </div>
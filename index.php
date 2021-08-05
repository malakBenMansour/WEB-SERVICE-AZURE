<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s013">
		
      <form action="" method="POST" > 
        <fieldset>
          <legend>FIND A COVID CENTER NEAR YOU</legend>
        </fieldset>
        <div class="inner-form">
          <div class="left">
            <div class="input-wrap first">
              <div class="input-field first">
                <label>LOCATION</label>
                <input type="text" name= "location" placeholder="ex: Lagos mainland, Victoria Island" />
              </div>
            </div>
            <div class="input-wrap second">
              <div class="input-field second">
                <label>CENTER TYPE</label>
                <div class="input-select">
                  <select data-trigger="" name="centertpe">
                    <option value="Vaccine"> Vacinnation Center</option>
                    <option value = "Test"> Test Center</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <input class="btn-search" type="submit" name="sbtn">SEARCH</button>
        </div>

	<?php 
	    if(isset($_POST['sbtn'])){
		$location = $_POST['location'];
		$centertype = $_POST['centertype'];
	    if($centertype = 'test'){

		// PHP Data Objects(PDO) Sample Code:
		try {
			$conn = new PDO("sqlsrv:server = tcp:chisomjude.database.windows.net,1433; Database = covidcenter", "chisomjude", "{your_password_here}");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e) {
			print("Error connecting to SQL Server.");
			die(print_r($e));
		}

		// SQL Server Extension Sample Code:
		$connectionInfo = array("UID" => "chisomjude", "pwd" => "Favoured0205", "Database" => "covidcenter", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
		$serverName = "tcp:chisomjude.database.windows.net,1433";
		$conn = sqlsrv_connect($serverName, $connectionInfo);


       # Start form processing if test center

		$sqlquery = "SELECT * FROM covid_center WHERE center_location ='Lagos, Mainland' ";
		$sqlquery = mysqli_query($conn, $sqlquery);
		?>

		<table>
			<thead>
				<th>Search Result for </th>
			</thead>
			<tbody> 
			<tr>
					<td>Id</td>
					<td>Center Name </td>
					<td>Center Location and Address</td>
					<td>Contact </td>
					<td>Center Type</td>
					
			</tr>
				<?php
				while ($data = mysqli_fetch_row($sqlquery)
				){
					$x = 0;
					$x++
					?>
				<tr>
					<td><?php echo $x; ?></td>
					<td><?php echo $data['center_name'] ?></td>
					<td><?php echo $data['center_location']. "<br>" . $data['center_address'] ?></td>
					<td><?php echo $data['center_contact'] ?></td>
					<td><?php echo $data['center_type'] ?></td>
				</tr>
					<?php }?>
				
			</tbody>
		</table>
	<?php } #close if of testcenter
			else{
				echo "<h3> Vacination Centers are not yet Available on our Website. Please check back soon </h3>";
			 }
	}?>	
</form>
      
	  </div>
	  <footer> 
		<div align="Center">
		  <marquee behavior="" direction="left">
			<h4>Design  By Chisom Jude for ALC <small>Frontend template by Colorlib, Content extracted from NCDC Website</small></h4>
		  </marquee>
		</div>
	  </footer>
	 
	</body>
  </html>
  
<?php
function getDrinks($_db)
{
    $query = "SELECT drinkid, drinkname, drink1, drink2, drink3, drink4 FROM drinks ORDER BY drinkid DESC";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {   
        $output = $output . '<div class="col-md-4 col-sm-6 portfolio-item">
            <a href="#SavedModal' . $row['drinkid'] . '" class="portfolio-link" data-toggle="modal">
            	<img class="img-responsive" height="250" src="img/Mix_Maker_Main_Logo.png" alt="">
            </a>
            <div class="portfolio-caption">
                <h4>' . $row['drinkname'] . '</h4>
            </div>
        </div>';
    }
    
    return $output;
}

function getDrinkModals($_db)
{
    $query = "SELECT drinkid, drinkname, drink1, drink2, drink3, drink4 FROM drinks ORDER BY drinkid DESC";
    
    if(!$result = $_db->query($query))
    {
        die('There was an error running the query [' . $_db->error . ']');
    }
    
    $output = '';
    while($row = $result->fetch_assoc())
    {   
        $output = $output . '<div class="portfolio-modal modal" id="SavedModal' . $row['drinkid'] . '" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="close-modal" data-dismiss="modal">
					<div class="lr">
						<div class="rl">
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="modal-body">
								<!-- Drink Details Go Here -->
								<div class="row">
									<h2>' . $row['drinkname'] . '</h2>
								</div>
								<div class="row">
										<img class="img-responsive" height="250" src="img/Mix_Maker_Main_Logo.png" alt="">
								</div>
								<!--<a href="#anylink" class="ui-btn">Make Drink</a>-->
								<!--<a href="#pagetwo" class="ui-btn ui-btn-inline" data-dismiss="modal">Make Drink</a>-->
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="MakeDrink(' . $row['drink1'] . ',' . $row['drink2'] . ',' . $row['drink3'] . ',' . $row['drink4'] . ')" data-theme="f">Make Drink</button>
                                    </div>
								</div>
								<div class="row">
                                    <div class="col-sm-6 col-sm-offset-3 text-center">
									   <button class="btn btn-primary ui-btn ui-btn-e ui-shadow ui-corner-all" data-dismiss="modal" data-theme="e"><i class="fa fa-times"></i> Back</button>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>';
    }
    
    return $output;
}
?>
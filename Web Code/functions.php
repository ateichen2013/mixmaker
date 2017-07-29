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
            <a href="#SavedModal' . $row['drinkid'] . '" class="portfolio-link" data-toggle="modal" align="center">
            	<img class="img-centered" src="img/Mix_Maker_Main_Logo.png" height="217.58" alt="">
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
                                    <div class="col-sm-3 text-right">
                                        <h3 class="sliderlabel">Apple</h3>
                                    </div>
                                    <div class="col-sm-6 div-slider">
                                        <input type="range" class="saveslider" id="slider1" value="' . $row['drink1'] . '" min="0" max="100" data-highlight="true" data-theme="a" data-disabled="false"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right">
                                        <h3 class="sliderlabel">Fruit Punch</h3>
                                    </div>
                                    <div class="col-sm-6 div-slider">
                                        <input type="range" class="saveslider" id="slider2" value="' . $row['drink2'] . '" min="0" max="100" data-highlight="true" data-theme="b" data-disabled="true"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right">
                                        <h3 class="sliderlabel">Grape</h3>
                                    </div>
                                    <div class="col-sm-6 div-slider">
                                        <input type="range" class="saveslider" id="slider3" value="' . $row['drink3'] . '" min="0" max="100" data-highlight="true" data-theme="c" data-disabled="true"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3 text-right">
                                        <h3 class="sliderlabel">Lemonade</h3>
                                    </div>
                                    <div class="col-sm-6 div-slider">
                                        <input type="range" class="saveslider" id="slider4" value="' . $row['drink4'] . '" min="0" max="100" data-highlight="true" data-theme="d" data-disabled="true"/>
                                    </div>
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
                                        <button class="btn btn-primary ui-btn ui-btn-f ui-shadow ui-corner-all" onclick="DeleteDrink(' . $row['drinkid'] . ')" data-theme="f">Delete</button>
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
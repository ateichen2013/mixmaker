<?php
function SavePostToDB($_db, $_user, $_title, $_text, $_time, $_file_name, $filter)
{
	/* Prepared statement, stage 1: prepare query */
	if (!($stmt = $_db->prepare("INSERT INTO WALL(USER_USERNAME, STATUS_TITLE, STATUS_TEXT, TIME_STAMP, IMAGE_NAME, FILTER) VALUES (?, ?, ?, ?, ?, ?)")))
	{
		echo "Prepare failed: (" . $_db->errno . ") " . $_db->error;
	}

	/* Prepared statement, stage 2: bind parameters*/
	if (!$stmt->bind_param('ssssss', $_user, $_title, $_text, $_time, $_file_name, $filter))
	{
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	/* Prepared statement, stage 3: execute*/
	if (!$stmt->execute())
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
}

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
            <img src="img/Preset_Logo_1.png" class="img-responsive" alt="">
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
									<img class="img-centered" height="250" src="img/Preset_Logo_1.png" alt="">
								</div>
								<!--<a href="#anylink" class="ui-btn">Make Drink</a>-->
								<!--<a href="#pagetwo" class="ui-btn ui-btn-inline" data-dismiss="modal">Make Drink</a>-->
								<div class="row">
									<button type="button" class="btn btn-primary" onclick="MakeDrink(' . $row['drink1'] . ',' . $row['drink2'] . ',' . $row['drink3'] . ',' . $row['drink4'] . ')">Make Drink</button>
								</div>
								<br>
								<div class="row">
									<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Back</button>
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
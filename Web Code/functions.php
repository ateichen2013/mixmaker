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
            <a href="#SavedModal1" class="portfolio-link" data-toggle="modal">
            <img src="img/Preset_Logo_1.png" class="img-responsive" alt="">
            </a>
            <div class="portfolio-caption">
                <h4>' . $row['drinkname'] . '</h4>
            </div>
        </div>';
    }
    
    return $output;
}
?>
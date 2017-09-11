<?php

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "$row['min_value']"."<br>";
    }
} else {
    echo "0 results";
}
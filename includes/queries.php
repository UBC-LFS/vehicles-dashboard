<?php

$query = array (
  "Today" => "SELECT mrbs_entry.id,FROM_UNIXTIME(start_time) as date_time, mrbs_room.room_name, name, user_email FROM mrbs_entry JOIN mrbs_room ON mrbs_room.id = mrbs_entry.room_id WHERE start_time >= UNIX_TIMESTAMP(CURDATE()) and start_time < UNIX_TIMESTAMP(CURDATE() + INTERVAL 1 day) and mrbs_room.area_id=1",
  "Next 7 days" => "SELECT mrbs_entry.id, FROM_UNIXTIME(start_time) as date_time, mrbs_room.room_name, name, user_email FROM mrbs_entry JOIN mrbs_room ON mrbs_room.id = mrbs_entry.room_id WHERE start_time >= UNIX_TIMESTAMP(CURDATE() + INTERVAL 1 DAY) and start_time < UNIX_TIMESTAMP(CURDATE() + INTERVAL 8 DAY) and mrbs_room.area_id=1",
);

$pending_q = "SELECT COUNT(*) AS cnt FROM mrbs_entry WHERE status='2';"

?>


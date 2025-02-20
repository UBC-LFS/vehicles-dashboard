<?php

$query = array (
  "Today" => "SELECT FROM_UNIXTIME(start_time) as date_time, mrbs_room.room_name, name, user_email FROM mrbs_entry JOIN mrbs_room ON mrbs_room.id = mrbs_entry.room_id WHERE start_time >= UNIX_TIMESTAMP(CURDATE()) and start_time < UNIX_TIMESTAMP(CURDATE() + INTERVAL 1 day)",
  "Next 7 days" => "SELECT FROM_UNIXTIME(start_time) as date_time, mrbs_room.room_name, name, user_email FROM mrbs_entry JOIN mrbs_room ON mrbs_room.id = mrbs_entry.room_id WHERE start_time >= UNIX_TIMESTAMP(CURDATE() + INTERVAL 1 DAY) and start_time < UNIX_TIMESTAMP(CURDATE() + INTERVAL 8 DAY)",
);

$pending_q = "SELECT COUNT(*) AS cnt FROM mrbs_entry WHERE status='2';"

?>


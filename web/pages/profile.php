<?php

if ($_REQUEST['reset']) {
    $db->query('delete from hlstats_sql_web_profile');
    $db->query('delete from hlstats_sql_daemon_profile');
    exit('Stats reset.');
}

echo '<h3>Web performance</h3>';
echo '<p>top queries by # of times run<table><tr><td>origin</td><td>count</td><td>total time</td><td>avg time</td></tr>';
$result = $db->query('select *, (run_time/run_count) as avg_rt from hlstats_sql_web_profile order by run_count desc limit 20');
while ($rowdata = $db->fetch_array($result)) {
    echo "<tr><td>$rowdata[source]</td><td>$rowdata[run_count]</td><td>$rowdata[run_time]</td><td>$rowdata[avg_rt]</td></tr>";
}
echo '</table>';

echo '<p>top queries by total time taken<table><tr><td>origin</td><td>count</td><td>total time</td><td>avg time</td></tr>';
$result = $db->query('select *, (run_time/run_count) as avg_rt from hlstats_sql_web_profile order by run_time desc limit 20');
while ($rowdata = $db->fetch_array($result)) {
    echo "<tr><td>$rowdata[source]</td><td>$rowdata[run_count]</td><td>$rowdata[run_time]</td><td>$rowdata[avg_rt]</td></tr>";
}
echo '</table>';

echo '<p>top queries by avg runtime<table><tr><td>origin</td><td>count</td><td>total time</td><td>avg time</td></tr>';
$result = $db->query('select *, (run_time/run_count) as avg_rt from hlstats_sql_web_profile order by avg_rt desc limit 20');
while ($rowdata = $db->fetch_array($result)) {
    echo "<tr><td>$rowdata[source]</td><td>$rowdata[run_count]</td><td>$rowdata[run_time]</td><td>$rowdata[avg_rt]</td></tr>";
}
echo '</table>';

echo '<hr>';

echo '<h3>Daemon performance</h3>';
echo '<p>top queries by # of times run<table><tr><td>origin</td><td>count</td><td>total time</td><td>avg time</td></tr>';
$result = $db->query('select *, (run_time/run_count) as avg_rt from hlstats_sql_daemon_profile order by run_count desc limit 20');
while ($rowdata = $db->fetch_array($result)) {
    echo "<tr><td>$rowdata[source]</td><td>$rowdata[run_count]</td><td>$rowdata[run_time]</td><td>$rowdata[avg_rt]</td></tr>";
}
echo '</table>';

echo '<p>top queries by total time taken<table><tr><td>origin</td><td>count</td><td>total time</td><td>avg time</td></tr>';
$result = $db->query('select *, (run_time/run_count) as avg_rt from hlstats_sql_daemon_profile order by run_time desc limit 20');
while ($rowdata = $db->fetch_array($result)) {
    echo "<tr><td>$rowdata[source]</td><td>$rowdata[run_count]</td><td>$rowdata[run_time]</td><td>$rowdata[avg_rt]</td></tr>";
}
echo '</table>';

echo '<p>top queries by avg runtime<table><tr><td>origin</td><td>count</td><td>total time</td><td>avg time</td></tr>';
$result = $db->query('select *, (run_time/run_count) as avg_rt from hlstats_sql_daemon_profile order by avg_rt desc limit 20');
while ($rowdata = $db->fetch_array($result)) {
    echo "<tr><td>$rowdata[source]</td><td>$rowdata[run_count]</td><td>$rowdata[run_time]</td><td>$rowdata[avg_rt]</td></tr>";
}
echo '</table>';

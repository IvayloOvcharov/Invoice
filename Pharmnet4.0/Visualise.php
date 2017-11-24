<?php

?>
 <?php 
 include 'Conn.php';
 $stmt=$ dbh->query('SELECT * FROM GP_USERS'); while ($row = $stmt->fetch()) { echo "
 
                <tr>"; echo "
                    <td>"; echo $row['GP_USERNAME']; echo "</td>"; echo "
                    <td>"; echo $row['GP_USERPASS']; echo "</td>"; echo "
                    <td>"; echo $row['GP_USERDATE']; echo "</td>"; echo "
                    <td>"; echo $row['GP_USERROUPID']; echo "</td>"; echo '</tr>'; } ?>

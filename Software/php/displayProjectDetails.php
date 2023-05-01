   <!-- table with research projects-->
   <table width=100%>
       <tr>
           <th> Project name </th>
           <th> Summary</th>
           <th> Project Investigator </th>
           <th> Department </th>
       </tr>
       <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $projectID = $_POST["projectID"];
        }


        require "../db/dbconnect.php";

        $query = "SELECT * FROM research_project r, departments d, progress p, uoa u  WHERE r.projectID = $projectID AND r.departmentID = d.departmentID AND r.potentialUOA = u.uoaID AND r.impactProgress = p.progressID";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            if ($project = mysqli_fetch_assoc($result)) {


                //get project details as local variables, defaulting to N/A if no value
                $projectTitle = empty($project['projectTitle']) ? "N/A" : $project['projectTitle'];
                $projectSummary = empty($project['projectSummary']) ? "N/A" : $project['projectSummary'];
                $projectInvestigator = empty($project['projectInvestigator']) ? "N/A" : $project['projectInvestigator'];
                $department = empty($project['departmentName']) ? "N/A" : $project['departmentName'];


                $progress = empty($project['progressStage']) ? "N/A" : $project['progressStage'];
                $uoa = empty($project['uoaTitle']) ? "N/A" : $project['uoaTitle'];


                $meetings = empty($project['meetings']) ? "N/A" : $project['meetings'];
                $followup = empty($project['followup']) ? "N/A" : $project['followup'];
                $underpinnedResearch = empty($project['underpinnedResearch']) ? "N/A" : $project['underpinnedResearch'];
                $reach = empty($project['reach']) ? "N/A" : $project['reach'];
                $significance = empty($project['significance']) ? "N/A" : $project['significance'];
                $quality = empty($project['quality']) ? "N/A" : $project['quality'];
                $impactAssessment = empty($project['impactAssessment']) ? "N/A" : $project['impactAssessment'];


                $notes = empty($project['notes']) ? "N/A" : $project['notes'];


                //show item details in a table
                echo ("<tr>");
                echo nl2br("<td>" . $projectTitle . " </td>"); //show name
                //echo ('<br>');
                echo ('<td>' . $projectSummary . "</td>"); //show summary
                echo nl2br("<td>" . $projectInvestigator . "</td>");
                echo nl2br("<td>" . $department . "</td>");
                echo ("</tr>");


        ?>

               <tr>
                   <th> Progress </th>
                   <th> UOA</th>
                   <th>Meetings </th>

               </tr>
               <tr>
                   <?php

                    echo ("<td> $progress </td>");

                    echo ("<td> $uoa </td>");

                    echo nl2br("<td> " . $meetings . " </td>"); //show meetings

                    ?>
               </tr>
               <tr>
                   <th> Followup</th>
                   <th> Underpinned Research </th>
                   <th> reach </th>
               </tr>
       <?php
                echo ("<tr>");

                //echo ('<br>');
                echo ('<td> ' . $followup . "</td>"); //show followup
                echo nl2br("<td> " . $underpinnedResearch . "</td>");
                echo nl2br("<td> " . $reach . "</td>");
                echo ("<td> ");
                require("../php/viewImpactButton.php");
                echo ("</td>");
            }
        }

        ?>
       <br>
       <tr>
           <th> Quality</th>
           <th> Impact Assessment</th>
           <th>Significance </th>
           <th> </th>
       </tr>
       <?php
        echo nl2br("<td> " . $significance . "</td>");
        echo nl2br("<td> " . $quality . " </td>"); //show quality
        echo ('<td> ' . $impactAssessment . "</td>"); //show impact assessment               

        echo ("</tr>");
        ?>

       <?php

        if ($_SESSION["admin"]) {
            echo ("
                <tr>
                <th>Notes</th>
                <tr>
                    <td> " . $project['notes'] . " </td>
                </tr>"
            );
        }

        ?>

       <!--grants details-->

       <?php

        if ($project["grantGiven"]) {
            echo ("<tr>
           <th>Grant ID</th>
           <th>Grant Date</th>
           <th>Grant Amount </th>
           <th>Given By </th>
       </tr>"
            );
            //get all grants for project
            $query = "SELECT * FROM research_grant WHERE projectID = $projectID";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($grant = mysqli_fetch_assoc($result)) {


                    //print grant details
                    echo ("
                        <tr>
                        <td>". $grant['grantID'] . "</td>
                        <td>". $grant['dateGiven'] . "</td>
                        <td>". $grant['amount'] . "</td>
                        <td>". $grant['givenBy'] . "</td>

                       </tr>"
                    );
                }
            }
        }
        ?>
   </table>





   <!--Insert file management here--> 



   <?php

        $query = "SELECT * FROM research_files WHERE projectID = $projectID";
        $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {

                echo nl2br("<table width=50%>
                <tr>
                <th class = 'spaced' > File Name </th>
                 <th> Download Links</th> 
                 </tr>");
                while ($files = mysqli_fetch_assoc($result)) {


                    //print grant details
                    echo ("
                        <tr>
                        <td>". $files ['rFileName'] . "</td>
                        <td> <a href = '../php/uploads/".$files['rFileName']."' download> DOWNLOAD </a></td>
                       </tr>"
                    );
                }
                echo ("</table>");
            }


?>
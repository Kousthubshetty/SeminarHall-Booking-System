
    <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="vendor/calendar/fontawesome-free-5.15.4-web/js/all.min.js"></script>
    <!-- <link rel="stylesheet" href="aos-master/dist/aos.css">
    <script src="aos-master/dist/aos.js"></script> -->
    <style>
.calenderview{
    font-family: sans-serif;
    font-size: 15px;
    line-height: 1.4;
}
.wrapper {
    margin: 0;
    margin: 15px auto;
}

.container-calendar {
    background: #ffffff;
    position: relative;
    padding: 15px;
    width: 80%;
    margin: 0 auto;
    overflow: auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.container-calendar-dateandtime{
    width: 48%;
    height: 100%;
    
}

.container-calendar-dateandtime h3{
    /* text-align: center; */
    bottom:0;
}

.button-container-calendar button {
    cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #00a2b7;
    color: #fff;
    border: 1px solid #0aa2b5;
    border-radius: 4px;
    padding: 5px 10px;
}

.table-calendar {
    border-collapse: collapse;
    width: 100%;
}

.table-calendar td, .table-calendar th {
    padding: 5px;
    border: 1px solid #e2e2e2;
    text-align: center;
    vertical-align: top;
}

.date-picker.selected {
    font-weight: bold;
    outline: 1px dashed #00BCD4;
}

.date-picker.selected span {
    border-bottom: 2px solid currentColor;
}

/* sunday */
.date-picker:nth-child(1) {
  color: red;
  font-size: bold;
}

/* friday */
/* .date-picker:nth-child(6) {
  color: green;
} */

#monthAndYear {
    text-align: center;
    margin-top: 0;
}

.button-container-calendar {
    position: relative;
    margin-bottom: 1em;
    overflow: hidden;
    clear: both;
}

#previous {
    float: left;
}

#next {
    float: right;
}

.footer-container-calendar {
    margin-top: 1em;
    border-top: 1px solid #dadada;
    padding: 10px 0;
}

.footer-container-calendar select {
    cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #ffffff;
    color: #585858;
    border: 1px solid #bfc5c5;
    border-radius: 3px;
    padding: 5px 1em;
}
    </style>
    <style>
        .upnext-events{
            width: 94%;
            /* border:1px solid black; */
            border-radius: 5px;
            background-color: #fff;
            margin: 2% 3%;
            float: left;
            position: relative;
            display: block;
            /* font-size:14px; */
            /* height: 150px; */
            font-family: sans-serif;        
            line-height: 1.4;
            letter-spacing:0;
        }
        .upnext-events:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .upnext-events:nth-child(1){
            margin-top: 3%;

        }
        .upnext-events table{
            width: 100%;
            margin: 5px 0;
        }
        .upnext-events h4{
            float: left;
        }
        .upnext-events table tr td:nth-child(1){
            padding-left: 10px;
        }
        .upnext-event-image{
            /* position: absolute; */
            /* top:0; */
            margin-right: 10px;
            float: right;
            width: 80px;
            height: 80px;
            display: flex;
            /* border-radius: 50%; */
            /* z-index: 15; */
        }
        .upnext-event-image img{
            width: 100%;
            border-radius: 50%;
        }
        #Pending{
            color:red;
        }
        #Approved{
            color:green;
        }
        #Rejected{
            color:Red;
        }
    </style>
<div class="calenderview">
    <div class="wrapper">
        
        <div class="container-calendar">
            <div class="container-calendar-dateandtime">
            <h3 id="monthAndYear"></h3>
            
            <div class="button-container-calendar">
                <button id="previous" onclick="previous()">&#8249;</button>
                <button id="next" onclick="next()">&#8250;</button>
            </div>
            
            <table class="table-calendar" id="calendar" data-lang="en">
                <thead id="thead-month"></thead>
                <tbody id="calendar-body" style="cursor:pointer;"></tbody>
            </table>
            
            <div class="footer-container-calendar">
                 <label for="month">Jump To: </label>
                 <select id="month" onchange="jump()">
                     <option value=0>Jan</option>
                     <option value=1>Feb</option>
                     <option value=2>Mar</option>
                     <option value=3>Apr</option>
                     <option value=4>May</option>
                     <option value=5>Jun</option>
                     <option value=6>Jul</option>
                     <option value=7>Aug</option>
                     <option value=8>Sep</option>
                     <option value=9>Oct</option>
                     <option value=10>Nov</option>
                     <option value=11>Dec</option>
                 </select>
                 <select id="year" onchange="jump()"></select>       
            </div>
            </div>
            <div class="container-calendar-dateandtime" style="position:absolute;top:0;right:0;display: flex;">
                
                <div style="height: 20%;width: 100%;position: absolute;padding-left:18px;padding-top:10px;color:white;background-color:#009688">
                    <span>
                        <?php
                            if(!isset($_GET['clickeddate'])){
                                echo date("Y");
                            }else{
                                echo date_format(date_create($_GET['clickeddate']),"Y");
                            }
                        ?>
                    </span>
                    <h3 id="date">
                        <?php
                        if(!isset($_GET['clickeddate'])){
                            echo date("D, M d");
                        }else{
                            echo date_format(date_create($_GET['clickeddate']),"D, M d");
                        }
                        ?>
                    </h3>
                </div>
                <div style="overflow-y: scroll;height: 80%;width:100%;position: absolute;bottom: 0;background-color: rgb(241, 241, 241);">
                <?php
                if(!isset($_GET['clickeddate'])){
                    $search_date=date("Y-m-d");
                }else{
                    $search_date=date_format(date_create($_GET['clickeddate']),"Y-m-d");
                }
                $sqli ="SELECT hall_booking.*, hall.hallname, department.department_name, staff.staffname, staff.profile_img, eventtype.eventtype FROM hall_booking LEFT JOIN hall ON hall_booking.hallid=hall.hallid LEFT JOIN department ON department.department_id=hall_booking.department_id LEFT JOIN staff ON staff.staffid=hall_booking.staffid LEFT JOIN eventtype ON eventtype.eventtypeid=hall_booking.eventtypeid WHERE DATE(booking_start_dt_tim)='$search_date' AND (hall_booking.status='Approved' OR hall_booking.status='Pending' OR hall_booking.status='Rejected')";
                $qsqli = mysqli_query($con,$sqli);
                echo mysqli_error($con);
                if(mysqli_affected_rows($con) < 1){
                    echo "<p><h3 style='padding:20px 10px;background-color: #f6c5b2; text-align: center;'>No Bookings Found</h3></p>";
                }
                while($rs = mysqli_fetch_array($qsqli))
                {
                if(file_exists("staffimg/".$rs['profile_img']))
                {
                echo '<a style="color:black;" href="displayhallbooking.php?viewid=' . $rs['hall_booking_id'] . '">
                    <div class="upnext-events">
                        <table>
                            <tr>
                                <td colspan="3"><h5><span>' . $rs['eventtype'] . '</span></h5></span></td>
                                <td rowspan="4">
                                    <div class="upnext-event-image">
                                        <img src="staffimg/' .$rs['profile_img']. '">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span>Name</span></td>
                                <td colspan="2"><span>'  . $rs['staffname'] . '</span></td>
                            </tr>
                            <tr>
                                <td><span>Department:</span></td>
                                <td colspan="2"><span>' . $rs['department_name'] . '</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-map-marker-alt"></i> ' . $rs['hallname'] . '</td>
                                <td colspan="2"><i class="far fa-clock"></i>'.date_format(date_create($rs['booking_start_dt_tim'])," g : i A").'&emsp;-&emsp;<i class="far fa-clock"></i>'.date_format(date_create($rs['booking_end_dt_tim'])," g : i A").'</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align:center;border-top:1px solid gray;font-weight:bold;" id="' . $rs['status'] . '">' . $rs['status'] . '</td>
                            </tr>
                        </table>
                    </div>
                </a>';
                }else{
                    echo '<a style="color:black;" href="displayhallbooking.php?viewid=' . $rs['hall_booking_id'] . '">
                        <div class="upnext-events">
                            <table>
                                <tr>
                                    <td colspan="3"><h5><span>' . $rs['eventtype'] . '</span></h5></span></td>
                                    <td rowspan="4">
                                        <div class="upnext-event-image">
                                            <img src="assets/img/defaultimage.jpg">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Name</span></td>
                                    <td colspan="2"><span>'  . $rs['staffname'] . '</span></td>
                                </tr>
                                <tr>
                                    <td><span>Department:</span></td>
                                    <td colspan="2"><span>' . $rs['department_name'] . '</span></td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-map-marker-alt"></i> ' . $rs['hallname'] . '</td>
                                    <td colspan="2"><span><i class="far fa-clock"></i>'.date_format(date_create($rs['booking_start_dt_tim'])," g : i A").'&emsp;</span>-&emsp;<span><i class="far fa-clock"></i>'.date_format(date_create($rs['booking_end_dt_tim'])," g : i A").'</span></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;border-top:1px solid gray;font-weight:bold;" id="' . $rs['status'] . '">' . $rs['status'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </a>';
                }    
                
                }
                echo "<div>&nbsp</div>";
                ?>
                    <!-- <div class="upnext-events" data-aos="fade-up" data-aos-duration="2000">
                        <table>
                            <tr>
                                <td colspan="3"><h5><span>Leaders meeting</span></h5></span></td>
                                <td rowspan="4">
                                    <div class="upnext-event-image">
                                        <img src="2003036958.jpg" alt="not found">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span>Name:</span></td>
                                <td colspan="2"><span>harish</span></td>
                            </tr>
                            <tr>
                                <td><span>Department:</span></td>
                                <td colspan="2"><span>maths</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-map-marker-alt"></i> Hall 1</td>
                                <td colspan="2"><i class="far fa-clock"></i> 8 : 00 PM&emsp;-&emsp;<i class="far fa-clock"></i> 9 : 00 PM</td>
                            </tr>
                        </table>
                    </div>
                    <div class="upnext-events" data-aos="fade-up" data-aos-duration="2500">
                        <table>
                            <tr>
                                <td colspan="3"><h5><span>Leaders meeting</span></h5></span></td>
                                <td rowspan="4">
                                    <div class="upnext-event-image">
                                        <img src="3.jpg" onerror="this.src='default.jpg'">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><span>Name:</span></td>
                                <td colspan="2"><span>harish</span></td>
                            </tr>
                            <tr>
                                <td><span>Department:</span></td>
                                <td colspan="2"><span>maths</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-map-marker-alt"></i> Hall 1</td>
                                <td colspan="2"><i class="far fa-clock"></i> 8 : 00 PM&emsp;-&emsp;<i class="far fa-clock"></i> 9 : 00 PM</td>
                            </tr>
                        </table>
                    </div> -->

                </div>
            </div>
    
        </div>
        
    </div>
</div>
<script>
    function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
}

today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");


createYear = generate_year_range(1970, 2050);
/** or
 * createYear = generate_year_range( 1970, currentYear );
 */

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = "";
var days = "";

var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

if (lang == "en") {
    months = monthDefault;
    days = dayDefault;
} else if (lang == "id") {
    months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
} else if (lang == "fr") {
    months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
} else {
    months = monthDefault;
    days = dayDefault;
}


var $dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
}
$dataHead += "</tr>";

//alert($dataHead);
document.getElementById("thead-month").innerHTML = $dataHead;


monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);



function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    var firstDay = ( new Date( year, month ) ).getDay();

    tbl = document.getElementById("calendar-body");

    
    tbl.innerHTML = "";

    
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    var date = 1;
    for ( var i = 0; i < 6; i++ ) {
        
        var row = document.createElement("tr");

        
        for ( var j = 0; j < 7; j++ ) {
            if ( i === 0 && j < firstDay ) {
                cell = document.createElement( "td" );
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                var dateclick="dateClicked("+date+","+(month+1)+","+year+");";
                cell.setAttribute("onclick", dateclick);
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";

                if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                    cell.className = "date-picker selected";
                }
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }

}

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

// ****************************
function dateClicked(date,month,year){
    // var bookingdate=date+"/"+month+"/"+year;
    var bookingdate=date+"-"+month+"-"+year;
    booking(bookingdate,month,year);
    // if(today.getFullYear()==year){
    //     if(today.getMonth()+1==month){
    //         if(today.getDate()<=date){
    //             booking(bookingdate,month,year);
    //         }
    //     }else if(today.getMonth()+1<month){
    //         booking(bookingdate,month,year);
    //     }
    // }else if(today.getFullYear()<year){
    //     booking(bookingdate,month,year);
    // }
    
}
// document.querySelector(".selected").click();
function booking(bookingdate,month,year){
    window.location='dashboard.php?clickeddate='+bookingdate+'&currentM='+(month-1)+'&currentY='+year;
    // document.getElementById("date").innerHTML=bookingdate;

}
</script>
<?php
if(isset($_GET['currentM'])&&isset($_GET['currentY'])){
echo "<script>showCalendar(".$_GET['currentM'].", ".$_GET['currentY'].");</script>";
}
?>
<script>
    AOS.init();
</script>
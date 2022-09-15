
  
<?php

include 'db_conn.php';

session_start();
$user_id =  $_SESSION['id'] ;
$email = $_SESSION['email'];
$tel =   $_SESSION['number'];
$username = $_SESSION['username'];
?>
<?php
if(isset($_SESSION['id']) && isset($_SESSION['username'])){





?>

 <?php
  ob_start()
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work management App</title>
    <link rel="stylesheet" href="styles/main.css">
    
<style type="text/css">
@import url('http://fonts.cdnfonts.com/css/scientific-calculator-lcd');
    body {
    color:blue;
    }
    
    #jsalarmclock{
    font-family: Tahoma;
    font-weight: bold;
    font-size: 12px;
    }
    
    #jsalarmclock div{
    margin-bottom: 0.8em;
    }
    
    #jsalarmclock div.leftcolumn{
    float: left;
    width: 150px;
    font-size: 13px;
    clear: left;
    }
    
    #jsalarmclock span{
    margin-right: 5px;
    }
    
    .button_menu {
      width: 100px;
      height: 28px;
      background-color: buttonface;
      border: 1px solid red;
      border-radius: 10px;
      color: blue;
      font-size:18px;
    }
    
    .select_menu {
      width: 100px;
      height: 28px;
      background-color: buttonface;
      border: 1px solid red;
      border-radius: 10px;
      color: red;
    }
    
    .text_menu {
     width: 400px;
      height: 28px;
      background-color: buttonface;
      border: 1px solid red;
      border-radius: 10px;
      color: black;
    }
    #alarm_alarm
    {
        position: absolute;
        top: 50%;
        left: 40%;
        width: 350px;
        height: 5vh;
        font-family: 'Scientific Calculator LCD', sans-serif;   
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        text-align: center;
        justify-content: center;
        font-size: 30px;
        align-items: center;
        color: black;
    }
    .current-time
    {
        position: absolute;
        top: 44%;
        left: 45%;
        color: black;
    }
    .text-notes
    {
        height: 30vh;
        width: 30vw;
    }
    button{
 border: none;
  padding: 10px;
  font-family: 'Open Sans', sans-serif;
   font-size: 18px;
  transition: 0.3s
}
.button2{
  background: none
}
.done{
  background: none;
   
  color: #75DD7B
}
p{
  font-size: 18px;
  font-family: open sans
}
.translate{
  background: none;
}
.colla{
  margin-top: 12%;
  margin-right: 100%
}

    </style>
    <script type="text/javascript">
    var jsalarm={
        padfield:function(f){
            return (f<10)? "0"+f : f
        },
        showcurrenttime:function(){
            var dateobj=new Date()
            var ct=this.padfield(dateobj.getHours())+":"+this.padfield(dateobj.getMinutes())+":"+this.padfield(dateobj.getSeconds())
            this.ctref.innerHTML=ct
            this.ctref.setAttribute("title", ct)
            if (typeof this.hourwake!="undefined"){ //if alarm is set
                if (this.ctref.title==(this.hourwake+":"+this.minutewake+":"+this.secondwake)){
                    clearInterval(jsalarm.timer)
                    window.location=document.getElementById("musicloc").value
                }
            }
        },
        init:function(){
            var dateobj=new Date()
            this.ctref=document.getElementById("alarm_alarm")
            this.submitref=document.getElementById("submit_submit")
            this.submitref.onclick=function(){
                jsalarm.setalarm()
                this.value="Alarm Set"
                this.disabled=true
                return false
            }
            this.resetref=document.getElementById("reset_reset")
            this.resetref.onclick=function(){
            jsalarm.submitref.disabled=false
            jsalarm.hourwake=undefined
            jsalarm.hourselect.disabled=false
            jsalarm.minuteselect.disabled=false
            jsalarm.secondselect.disabled=false
            return false
            }
            var selections=document.getElementsByTagName("select")
            this.hourselect=selections[0]
            this.minuteselect=selections[1]
            this.secondselect=selections[2]
            for (var i=0; i<60; i++){
                if (i<24) //If still within range of hours field: 0-23
                this.hourselect[i]=new Option(this.padfield(i), this.padfield(i), false, dateobj.getHours()==i)
                this.minuteselect[i]=new Option(this.padfield(i), this.padfield(i), false, dateobj.getMinutes()==i)
                this.secondselect[i]=new Option(this.padfield(i), this.padfield(i), false, dateobj.getSeconds()==i)
            }
            jsalarm.showcurrenttime()
            jsalarm.timer=setInterval(function(){jsalarm.showcurrenttime()}, 1000)
        },
        setalarm:function(){
            this.hourwake=this.hourselect.options[this.hourselect.selectedIndex].value
            this.minutewake=this.minuteselect.options[this.minuteselect.selectedIndex].value
            this.secondwake=this.secondselect.options[this.secondselect.selectedIndex].value
            this.hourselect.disabled=true
            this.minuteselect.disabled=true
            this.secondselect.disabled=true
        }
    }
    </script>
    
    </style>
</head>
<body>
    <header id="topnav">
        <a href="#" class="active">Work management App</a>
        <div class="nav-right">
            <a href="#">Create Schedule</a>
            <a href="#">My notes</a>
            <a href="#">Menu</a>
            <a href="#">Options</a>
            <a href="/work-management-app/server/registration.php">Register</a>
            <a href="#"> <?php echo $_SESSION['username']; ?></a>
            <a href="logout.php" class="delete-btn"><span class="material-symbols-outlined" name="logout">
logout
</span></a>
        </div>
    </header>
    <main>
        <h1 id="schedule">Create Schedule</h1>
        <label for="titleOfwork">Schedule Title</label>
            <input type="text" name="titleOfwork" id="titleOfwork" placeholder="Title of the Schedule" required>
            <br>
            <form action="" method="">
                <div id="jsalarmclock">
                
                    <div>
                    <h1 class="current-time">Current time</h1>
                    <span id="alarm_alarm" style="letter-spacing: 2px"></span>
                
                    </div>
                    
                    <div>
                    <div class="leftcolumn">Set Alarm:</div> 
                    <span><select class="select_menu"></select> Hour</span> 
                    <span><select class="select_menu"></select> Minutes</span> 
                    <span><select class="select_menu"></select> Seconds</span>
                    </div>
                    
                    <div>
                    <div class="leftcolumn">Set Alarm Action:</div> 
                    <input type="text" class="text_menu" id="musicloc" size="55" value="" /> 
                    <span style="font: normal 11px Tahoma">
                    <p style="  margin-left: 150px; color: blue; font-size: 15px; font-weight: bold;">Location of page to launch</p>
                    </span>
                    </div>
                    
                    <input type="submit" class="button_menu" value="Set Alarm!" id="submit_submit" /> 
                    <input type="reset" class="button_menu" value="reset" id="reset_reset" />
                
                </div>
                </form>
                <div class="planner">
                    <h1 id="schedule">Planner</h1>
                    <input type="date"> 
                </div>
                <a href="/work-management-app/server/create-note.php"><h1>Create note</h1></a>
        <!-- Trigger/Open The Modal -->
        <h1 class="calendar-title" id="myBtn">My Calendar</h1>
        <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close">&times;</span>
<section class="CALENDAR">
              

    <div class="month">      
      <ul>
        <li class="prev">&#10094;</li>
        <li class="next">&#10095;</li>
        <li>
          August<br>
          <span style="font-size:18px">2021</span>
        </li>
      </ul>
    </div>
    
    <ul class="weekdays">
      <li>Mo</li>
      <li>Tu</li>
      <li>We</li>
      <li>Th</li>
      <li>Fr</li>
      <li>Sa</li>
      <li>Su</li>
    </ul>
    
    <ul class="days">  
      <li>1</li>
      <li>2</li>
      <li>3</li>
      <li>4</li>
      <li>5</li>
      <li>6</li>
      <li>7</li>
      <li>8</li>
      <li>9</li>
      <li><span class="active">10</span></li>
      <li>11</li>
      <li>12</li>
      <li>13</li>
      <li>14</li>
      <li>15</li>
      <li>16</li>
      <li>17</li>
      <li>18</li>
      <li>19</li>
      <li>20</li>
      <li>21</li>
      <li>22</li>
      <li>23</li>
      <li>24</li>
      <li>25</li>
      <li>26</li>
      <li>27</li>
      <li>28</li>
      <li>29</li>
      <li>30</li>
      <li>31</li>
    </ul>
    </section>
</div>

</div>          

    </main>

    <script type="text/javascript">
        jsalarm.init()
        </script>
        <script src="/work-management-app/script/index.js"></script>
        
</body>
</html>
<?php ob_end_flush(); ?>
<?php 

      }else{

     header("Location: index.php");

     exit();

}

 ?>
<?php
	session_start();
		require_once('mysql-connect.php'); 
	
	if(isset($_SESSION['username'])){

	}else{
		header("location:login.php");	
	}	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/main-style.css">
		<link rel="stylesheet" href="src/css/index-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	    
		<link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.min.css">
		<script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		
		<link rel="stylesheet" href="calendar/css/demo.css"/>
		<link rel="stylesheet" href="calendar/css/theme3.css"/>		
		
		<style>
			.btn {
				margin-top: -5px;
			}
		</style>
		
		<script>var Calendar = function(model, options, date){
			  // Default Values
			  this.Options = {
			    Color: '',
			    LinkColor: '',
			    NavShow: true,
			    NavVertical: false,
			    NavLocation: '',
			    DateTimeShow: true,
			    DateTimeFormat: 'mmm, yyyy',
			    DatetimeLocation: '',
			    EventClick: '',
			    EventTargetWholeDay: false,
			    DisabledDays: [],
			    ModelChange: model
			  };
			  // Overwriting default values
			  for(var key in options){
			    this.Options[key] = typeof options[key]=='string'?options[key].toLowerCase():options[key];
			  }
			
			  model?this.Model=model:this.Model={};
			  this.Today = new Date();
			
			  this.Selected = this.Today
			  this.Today.Month = this.Today.getMonth();
			  this.Today.Year = this.Today.getFullYear();
			  if(date){this.Selected = date}
			  this.Selected.Month = this.Selected.getMonth();
			  this.Selected.Year = this.Selected.getFullYear();
			
			  this.Selected.Days = new Date(this.Selected.Year, (this.Selected.Month + 1), 0).getDate();
			  this.Selected.FirstDay = new Date(this.Selected.Year, (this.Selected.Month), 0).getDay();
			  this.Selected.LastDay = new Date(this.Selected.Year, (this.Selected.Month -1), 0).getDay();
			
			  this.Prev = new Date(this.Selected.Year, (this.Selected.Month - 1), 1);
			  if(this.Selected.Month==0){this.Prev = new Date(this.Selected.Year - 1, 11, 1);}
			  this.Prev.Days = new Date(this.Prev.getFullYear(), (this.Prev.getMonth() + 1), 0).getDate();
			};
			
			function createCalendar(calendar, element, adjuster){
			  if(typeof adjuster !== 'undefined'){
			    var newDate = new Date(calendar.Selected.Year, calendar.Selected.Month + adjuster, 1);
			    calendar = new Calendar(calendar.Model, calendar.Options, newDate);
			    element.innerHTML = '';
			  }else{
			    for(var key in calendar.Options){
			      typeof calendar.Options[key] != 'function' && typeof calendar.Options[key] != 'object' && calendar.Options[key]?element.className += " " + key + "-" + calendar.Options[key]:0;
			    }
			  }
			  var months = ["JANU??R", "FEBRU??R", "M??RCIUS", "??PRILIS", "M??JUS", "J??NIUS", "J??LIUS", "AUGUSZTUS", "SZEPTEMBER", "OKT??BER", "NOVEMBER", "DECEMBER"];
			
			  function AddSidebar(){
			    var sidebar = document.createElement('div');
			    sidebar.className += 'cld-sidebar';
			
			    var monthList = document.createElement('ul');
			    monthList.className += 'cld-monthList';
			
			    for(var i = 0; i < months.length - 3; i++){
			      var x = document.createElement('li');
			      x.className += 'cld-month';
			      var n = i - (4 - calendar.Selected.Month);
			      // Account for overflowing month values
			      if(n<0){n+=12;}
			      else if(n>11){n-=12;}
			      // Add Appropriate Class
			      if(i==0){
			        x.className += ' cld-rwd cld-nav';
			        x.addEventListener('click', function(){
			          typeof calendar.Options.ModelChange == 'function'?calendar.Model = calendar.Options.ModelChange():calendar.Model = calendar.Options.ModelChange;
			          createCalendar(calendar, element, -1);});
			        x.innerHTML += '<svg height="15" width="15" viewBox="0 0 100 75" fill="rgba(255,255,255,0.5)"><polyline points="0,75 100,75 50,0"></polyline></svg>';
			      }
			      else if(i==months.length - 4){
			        x.className += ' cld-fwd cld-nav';
			        x.addEventListener('click', function(){
			          typeof calendar.Options.ModelChange == 'function'?calendar.Model = calendar.Options.ModelChange():calendar.Model = calendar.Options.ModelChange;
			          createCalendar(calendar, element, 1);} );
			        x.innerHTML += '<svg height="15" width="15" viewBox="0 0 100 75" fill="rgba(255,255,255,0.5)"><polyline points="0,0 100,0 50,75"></polyline></svg>';
			      }
			      else{
			        if(i < 4){x.className += ' cld-pre';}
			        else if(i > 4){x.className += ' cld-post';}
			        else{x.className += ' cld-curr';}
			
			        //prevent losing var adj value (for whatever reason that is happening)
			        (function () {
			          var adj = (i-4);
			          //x.addEventListener('click', function(){createCalendar(calendar, element, adj);console.log('kk', adj);} );
			          x.addEventListener('click', function(){
			            typeof calendar.Options.ModelChange == 'function'?calendar.Model = calendar.Options.ModelChange():calendar.Model = calendar.Options.ModelChange;
			            createCalendar(calendar, element, adj);} );
			          x.setAttribute('style', 'opacity:' + (1 - Math.abs(adj)/4));
			          x.innerHTML += months[n].substr(0,3);
			        }()); // immediate invocation
			
			        if(n==0){
			          var y = document.createElement('li');
			          y.className += 'cld-year';
			          if(i<5){
			            y.innerHTML += calendar.Selected.Year;
			          }else{
			            y.innerHTML += calendar.Selected.Year + 1;
			          }
			          monthList.appendChild(y);
			        }
			      }
			      monthList.appendChild(x);
			    }
			    sidebar.appendChild(monthList);
			    if(calendar.Options.NavLocation){
			      document.getElementById(calendar.Options.NavLocation).innerHTML = "";
			      document.getElementById(calendar.Options.NavLocation).appendChild(sidebar);
			    }
			    else{element.appendChild(sidebar);}
			  }
			
			  var mainSection = document.createElement('div');
			  mainSection.className += "cld-main";
			
			  function AddDateTime(){
			      var datetime = document.createElement('div');
			      datetime.className += "cld-datetime";
			      if(calendar.Options.NavShow && !calendar.Options.NavVertical){
			        var rwd = document.createElement('div');
			        rwd.className += " cld-rwd cld-nav";
			        rwd.addEventListener('click', function(){
				        createCalendar(calendar, element, -1);
				        } );
			        rwd.innerHTML = '<svg height="15" width="15" viewBox="0 0 75 100" fill="rgba(0,0,0,0.5)"><polyline points="0,50 75,0 75,100"></polyline></svg>';
			        datetime.appendChild(rwd);
			      }
			      var today = document.createElement('div');
			      today.className += ' today';
			      today.innerHTML = months[calendar.Selected.Month] + ", " + calendar.Selected.Year;
			      datetime.appendChild(today);
			      if(calendar.Options.NavShow && !calendar.Options.NavVertical){
			        var fwd = document.createElement('div');
			        fwd.className += " cld-fwd cld-nav";
			        fwd.id += "cld-fwd";
			        fwd.addEventListener('click', function(){
				        createCalendar(calendar, element, 1);
				        } );
			        fwd.innerHTML = '<svg height="15" width="15" viewBox="0 0 75 100" fill="rgba(0,0,0,0.5)"><polyline points="0,0 75,50 0,100"></polyline></svg>';
			        datetime.appendChild(fwd);
			      }
			      if(calendar.Options.DatetimeLocation){
			        document.getElementById(calendar.Options.DatetimeLocation).innerHTML = "";
			        document.getElementById(calendar.Options.DatetimeLocation).appendChild(datetime);
			      }
			      else{mainSection.appendChild(datetime);}
			  }
			
			  function AddLabels(){
			    var labels = document.createElement('ul');
			    labels.className = 'cld-labels';
			    var labelsList = [ "H", "K", "SZE", "CS", "P", "SZO","V"];
			    for(var i = 0; i < labelsList.length; i++){
			      var label = document.createElement('li');
			      label.className += "cld-label";
			      label.innerHTML = labelsList[i];
			      labels.appendChild(label);
			    }
			    mainSection.appendChild(labels);
			  }
			  function AddDays(){
			    // Create Number Element
			    function DayNumber(n){
			      var number = document.createElement('p');
			      number.className += "cld-number";
			      number.innerHTML += n;			     
			      day.addEventListener('click', function(){
				      window.location.href='calendar.php?y='+calendar.Selected.Year+"&m="+(calendar.Selected.Month+1)+"&d="+n;
				  });
			      
			      return number;
			    }
			    
			    var days = document.createElement('ul');
			    days.className += "cld-days";
			    // Previous Month's Days
			    for(var i = 0; i < (calendar.Selected.FirstDay); i++){
			      var day = document.createElement('li');
			      day.className += "cld-day prevMonth";			
			      //Disabled Days
			      var d = i%7;
			      for(var q = 0; q < calendar.Options.DisabledDays.length; q++){
			        if(d==calendar.Options.DisabledDays[q]){
			          day.className += " disableDay";
			        }
			      }

			      var number = DayNumber((calendar.Prev.Days - calendar.Selected.FirstDay) + (i+1));
			      day.appendChild(number);
			      			
			      days.appendChild(day);
			    }
			    // Current Month's Days
			    for(var i = 0; i < calendar.Selected.Days; i++){
			      var day = document.createElement('li');
			      day.className += "cld-day currMonth";
			      //Disabled Days
			      var d = (i + calendar.Selected.FirstDay)%7;
			      for(var q = 0; q < calendar.Options.DisabledDays.length; q++){
			        if(d==calendar.Options.DisabledDays[q]){
			          day.className += " disableDay";
			        }
			      }
			      var number = DayNumber(i+1);
			      // Check Date against Event Dates
			      for(var n = 0; n < calendar.Model.length; n++){
			        var evDate = calendar.Model[n].Date;
			        var toDate = new Date(calendar.Selected.Year, calendar.Selected.Month, (i+1));
			        if(evDate.getTime() == toDate.getTime()){
			          number.className += " eventday";
			          var title = document.createElement('span');
			          title.className += "cld-title";
			          if(typeof calendar.Model[n].Link == 'function' || calendar.Options.EventClick){
			            var a = document.createElement('a');
			            a.setAttribute('href', '#');
			            a.innerHTML += calendar.Model[n].Title;
			            if(calendar.Options.EventClick){
			              var z = calendar.Model[n].Link;
			              if(typeof calendar.Model[n].Link != 'string'){
			                  a.addEventListener('click', calendar.Options.EventClick.bind.apply(calendar.Options.EventClick, [null].concat(z)) );
			                  if(calendar.Options.EventTargetWholeDay){
			                    day.className += " clickable";
			                    day.addEventListener('click', calendar.Options.EventClick.bind.apply(calendar.Options.EventClick, [null].concat(z)) );
			                  }
			              }else{
			                a.addEventListener('click', calendar.Options.EventClick.bind(null, z) );
			                if(calendar.Options.EventTargetWholeDay){
			                  day.className += " clickable";
			                  day.addEventListener('click', calendar.Options.EventClick.bind(null, z) );
			                }
			              }
			            }else{
			              a.addEventListener('click', calendar.Model[n].Link);
			              if(calendar.Options.EventTargetWholeDay){
			                day.className += " clickable";
			                day.addEventListener('click', calendar.Model[n].Link);
			              }
			            }
			            title.appendChild(a);
			          }else{
			            /*title.innerHTML += '<a href="' + calendar.Model[n].Link + '">' + calendar.Model[n].Title + '</a>';*/
			            title.innerHTML += calendar.Model[n].Title;
			          }
			          number.appendChild(title);
			        }
			      }
			      day.appendChild(number);
			      // If Today..
			      if((i+1) == calendar.Today.getDate() && calendar.Selected.Month == calendar.Today.Month && calendar.Selected.Year == calendar.Today.Year){
			        day.className += " today";
			      }
			      days.appendChild(day);
			    }
			    // Next Month's Days
			    // Always same amount of days in calander
			    var extraDays = 13;
			    if(days.children.length>35){extraDays = 6;}
			    else if(days.children.length<29){extraDays = 20;}
			
			    for(var i = 0; i < (extraDays - calendar.Selected.LastDay); i++){
			      var day = document.createElement('li');
			      day.className += "cld-day nextMonth";
			      //Disabled Days
			      var d = (i + calendar.Selected.LastDay + 1)%7;
			      for(var q = 0; q < calendar.Options.DisabledDays.length; q++){
			        if(d==calendar.Options.DisabledDays[q]){
			          day.className += " disableDay";
			        }
			      }
			
			      var number = DayNumber(i+1);
			      day.appendChild(number);
			
			      days.appendChild(day);
			    }
			    mainSection.appendChild(days);
			  }
			  if(calendar.Options.Color){
			    mainSection.innerHTML += '<style>.cld-main{color:' + calendar.Options.Color + ';}</style>';
			  }
			  if(calendar.Options.LinkColor){
			    mainSection.innerHTML += '<style>.cld-title a{color:' + calendar.Options.LinkColor + ';}</style>';
			  }
			  element.appendChild(mainSection);
			
			  if(calendar.Options.NavShow && calendar.Options.NavVertical){
			    AddSidebar();
			  }
			  if(calendar.Options.DateTimeShow){
			    AddDateTime();
			  }
			  AddLabels();
			  AddDays();
			}
			
			function caleandar(el, data, settings){
			  var obj = new Calendar(data, settings);
			  createCalendar(obj, el);
			}
		</script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>
		<?php 
			include('menu.php'); 
			$select_year = $_GET['y'];
			$select_month = $_GET['m'];
			$select_day = $_GET['d'];
			$event_id = $_GET['event_id'];
			
		?>
		<div class="content">	
			<h2><?php 
				if(!$select_year){
					echo ("Napt??r");
				}else{
					echo("Napt??r - ".$select_year."-".$select_month."-".$select_day);
				}
				?></h2>	
			<div id="caleandar">

		    </div>
		    
			<script type="text/javascript">
				<?php
				
					$eventQuery = "SELECT title, year, month, day FROM szeg_events_calendar order by year ,month, day";
					$eventResult = mysqli_query($connection, $eventQuery);
					?>
					var events = [	
					<?php
					while($row = mysqli_fetch_assoc($eventResult)) {
						$eventDateQuery = "SELECT title, year, month, day FROM szeg_events_calendar where year = " .$row["year"]. " AND month = " .$row["month"]. " AND day = " .$row["day"];
						$eventDateResult = mysqli_query($connection, $eventDateQuery);
						
				?>
					
					{'Date': new Date(<?php echo $row["year"]; ?>, <?php echo $row["month"]-1; ?>,<?php echo $row["day"]; ?>), 'Title':'<?php echo $row["title"]; ?>'},
				<?php
					}
					
				?>	
				];
				var settings = {};
				var element = document.getElementById('caleandar');
				caleandar(element, events, settings);
		
			</script>
			<?php if($event_id){ 
					$eventQuery = "SELECT event_id, title, highlight, img, year, month, day FROM szeg_events_calendar where event_id =".$event_id;
					$eventResult = mysqli_query($connection, $eventQuery);
					while($row = mysqli_fetch_assoc($eventResult)) {
					?>
			<div class="right-box" style="margin-left: 630px;">
				<h3>Esem??ny szerkeszt??s</h3>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					
					<input type="hidden" name="event-id" class="form-control" style="width: 300px;" value="<?php echo $row['event_id']; ?>">
					
					<label class="col-form-label" for="inputDefault">Esem??ny neve</label>
					<input type="text" name="event-title" class="form-control" style="width: 300px;" value="<?php echo $row['title']; ?>">
		
					<label class="col-form-label" for="inputDefault">D??tum v??laszt??s</label>
					<input type="text" name="event-date" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width: 300px;" value="<?php echo $row['year']."-".$row['month']."-".$row['day']; ?>" >			
					
					<p style="margin-top: 15px;">
						<label for="myCheck" style=" font-size: 15px;">Kiemelt esem??ny:</label> 
						<input type="checkbox" id="myCheck" onclick="myFunction()" name="highlight" <?php echo ( $row['highlight'] != 0) ? 'checked="checked"' : ''; ?>>
					</p>
					<?php
						if($row['highlight'] != 0){
							$show = 'style="display: block;"';
						}else{
							$show = 'style="display: none;"';
						}
					?>
					<p id="text" <?php echo $show; ?>>
						<label class="col-form-label" for="inputDefault">Esem??ny k??p URL</label>
						<input type="text" name="event-img" class="form-control" style="width: 300px;" value="<?php echo $row['img']; ?>">
					</p>
					
					<p style="margin-top: 30px;">
						<button type="submit" name="update-event" class="btn btn-outline-success save-user">Friss??t??s</button>
					</p>
				</form>
			</div>
			<?php }} ?>


			
			<?php if(!$select_year && !$event_id){ ?>
			<div class="right-box" style="margin-left: 630px;">
				<h3>Esem??ny r??gz??t??s</h3>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<label class="col-form-label" for="inputDefault">Esem??ny neve</label>
					<input type="text" name="event-title" class="form-control" style="width: 300px;">
		
					<label class="col-form-label" for="inputDefault">D??tum v??laszt??s</label>
					<input type="text" name="event-date" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width: 300px;">	
					<p style="margin-top: 15px;">
						<label for="myCheck" style=" font-size: 15px;">Kiemelt esem??ny:</label> 
						<input type="checkbox" id="myCheck" onclick="myFunction()" name="highlight">
					</p>
					<p id="text" style="display:none">
						<label class="col-form-label" for="inputDefault">Esem??ny k??p URL</label>
						<input type="text" name="event-img" class="form-control" style="width: 300px;">	
					</p>
					<p style="margin-top: 20px;">
						<button type="submit" name="new-event" class="btn btn-outline-success save-user">Ment??s</button>
					</p>
					





				</form>
			</div>
			<?php }else if(!$event_id){
				?>
				<div class="right-box" style="margin-left: 630px;">
					<h3>Esem??ny lista</h3>
					<ul>
					<?php
				
					$eventQuery = "SELECT event_id, title, highlight, year, month, day FROM szeg_events_calendar where year = " .$select_year. " AND month = " .$select_month. " AND day = " .$select_day;
					$eventResult = mysqli_query($connection, $eventQuery);
					if(mysqli_num_rows($eventResult)== 0){
							echo "Jelenleg nincs esem??ny felv??ve";
							?>
								<p><button type="button" class="btn btn-link" onclick="location.href='calendar.php'">Vissza</button></p>
							<?php
					}else{						
						while($row = mysqli_fetch_assoc($eventResult)) {
							?>
							<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								<input type="hidden" name="event-id" class="form-control" style="width: 300px;" value="<?php echo $row['event_id']; ?>">
								<li><?php echo $row['title']; ?>
									<button type="button" id="button" class="btn btn-link edit" onclick="location.href='calendar.php?event_id=<?php echo($row['event_id']); ?>'">
										<i class="fal fa-edit"></i>
							    	</button>
							    	<button type="submit" name="delete-event" id="button" class="btn btn-link trash" >
							    		<i class="fal fa-trash-alt"></i>
							    	</button>
								</li>
							</form><?php
						}
					}
				?>	
					</ul>
				</div>
			<?php
				}
				 ?>
			
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new-event'])) {
					$title = $_POST['event-title'];
					$date = $_POST['event-date'];
					$highlight = $_POST['highlight'];
					
					if($highlight != ""){
						$highlight = 1;
					}else{
						$highlight = 0;
					}			
					$event_img = $_POST['event-img'];
					$year = substr($date, -10, 4);
					$month = substr($date, -5, 2);
					$day = substr($date, -2);
					
					$insertEvent = "INSERT INTO szeg_events_calendar (title, highlight, img, year, month, day) VALUES ('".$title."', ".$highlight.", '".$event_img."', '".$year."', '".$month."', '".$day."');";
				            
    				if ($connection->query($insertEvent) === TRUE) {
                		?>
						<div class="alert alert-dismissible alert-success">
							<strong>Sikeresen</strong> l??tre lett hoza az esem??ny.
						</div>
						<script>
							window.location.href='calendar.php';
						</script>
						<?php
		            }else{
    					?>
						<div class="alert alert-dismissible alert-danger">
						  <strong>Hiba!</strong> Esem??ny l??trehoz??sa sor??n hiba l??pett fel. <?php echo ($insertEvent."  ".$connection->error); ?>
						</div>
						<?php	
		            } 
				}

				if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update-event'])) {
					$title = $_POST['event-title'];
					$date = $_POST['event-date'];
					$highlight = $_POST['highlight'];
					$event_img = $_POST['event-img'];
					$id = $_POST['event-id'];
					$year = substr($date, -10, 4);
					$month = str_replace("-","0",substr($date, -5, 2));
					$day = str_replace("-","0",substr($date, -2));
					
					if($highlight != ""){
						$highlight = 1;
					}else{
						$highlight = 0;
					}
					
					$updateEvent = "UPDATE szeg_events_calendar SET title='".$title."' , highlight='".$highlight."' , img='".$event_img."' , year='".$year."', month='".$month."', day='".$day."' WHERE event_id = ".$id;
				            
    				if ($connection->query($updateEvent) === TRUE) {
                		?>
						<div class="alert alert-dismissible alert-success">
							<strong>Sikeresen</strong> l??tre lett hoza az esem??ny.
						</div>
						<script>
							window.location.href='calendar.php';
						</script>
						<?php
		            }else{
    					?>
						<div class="alert alert-dismissible alert-danger">
						  <strong>Hiba!</strong> Esem??ny l??trehoz??sa sor??n hiba l??pett fel. <?php echo ($updateEvent."  ".$connection->error); ?>
						</div>
						<?php	
		            } 
				}
				
				if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-event'])) {
					$id = $_POST['event-id'];
					$deletEvent = "DELETE FROM szeg_events_calendar WHERE event_id = ".$id;

					
    				if ($connection->query($deletEvent) === TRUE) {
                		?>
						<div class="alert alert-dismissible alert-success">
							<strong>Sikeresen</strong> t??r??lve lett ez esem??ny!
						</div>
						<script>
							window.location.reload();
						</script>
						<?php
		            }else{
    					?>
						<div class="alert alert-dismissible alert-danger">
						  <strong>Hiba!</strong> Esem??ny t??rl??se sor??n hiba l??pett fel. <?php echo ($deletEvent."  ".$connection->error); ?>
						</div>
						<?php		
		            } 	
				}
			?>
		</div>
		
		<script>
			function myFunction() {
			  var checkBox = document.getElementById("myCheck");
			  var text = document.getElementById("text");
			  if (checkBox.checked == true){
			    text.style.display = "block";
			  } else {
			     text.style.display = "none";
			  }
			}
		</script>
	</body>
</html>
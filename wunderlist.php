<?php
session_start();
include("wunderlistconnect.php");
if($_SESSION['lang'] == "vi"){
	include("vi.php");
}else{
	include("en.php");
}
if(isset($_SESSION['email']) && isset($_SESSION['pass'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Family-Wunderlist</title>
	<style type="text/css">
		#lists{
			overflow: hidden;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="wunderlist.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/datetimepicker-master/build/jquery.datetimepicker.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="jquery.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script src="/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
	<script>
		$( function() {
			$( "#datepicker" ).datepicker({
				dateFormat: "yy-mm-dd"
			});	
			$('#datetimepicker').datetimepicker();
		} );
  </script>
</head>
<body>
	<div id="confirmation">
		<div class="content-firm">
			<div class="content-inner">
				<img src="wunderlist-icon.png">
				<div class="comfirm-text">
					<div class="custom-text">
						<h3>Are you sure you want to delete this comment forever?</h3>
						<p>You will not be able to undo this action.</p>
					</div>
				</div>
			</div>
			<div class="content-foodter">
				<div class="col">
					<div class="col-20"></div>
					<div class="col-40">
						<button class="cancel">
							<span>Cancel</span>
						</button>
					</div>
					<div class="col-40">
						<button class="blue-2 blue">
							<span>Delete</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="confirmation-main">
		<div class="content-firm">
			<div class="content-inner">
				<img src="wunderlist-icon.png">
				<div class="comfirm-text">
					<div class="custom-text">
						<h3>"07" will be deleted forever.</h3>
						<p>You will not be able to undo this action.</p>
					</div>
				</div>
			</div>
			<div class="content-foodter">
				<div class="col">
					<div class="col-20"></div>
					<div class="col-40">
						<button class="cancel">
							<span>Cancel</span>
						</button>
					</div>
					<div class="col-40">
						<button class="blue-1 blue">
							<a><span>Delete To-do</span></a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="confirmation-account">
		<div id="setting">
			<div class="content-setting">
				<div class="tabs">
					<ul>
						<li class="gen">
							<a href="#">
								<i class="fas fa-user"></i>
								<span>General</span>
							</a>
						</li>
						<li class="acc">
							<a href="#">
								<i class="fas fa-user"></i>
								<span>Account</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-user"></i>
								<span>Shortcuts</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-user"></i>
								<span>Smart Lists</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-user"></i>
								<span>Notifications</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-user"></i>
								<span>about</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="setting-content-inner">
					<div class="account-me">
						<div class="content-inner-img">
							<div class="content-image">
								<div class="img-p">
									<img src="p.png">
								</div>
							</div>
						</div>
						<div class="account-setting">
							<div class="cols">
								<div class="col-32">
									<span>Name</span>
								</div>
								<div class="col-68">
									<input type="text" name="text" value="Pham Quang">
								</div>
							</div>
							<div class="cols">
								<div class="cols-32">
									<span>Email</span>
								</div>
								<div class="cols-40">
									<input type="text" name="text" value="phamquang98by@gmail.com">
								</div>
								<div class="cols-28">
									<input type="text" name="text" value="Change Email">
								</div>
							</div>
							<div class="cols">
								<div class="col-32"></div>
								<div class="col-68">
									<p><a href="#">Add or manage your email addresses</a></p>
								</div>
							</div>
							<div class="cols">
								<div class="cols-32">
									<span>Password</span>
								</div>
								<div class="cols-40 bold">
									<input type="text" class="changepass" name="text" placeholder="Change Password" autocomplete="off">
								</div>
								<div class="cols-28"></div>
							</div>
							<div class="cols change-password" style="display:none">
								<div class="col-32"></div>
								<div class="cols-40">
									<div class="cols">
										<div class="col-100">
											<input type="text" class="new-pass" placeholder="New PassWord">
										</div>
									</div>
									<div class="cols">
										<div class="col-100">
											<input type="text" class="repeat-pass" placeholder="Repeat New Password">
										</div>
									</div>
									<div class="cols">
										<div class="col-50">
											<button class="cancel-pass">Cancel</button>
										</div>
										<div class="col-50">
											<button class="save-pass">Save</button>
										</div>
									</div>
								</div>
								<div class="cols-28"></div>
							</div>
						</div>
						<div class="account-backup">
							<div class="cols">
								<div class="col-32">
									<span>Account Backup</span>
								</div>
								<div class="col-35 bold">
									<input type="text" name="text" value="Create Backup">
								</div>
								<div class="col-33 bold">
									<input type="text" name="text" value="Import Backup Data">
								</div>
							</div>
							<div class="cols">
								<div class="col-32"></div>
								<div class="col-68">
									<span>Backup data includes all your Lists, Tasks, Subtasks, Notes, and Reminders. Please note it does not include those Lists that were shared with you, Files, Comments, Shared List recipients and previous application settings.</span>
								</div>
							</div>
						</div>
						<div class="google-connect">
							<div class="cols google">
								<div class="col-32">
									<span>Google</span>
								</div>
								<div class="cols-40 bold">
									<input type="text" name="text" value="Connect">
								</div>
								<div class="col-28"></div>
							</div>
						</div>
						<div class="facebook-connect">
							<div class="cols">
								<div class="col-32">
									<span>Facebook</span>
								</div>
								<div class="cols-40 bold">
									<input type="text" name="text" value="Disconnect">
								</div>
							</div>
							<div class="cols">
								<div class="col-32"></div>
								<div class="col-68">
									<i class="fab fa-facebook-square"></i>
									<span>
										Connecting your account to Google or Facebook will make signing in easier
									</span>
								</div>
							</div>
						</div>
						<div class="ics-container">
							<div class="cols">
								<div class="col-32">
									<span>Calendar Feed</span>
								</div>
								<div class="col-68">
									<input type="text" name="text" value="https://a.wunderlist.com/api/v1/ical/86643519-ac1cp21s71ua4uitj7b7upqoi5.ics">
								</div>
							</div>
							<div class="cols">
								<div class="col-32"></div>
								<div class="col-68">
									<span>Add this link to iCal, Google Calendar or Outlook to see all To-dos with a due date in your calendar.</span>
									<p><a href="#">Learn more about Wunderlist's Calendar Feed</a></p>
								</div>
							</div>
						</div>
						<div class="show-delete">
							<div class="cols">
								<div class="col-32"></div>
								<div class="cols-40">
									<button>Delete Account</button>
								</div>
							</div>
						</div>
					</div>
					<div class="general" style="display:none">
						<div class="cols">
							<div class="col-60">
								<span>Language</span>
							</div>
							<div class="cols-40">
								<select name="select" class="select">
								
									<option value="en">English</option>
									<option value="vi">Vietnamese</option>
								</select>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="account-foodter">
						<div class="cols">
							<div class="cols-40"></div>
							<div class="cols-40"></div>
							<div class="cols-20">
								<button>Done</button>
							</div>
						</div>
			</div>
		</div>
	</div>
	<div class="popover">
		<div class="arrow-bottom"></div>
		<div class="stream-popover">
			<div class="stream-head">
				<h3>Conversation</h3>
			</div>
			<div class="stream-body">
				<img src="p.png">
				<h1>No Conversations</h1>
				<p>Start a conversation now by commenting on a to-do in a shared list.</p>
			</div>
		</div>
	</div>
	<ul class="context-menu">
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Mark as Completed</span>
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Mark as Starred</span>
		</li>
		<li class="context-menu-item separator">
			
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Due Today</span>
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Due Tomorrow</span>
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Remove Due Date</span>
		</li>
		<li class="context-menu-item separator">
			
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Create a new  list from To-do</span>
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Move to-do to...</span>
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Email Selected To-do</span>
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Print Selected To-do</span>
		</li>
		<li class="context-menu-item separator">
			
		</li>
		<li class="context-menu-item menuItem">
			<i class="fas fa-check"></i>
			<span>Copy To-do</span>
		</li>
		<li class="context-menu-item menuItem del">
			<i class="fas fa-check"></i>
			<span>Delete To-do</span>
		</li>
	</ul>
<div class="main-interface">
	<div class="create-new-list">
	<?php
	if(isset($_POST['save'])){
		$sql = "SELECT id FROM account WHERE email=?";
		$query = $conn->prepare($sql);
		$query->execute(array($_SESSION['email']));
		$result = $query->fetch();
		$id = $result['id'];
		$name_list = $_POST['name'];
		$email_list = $_POST['email'];
		if(isset($_POST['name']) && isset($_POST['email'])){
			if($_POST['name'] != "" && $_POST['email'] != ""){
				$sql = "INSERT INTO lists(name, acc_id, email) VALUES(:name_list, :acc_id, :email_list)";
			$query = $conn->prepare($sql);
			$query->execute(array(":name_list"=>$name_list,":acc_id"=>$id,":email_list"=>$email_list));
			}
		}
	}
	?>
	<form action="" method="POST">
		<div class="new-list">
			<div class="list-header">
				<h3>Create New List</h3>
				<div class="separator-list input-list">
					<input class="list-name" type="text" name="name" placeholder="List Name">
				</div>
				<div class="separator-list">
					<ul class="content-tabs">
						<li>
							<a href="#" class="list-member">
								<samp>LIST MEMBER</samp>
							</a>
						</li>
						<li>
							<a href="#" class="options-list">
								<samp>LIST OPTIONS</samp>
							</a>
						</li>
					</ul>
				</div>
				<div class="separator-list input-list member">
					<input class="list-email" type="text" name="email" placeholder="Name or email address...">
				</div>
			</div>
			<div class="list-options">
				<div class="separator-options">
					<input type="checkbox" name="">
					<span>Do Not Disturb</span>
				</div>
			</div>
			<div class="tab-members member">
				<div class="member-inner">
					<ul class="content-people">
						<li>
							<div class="content-people-image">
								<img src="p.png">
							</div>
							<div class="content-people-meta">
								<div class="content-people-name">
									<span class="content-people-name-label"><?php if(isset($_SESSION['name'])){ echo $_SESSION['name'];} ?></span>
								</div>
							<span class="content-people-email"><?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?></span>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="tab-foodter">
				<button class="cancel-full">Cancel</button>
				<button type="submit" name="save" class="save">Save</button>
			</div>
		</div>
	</form>
	</div>
	<div id="lists">
		<div id="lists-inner">
			<div id="search-toolbar">
				<div class="toggle-icon" title="Toggle Siderbar">
					<div class="bar-1"></div>
					<div class="bar-2"></div>
					<div class="bar-3"></div>
				</div>
				<div class="left">
					<div class="search-input media">
						<input class="search" type="text" name="text" autocomplete="off">
					</div>
					<div class="search-icon media">
						<i class="fa fa-search" aria-hidden="true"></i>
						<i class="fas fa-bomb"></i>
					</div>
				</div>
			</div>
			<!-- AND Search -->
			<div id="user-toolbar">
				<a class="user">
					<div class="user-avatar">
						<div class="avatar" title="Pham Quang">
							<img src="p.png">
						</div>
						<div class="user-name media">
						<span><?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; } ?></span>
						</div>
						<div class="arrow media">
							<i class="fa fa-arrow-down" aria-hidden="true"></i>
						</div>
					</div>
				</a>
				<div class="content">
					<ul class="list-menu">
						<li class="last-synced">
							<span>Last synced a few seconds ago</span>
						</li>
						<li class="sync-now boder list-hover">
							<a href="">Sync Now</a>
						</li>
						<li class="account list-hover">
							<a href="#">Account Setting</a>
						</li>
						<li class="change list-hover">
							<a href="">Change Background</a>
						</li>
						<li class="restore boder list-hover">
							<a href="">Restore deleted lits</a>
						</li>
						<li class="install list-hover">
							<a href="">Install the Browser Extension</a>
						</li>
						<li class="love list-hover">
							<a href="">Love Wunderlist Website</a>
						</li>
						<li class="tell list-hover">
							<a href="">Tell Your Friends...</a>
						</li>
						<li class="wunderlist boder list-hover">
							<a href="">Wunderlist Website</a>
						</li>
						<li class="last-synced">
							<span>phamquang98by@gmail.com</span>
						</li>
						<li class="wunderlist boder list-hover">
							<a href="logout.php">Sign Out</a>
						</li>
					</ul>
				</div>
				<div class="stream-count media">
					<a href="#" class="bell">
						<i class="far fa-bell"></i>
					</a>
					<a href="#" class="comment">
						<i class="far fa-comment"></i>
					</a>
				</div>
			</div>
			<!-- END User-toobar-->
			<div id="list-scroll">
				<a class="list-inbox">
					<ul class="list-select">
						<li class="inbox-item">
							<i class="fa fa-inbox" aria-hidden="true"></i>
							<span class="text media"><?php if(isset($_SESSION['lang'])){echo $lang['inbox'];}else{echo "Inbox";} ?></span>
							<span class="number media">3</span>
						</li>
					</ul>
				</a>
				<?php
				$sql = "SELECT id FROM account WHERE email=?";
				$query = $conn->prepare($sql);
				$query->execute(array($_SESSION['email']));
				$result = $query->fetch();
				$id = $result['id'];
				$sql = "SELECT * FROM lists WHERE acc_id=?";
				$query = $conn->prepare($sql);
				$query->execute(array($id));
				while($row = $query->fetch()){
				echo '<a href="wunderlist.php?lists='.$row['id'].'" class="list-family">
				<ul class="list-select">
					<li class="family-item">
						<i class="fas fa-list-ul"></i>
						<span class="text media">'.$row['name'].'</span>
						<span class="number media">3</span>
					</li>
				</ul>
			</a>';
				}
				?>
			</div>
			<!-- END List-scroll-->
			<div id="create-list">
				<a class="add-list">
					<i class="fa fa-plus" aria-hidden="true"></i>
					<span class="media"><?php if(isset($_SESSION['lang'])){echo $lang['creatlist'];}else{echo "Create list";} ?></span>
				</a>
			</div>
			<!-- END Create-list -->
		</div>
	</div>
	<!-- END List -->
	<div id="detail">
		<div class="inner">
		<?php
		/*if(isset($_POST['update'])){
			$task_id = $_GET['task'];
			$name = $_POST['name'];
			$date = $_POST['date'];
			//$date = strtotime($date);
			//$date = date("Y-m-d",$date);
			$remind = $_POST['remind'];
			//$remind = strtotime($remind);
			//$remind = date("Y-m-d H:i:s",$remind);
			$subtask = $_POST['subtask'];
			$note = $_POST['note'];
			$comment = $_POST['comment'];
			$file_name="";
			if(isset($_FILES['file'])){
				$file_name = $_FILES['file']['name'];
				$file_tmp = $_FILES['file']['tmp_name'];
					move_uploaded_file($file_tmp,'storage/'.$file_name);
					//echo "Upload thành công";
			}
			$sql = "UPDATE task SET name=?, date=?, remind=?, note=?, file=? WHERE id=?";
			$query = $conn->prepare($sql);
			$query->execute(array($name,$date,$remind,$note,$file_name,$task_id));
		}*/
		?>
		
			<div class="top">
				<input class="check" type="checkbox" name="checkbox">
				<?php
				/*if(isset($_GET['task'])){
					$task_id = $_GET['task'];
					$sql = "SELECT name FROM task WHERE id=?";
					$query = $conn->prepare($sql);
					$query->execute(array($task_id));
					$row = $query->fetch();
				}*/
				?>
				<div class="text-view">
					<input type="text" class="nametask" name="name" value="" autocomplete="off">
					<input type="text" class="taskid" value="" style="display:none">
				</div>
				<i class="far fa-star"></i>
			</div>
			<!-- END TOP -->
			<div class="body">
					<a href="#" class="icon-date">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					</a>
					<a href="#" class="icon-clock">
						<i class="far fa-clock"></i>
					</a>
					<a href="#" class="icon-add">
						<i class="fas fa-plus"></i>
					</a>
					<a href="#" class="icon-pen">
						<i class="fas fa-pen"></i>
					</a>
					<a href="#" class="icon-file">
						<i class="fas fa-paperclip"></i>
					</a>
					<a href="#" class="icon-dropbox">
						<i class="fab fa-dropbox"></i>
					</a>
					<a href="#" class="icon-voice">
						<i class="fas fa-microphone"></i>
					</a>
					<?php
					/*if(isset($_GET['lists']) || isset($_GET['task'])){
					$task_id = $_GET['task'];
					$sql = "SELECT * FROM task WHERE id=?";
					$query = $conn->prepare($sql);
					$query->execute(array($task_id));
					$row = $query->fetch();*/
					?>
					<div class="body-item">
					<input type="text" id="datepicker" name="date" value="Set due date">
					</div>
					<div class="body-item">
						<input id="datetimepicker" type="text" name="remind" value="Remind me">
					</div>
					<div class="body-item">
						<input type="text" name="subtask" placeholder="Add a subtask">
					</div>
					<div class="body-item">
						<input type="text" class="note" name="note" placeholder="Add a not..." value="">
					</div>
					<div class="body-item">						
						<input class="none" type="file" name="file" placeholder="Add a file">
					</div>
					<?php
					/*}*/
					?>
					<div class="comment-main">
						<ul class="comment-list">
							<!-- <li class="comment-item">
								<div class="section-icon picture">
									<img src="p.png">
								</div>
								<div class="section-content">
									<span class="comment-author">
										Pham Quang
									</span>
									<span class="comment-time">
										Comment-time
									</span>
									<a href="#" class="section-delete">
										<i class="fas fa-backspace"></i>
									</a>
									<div class="comment-text">aaa</div>
								</div>
							</li>
							<li class="comment-item">
								<div class="section-icon picture">
									<img src="p.png">
								</div>
								<div class="section-content">
									<span class="comment-author">Pham Quang</span>
									<span class="comment-time">Comment-time</span>
									<a href="#" class="section-delete">
										<i class="fas fa-backspace"></i>
									</a>
									<div class="comment-text">aaa</div>
								</div>
							</li> -->
						</ul>
					</div>
			</div>
			<!-- END Body -->
			<div class="bottom">
				<a class="forward" href="#">
					<i class="fa fa-forward" aria-hidden="true"></i>
				</a>
				<a class="trash" href="#">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a>
				<div class="add-comment">
					<div class="input-fake">
						<input type="text" name="comment" placeholder="Add a comment..." autocomplete="off">
					</div>
				</div>
				<div class="detail-info">
					<span>Created on Fri,August 24</span>
				</div>
			</div>
			<!-- END Bottom -->
		
		</div>
	</div>
	<!-- END Detail -->
	<div id="main">
		<div class="list-toolbar">
			<h1><?php if(isset($_SESSION['lang'])){echo $lang['inbox'];}else{echo "Inbox";} ?></h1>
			<div class="actionBar">
				<div class="actionBar-top">
					<div class="actionBar-top-more action">
						<ul class="actionBar-top-more-item">
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="actionBar-top-sort action">
						<ul class="actionBar-top-more-item">
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="far fa-envelope"></i>
									<span>Duplicate List</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div>
				<div class="actionBar-bottom">
					<a class="tab-share">
						<i class="fa fa-share" aria-hidden="true"></i>
						<span><?php if(isset($_SESSION['lang'])){echo $lang['share'];}else{echo "Share";} ?></span>
					</a>
					<a class="tab-sort">
						<i class="fa fa-sort" aria-hidden="true"></i>
						<span><?php if(isset($_SESSION['lang'])){echo $lang['sort'];}else{echo "Sort";} ?></span>	
					</a>
					<a class="tab-more">
						<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
						<span><?php if(isset($_SESSION['lang'])){echo $lang['more'];}else{echo "More";} ?></span>
					</a>
					
				</div>
			</div>
		</div>
		<!-- END List-toolbar -->
		<div id="tasks-scroll">
		<div class="item-search" style="display:none">
			<!-- <h2 class="heading-search">
				<a href="">aa</a>
			</h2>
			<div class="task-search">
				<ul class="Task-list item-list">
					<li class="Task-list-select">
					<input type="text" class="idtask" value="`+result.id+`" style="display:none">
						<a class="select-item-icon">
							<i class="far fa-square icon"></i>
						</a>
						<span>`+result.name+`</span>
						<i class="far fa-star"></i>
					</li>
				</ul>
			</div> -->
		</div>
			<div class="addTask">
				<a href="#" class="icon-addTask">
					<i class="fas fa-plus"></i>
				</a>
				<?php
				/*if(isset($_POST['submit'])){
					$name = $_POST['name'];
					$checks = 1;
					if(isset($_POST['name']) && isset($_GET['lists'])){
						if($_POST['name'] != ""){	
							$lis_id = $_GET['lists'];
						$sql = "INSERT INTO task(name,lis_id,checks) VALUES(:name,:lis_id,:checks)";
						$query = $conn->prepare($sql);
						$query->execute(array(":name"=>$name,":lis_id"=>$lis_id,":checks"=>$checks));
						}
					}
				}*/
				?>
					<div class="addTask-input">
						<input id="input-add" type="text" name="name" placeholder="<?php if(isset($_SESSION['lang'])){echo $lang['addtodo'];}else{echo "Add a to-do...";} ?>" autocomplete="off">
					</div>
			</div>
			<div class="Tasks-list">
				<div class="list-item">
				<?php
				if(isset($_GET['lists'])){
					$lis_id = $_GET['lists'];
					$checks = 1;
				$sql = "SELECT * FROM task WHERE lis_id=? AND checks=?";
				$query = $conn->prepare($sql);
				$query->execute(array($lis_id,$checks));
				while($row = $query->fetch()){
					echo '<ul class="Task-list item-list">
						<input style="display:none" type="text" name="text" class="idtask" value="'.$row['id'].'">
						<li class="Task-list-select" style="list-style: none;">
									<i title="Mark as Completed" class="far fa-square icon"></i>
								<span>'.$row['name'].'</span>
								<i class="far fa-star"></i>
						</li>
					</ul>';
				}
				}
				?>
				<!--<a href="wunderlist.php?lists='.$lis_id.'&task='.$row['id'].'" class="task-item"></a>-->
					<!-- <ul class="Task-list item-list">
						<li class="Task-list-select" style="list-style: none;">
							
								<a href="#" class="select-item-icon">
									<i title="Mark as Completed" class="far fa-square icon"></i>
								</a>
								<span>07</span>
								<i class="far fa-star"></i>
							
						</li>
					</ul>
					<ul class="Task-list item-list">
						<li class="Task-list-select" style="list-style: none;">
							
								<a href="#" class="select-item-icon">
									<i title="Mark as Completed" class="far fa-square icon"></i>
								</a>
								<span>07</span>
								<i class="far fa-star"></i>
							
						</li>
					</ul> -->
				</div>
				<h2 class="heading">
					<a class="title-head">
						<span><?php if(isset($_SESSION['lang'])){echo $lang['showcompletetodo'];}else{echo "SHOW COMPLETE TO-DOS";} ?></span>
					</a>
				</h2>
				<div class="Task-item">
				<?php
				if(isset($_GET['lists'])){
					$lis_id = $_GET['lists'];
					$checks = 2;
				$sql = "SELECT * FROM task WHERE lis_id=? AND checks=?";
				$query = $conn->prepare($sql);
				$query->execute(array($lis_id,$checks));
				while($row = $query->fetch()){
					 echo '<ul class="Task-item-select item-list">
					 <input style="display:none" type="text" name="text" class="idtask" value="'.$row['id'].'">
					<li>
						<i class="far fa-check-square icon-item"></i>
						</a>
						<span class="Task-item-title">'.$row['name'].'</span>
						<span class="Task-item-time">Time post</span>
						<i class="far fa-star"></i>
					</li>
				</ul>';
				//
				}
			}
				?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<?php
}else{
	header("location:signin.php");
}
?>
</html>
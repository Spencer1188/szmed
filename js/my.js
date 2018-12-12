		// User js

		$(document).ready(function() { 
			$(".dropdown-trigger").dropdown();
		});
		
		 $(document).ready(function(){
			$('.modal').modal();
			$('select').formSelect();
		  });


	function do_insert()
		{
		 var usr=$("#usr").val();
		 var pass=$("#pw").val();
		 var group=$("#group").val();
		
		 if(usr!="" && group!="" && pass !="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_insert.php',
			  data:{
			   usr:usr,
			   password:pass,
			   group: group
			  },
			  success:function() {
				  $("#user_show").load('php/get_user.php');
				  M.toast({html: 'Benutzer erstellt!'})
			  },			
			  error:function() {
				  M.toast({html: 'Benutzer erstellen fehlgeschlagen!'})
			  }
			  });
		 }else {
		  alert("Please Fill All The Details");
		 }

		}

	function do_delete(id)
		{

			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_delete.php',
			  data:{
			   val:id
			  },
			  success:function() {
				  $("#user_show").load('php/get_user.php');
				  M.toast({html: 'Benutzer gelöscht!'})
			  },			
			  error:function() {
				  M.toast({html: 'Benutzer löschen fehlgeschlagen!'})
			  }
			  });

		}
	function do_edit(id)
		{
			
		 var usr=$("#usredit").val();
		 var group=$("#grpedit").val();
			
		 if(usr!="" && group!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_edit.php',
			  data:{
			   usr:usr,
			   group: group,
			   id:id
			  },
			  success:function() {
				  $("#user_show").load('php/get_user.php');
				  M.toast({html: 'Gespeichert!'})
			  },			
			  error:function() {
				  M.toast({html: 'Bearbeiten fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
		 }

		}

	function do_reset(id)
		{
		 var id=$(".prrs").attr('id');
		 var newpw1=$("#pw2").val();
		 var newpw2=$("#pw3").val();
			
		 if(newpw1!="" && newpw2!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/usr_reset_pw.php',
			  data:{
			   newpw1: newpw1,
			   newpw2: newpw2,
			   id: id
			  },
			  success:function(data) {
				  if(data == "ok"){
					 M.toast({html: 'Passwort geändert!'})
			  		}else if(data = "ng"){
					 M.toast({html: 'Passwort ändern fehlgeschlagen - Passwörter übereinstimmen nicht!'})
					}else{
				     M.toast({html: 'Passwort ändern fehlgeschlagen!'})
					}
			  },			
			  error:function() {
				  M.toast({html: 'Passwort ändern fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
		 } 

		}


	function do_insert_cam()
		{
			
		 var ivnr = $("#inr").val();
		 var name = $("#name").val();
		 var marke = $("#marke").val();
		 var bes = $("#beschreibung").val();
		 var typ = $("#typ").val();
		 var afl = $("#afl").val();
		 var akl = $("#akl").val();
		 var spmed = $("#spmed").val();
		 var vsz = $("#vsz").val();
		 var iso = $("#iso").val();
		 var gewicht = $("#gewicht").val();
		 var dim = $("#dim").val();
			
		if(ivnr!="" && name!="")
		 {
			  $.ajax
			  ({
			  type:'post',
			  url:'php/cam_insert.php',
			  data:{
				  ivnr: ivnr,
				  name: name,
				  marke: marke,
				  bes: bes,
				  typ:typ,
				  afl: afl,
				  akl: akl,
				  spmed: spmed,
				  vsz:vsz,
				  iso:iso,
				  gw:gewicht,
				  dim: dim
			  },
			  success:function(data) {
				  if(data == "ok"){
				 	$("#pre-loader").load('php/get_pic_ins.php');
					  }else{
						  alert(data);
					  }
			  },			
			  error:function() {
				  M.toast({html: 'Cam erstellen fehlgeschlagen!'})
			  }
			  });
		 } else {
		  alert("Please Fill All The Details");
			 $("#pre-loader").load('php/get_cam_ins.php');
		 } 

		}

function do_up_main() {

	ina = $("#path_main").val();
	
	if(ina != ""){
		$("#pre-main").load('php/pre-pic.php');
    var file_data = $('#in_main').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);                            
    $.ajax({
        url: 'php/do_up_main.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			if(data == "ok"){
			   M.toast({html: "Erfolgreich hochgeladen!"})
				$("#pre-loader").load('php/get_pic_ins.php');
			}else{
				M.toast({html: data})
				$("#pre-loader").load('php/get_pic_ins.php');
			}
        }
     });
		}else{
			M.toast({html: "Kein Bild ausgewählt!"})
		} 
}

function do_up_more() {
	ina = $("#path_more").val();
	
	if(ina != ""){
		$("#pre-more").load('php/pre-pic.php');
    var file_data = $('#in_more').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);                            
    $.ajax({
        url: 'php/do_up_more.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			if(data == "ok"){
			   M.toast({html: "Erfolgreich hochgeladen!"})
				$("#pre-loader").load('php/get_pic_ins.php');
			}else{
				M.toast({html: data})
				$("#pre-loader").load('php/get_pic_ins.php');
			}
        }
     });
		}else{
			M.toast({html: "Kein Bild ausgewählt!"})
		}
}
		
		function delete_main(id){
			 $.ajax
			  ({
			  type:'post',
			  url:'php/main_delete.php',
			  data:{
			   id:id
			  },
			  success:function(data) {
				  M.toast({html: 'Main-Bild gelöscht!'})
				  $("#pre-loader").load('php/get_pic_ins.php');
			  },			
			  error:function() {
				  M.toast({html: 'Main-Bild löschen fehlgeschlagen!'})
			  }
			  });
		}
		
		function delete_more(id){
			 $.ajax
			  ({
			  type:'post',
			  url:'php/more_delete.php',
			  data:{
			   id:id
			  },
			  success:function(data) {
				  M.toast({html: 'Bild gelöscht!'})
				  $("#pre-loader").load('php/get_pic_ins.php');
			  },			
			  error:function() {
				  M.toast({html: 'Bild löschen fehlgeschlagen!'})
			  }
			  });
		}
		
function do_up_pdf() {
	ina = $("#path_pdf").val();
	
	if(ina != ""){
		$("#pre-pdf").load('php/pre-pic.php');
    var file_data = $('#in_pdf').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);                            
    $.ajax({
        url: 'php/do_up_pdf.php', // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                        
        type: 'post',
        success: function(data){
			
			   M.toast({html: data});
				$("#pre-loader").load('php/get_pic_ins.php');
        }
     });
		}else{
			M.toast({html: "Kein Bild ausgewählt!"})
		}
}
		
		function delete_pdf(id) {                        
			 $.ajax
			  ({
			  type:'post',
			  url:'php/pdf_delete.php',
			  data:{
			   id:id
			  },
			  success:function(data) {
				  M.toast({html: 'PDF gelöscht!'})
				  $("#pre-loader").load('php/get_pic_ins.php');
			  },			
			  error:function() {
				  M.toast({html: 'PDF löschen fehlgeschlagen!'})
			  }
			  });
}

		
		function delete_vid(id) {                        
			 $.ajax
			  ({
			  type:'post',
			  url:'php/vid_delete.php',
			  data:{
			   id:id
			  },
			  success:function(data) {
				  M.toast({html: 'Video gelöscht!'})
				  $("#pre-loader").load('php/get_pic_ins.php');
			  },			
			  error:function() {
				  M.toast({html: 'Video löschen fehlgeschlagen!'})
			  }
			  });
}

val_sh = 1;
		
		function change(id){

			if(id == 1){
				$("#display-kach").load('php/kacheln.php');
				$( "#1" ).addClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#3" ).removeClass( "icon-ac" );
				$( "#search" ).val("");
				val_sh = 1;
			   }
			if(id == 2){
				$("#display-kach").load('php/table.php');
				$( "#2" ).addClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
				$( "#3" ).removeClass( "icon-ac" );
				$( "#search" ).val("");
				val_sh = 2;
			}
			if(id == 3){
				$("#display-kach").load('php/detail.php');
				$( "#3" ).addClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
				$( "#search" ).val("");
				val_sh = 3;
			   }
		}
		function search(){
			var val = $( "#search" ).val();
			if(val_sh == 1){
			$("#display-kach").load('php/kacheln.php?sea=' + val);
				$( "#3" ).removeClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
			}
			if(val_sh == 2){
			$("#display-kach").load('php/table.php?sea=' + val);
				$( "#3" ).removeClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
			}
			if(val_sh == 3){
			$("#display-kach").load('php/detail.php?sea=' + val);
				$( "#3" ).removeClass( "icon-ac" );
				$( "#2" ).removeClass( "icon-ac" );
				$( "#1" ).removeClass( "icon-ac" );
			}
		}
		
		$( "#search" ).keyup( search );
		
		$( "#close-search").click( close );
		
		function close(){
			$( "#search" ).val("");
			if(val_sh == 1){
			$("#display-kach").load('php/kacheln.php');	
				$( "#1" ).addClass( "icon-ac" );
			}
			if(val_sh == 2){
			$("#display-kach").load('php/table.php?sea=');
				$( "#2" ).addClass( "icon-ac" );
			}
			if(val_sh == 3){
			$("#display-kach").load('php/detail.php?sea=');
				$( "#3" ).addClass( "icon-ac" );
			}
		}


